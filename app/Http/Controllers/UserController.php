<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

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
            'email'        =>  'required|email|unique:users',
            'phone' => 'required|numeric|min:10|max:11',
            'address' => 'required|string'
        );
        if($request->phone!=''){
            $rules['phone'] = 'min:10|max:11';
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
            'email'        =>  'required|email|unique:users,email,'.$request->id,
            'phone' => 'required|numeric|min:10|max:11',
            'address' => 'required|string'
        );
        if($request->phone!=''){
            $rules['phone'] = 'min:10|max:11';
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

    public function profile(Request $request)
    {
        if($request->hasFile('image')){
            $check_email = DB::table('users')
                    ->where([['id','<>',Auth::user()->id],['email','=', $request->email]])->first();
            if($check_email){
                return response()->json(['success' => 1]);
            }else{
                $destination_path = 'public/avatar';
                $image = $request->file('image');
                $image_name = Carbon::now()->timestamp;
                $path = $image->storeAs($destination_path,$image_name);
                $data = array(
                    'user_name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'avatar' => $image_name
                );
                $check = User::whereId(Auth::user()->id)->update($data);  
                if(!$check){
                    return response()->json(['success' => 2]);
                }
                return response()->json(['success' => 4,'images'=>$image_name]);
            }
        }else{
            $check_email = DB::table('users')
                    ->where([['id','<>',Auth::user()->id],['email','=', $request->email]])->first();
            if($check_email){
                return response()->json(['success' => 1]);
            }else{
                $data = array(
                    'user_name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address 
                );
                $check = User::whereId(Auth::user()->id)->update($data);  
                if(!$check){
                    return response()->json(['success' => 2]);
                }
                return response()->json(['success' => 3]);
            }
        }
    }

    public function resetpassword(Request $request){
        $check = DB::table('users')
            ->select('users.password')
            ->where('id','=',Auth::user()->id)->first();
        if(Hash::check($request->password,$check->password)){
            if($request->password==$request->newpassword){
                return response()->json(['success' => 2]);
            }else{
                $data = array(
                    'password' => bcrypt($request->newpassword),
                );
                User::whereId(Auth::user()->id)->update($data);
                return response()->json(['success' => 3]);
            }
        }else{
            return response()->json(['success' => 1]);
        }
    }
}
