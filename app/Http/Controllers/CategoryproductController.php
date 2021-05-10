<?php

namespace App\Http\Controllers;

use App\Models\Categoryproduct;
use App\Http\Requests\CategoryproductRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CategoryproductController extends Controller
{
    public function __construct(Categoryproduct $categoryproduct)
    {
        $this->categoryproduct = $categoryproduct;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $data = Categoryproduct::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" class="btn btn-danger deletecproduct" id="'.$data->id.'" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>';
                        $button .= '<button type="button" class="btn btn-info buttonedit" id="'.$data->id.'"><i class="fa fa-edit"></i> Sửa</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.pages.categoryproduct');
        // $data = Categoryproduct::all();
        // return view('backend.pages.categoryproduct',['categoryproducts'=>$data]);
        // return response()->json(['result' => $data,'status' => 'success']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryproductRequest $request)
    // public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'images' => 'required|file',
        //     'name' => 'required'
        // ]);
        $name = $request->name;
        $input_images = '';
        if($request->hasFile('images')){
            $destination_path = 'public/categoryproduct';
            $image = $request->file('images');
            // lấy name
            // $image_name = $image->getClientOriginalName();
            $image_name = Carbon::now()->timestamp;
            $path = $image->storeAs($destination_path,$image_name);
            $input_images = $image_name;
        }
        // //     $validatedData = $this->validate($request, [
        // //         'name'      => 'required|string',
        // //         'images' => 'required|string'
        // //   ]);
        $Data = (['name'=>$name,'images'=>$input_images]);
        $check = Categoryproduct::create($Data);
        if($check){
            $notification = array(
                'message' => 'Thêm danh mục sản phẩm thành công!',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Thêm không thành công, lỗi hệ thống!',
                'alert-type' => 'error'
            );
        }
      return redirect('/addcategoryproduct')->with($notification);
        //   ->route('/categoryproduct')->withSuccess('You have successfully created a Category!')
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoryproduct  $categoryproduct
     * @return \Illuminate\Http\Response
     */
    public function show(Categoryproduct $categoryproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoryproduct  $categoryproduct
     * @return \Illuminate\Http\Response
     */
    // public function edit(Categoryproduct $categoryproduct)
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Categoryproduct::findOrFail($id);
            return response()->json(['result' => $data]);
        }
        // $data = Categoryproduct::find($id);
        // return view('backend.pages.categoryproduct',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoryproduct  $categoryproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = array(
            'id'        =>  'required',
            'images'         =>  'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'  => 'required'
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()]);
        }
        $input_name ="";
        if($request->hasFile('images')){
            $categoryproduct = Categoryproduct::find($request->id);
            $delete_file = Storage::delete('public/categoryproduct/'.$categoryproduct->images);

            $destination_path = 'public/categoryproduct';
            $image = $request->file('images');
            $image_name = Carbon::now()->timestamp;
            $path = $image->storeAs($destination_path,$image_name);
            $input_name = $image_name;
            $form_data = array(
                'name'    =>  $request->name,
                'images'     =>  $image_name
            );
            $check = Categoryproduct::whereId($request->id)->update($form_data);  
            if(!$check){
                return response()->json(['error' => 'Data Added Error.']);
            } 
        }else{
            $categoryproduct = Categoryproduct::find($request->id);
            $form_data = array(
                'name'    =>  $request->name,
                'images'     =>  $categoryproduct->images
            );
            $check = Categoryproduct::whereId($request->id)->update($form_data);  
            if(!$check){
                return response()->json(['error' => 'Data Update Error.']);
            } 
        }
        return response()->json(['success' => 'Data Update successfully.' ,'images' => $input_name]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoryproduct  $categoryproduct
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Categoryproduct $categoryproduct)
    // {
    //     //
    // }
    public function destroy($id)
    {   
        $data = Categoryproduct::findOrFail($id);
        $data->delete();
        $delete_file = Storage::delete('public/categoryproduct/'.$data->images);
        // return Redirect::route('/categoryproduct');
        // if($check){
        //     $notification = array(
        //         'message' => 'Xoá danh mục sản phẩm thành công!',
        //         'alert-type' => 'success'
        //     );
        // }else{
        //     $notification = array(
        //         'message' => 'Xoá không thành công, lỗi hệ thống!',
        //         'alert-type' => 'error'
        //     );
        // }
        // return redirect('/categoryproduct')->with($notification);
        return response()->json(['success' => 'Delete Data successfully.']);
        // dd('test');
    }
}
