<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function __construct(User $User)
    {
        $this->User = $User;
    }
    public function index()
    {
        if(request()->ajax())
        {
            $data = User::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" class="btn btn-danger deletecuser" id="'.$data->id.'" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>';
                        $button .= '<button type="button" class="btn btn-info buttonedit" id="'.$data->id.'"><i class="fa fa-edit"></i> Sửa</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.pages.member');
    }
    public function store(Request $request)
    {
        $rules = array(
            'name' =>  'required',
            'email'        =>  'required|email',
        );
        if($request->phone!=''){
            $rules['phone'] = 'min:9|max:11';
        }
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()]);
        }
        $form_data = array(
            'user_name'    =>  $request->name,
            'email'     =>  $request->email,
            'phone'    =>  $request->phone,
            'address'     =>  $request->address
        );
        $check = User::create($form_data); 
        if(!$check){
            return response()->json(['error' => 'Data Update Error.']);
        }
        return response()->json(['success' => 'Data Update successfully.']);
    }
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = User::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }
    public function update(Request $request)
    {
        $rules = array(
            'id'        =>  'required',
            'name' =>  'required',
            'email'        =>  'required|email',
        );
        if($request->phone!=''){
            $rules['phone'] = 'min:9|max:11';
        }
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()]);
        }
        $form_data = array(
            'user_name'    =>  $request->name,
            'email'     =>  $request->email,
            'phone'    =>  $request->phone,
            'address'     =>  $request->address
        );
        $check = User::whereId($request->id)->update($form_data);  
        if(!$check){
            return response()->json(['error' => 'Data Update Error.']);
        }
        return response()->json(['success' => 'Data Update successfully.']);
    }
    public function destroy($id)
    {   
        $data = User::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Delete Data successfully.']);
    }
}
