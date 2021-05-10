<?php

namespace App\Http\Controllers;

use App\Models\Categoryproduct;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $data = DB::table('products')
                    ->Join('categoryproducts','products.category_product_id','=','categoryproducts.id')
                    ->select('products.*','categoryproducts.name as cp_name')
                    ->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" class="btn btn-danger deleteproduct" id="'.$data->id.'" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>';
                        $button .= '<a href="{{URL("/editproducts/'.$data->id.'/edit")}}" class="btn btn-info buttonedit" id="'.$data->id.'"><i class="fa fa-plus"></i> Sửa</a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.pages.product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Categoryproduct::all();
        return view('backend.pages.addproduct',['categoryproducts'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' =>  'required',
            'category_product'        =>  'required',
            'price' =>  'required',
            'sale'        =>  'required',
            'image' =>  'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hot'        =>  'required',
            'del' =>  'required',
            'content'        =>  'required',
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()]);
        }
        $input_images = '';
        if($request->hasFile('image')){
            $destination_path = 'public/products';
            $image = $request->file('image');
            // lấy name
            // $image_name = $image->getClientOriginalName();
            $image_name = Carbon::now()->timestamp;
            $path = $image->storeAs($destination_path,$image_name);
            $input_images = $image_name;
        }
        $form_data = array(
            'name'    =>  $request->name,
            'price'     =>  $request->price,
            'sale'    =>  $request->sale,
            'category_product_id'     =>  $request->category_product,
            'content'    =>  $request->content,
            'images'     =>  $input_images,
            'is_hot'    =>  $request->hot,
            'is_del'     =>  $request->del
        );
        $check = Products::create($form_data); 
        if(!$check){
            return response()->json(['error' => 'Data Add Error.']);
        }
        return response()->json(['success' => 'Data Add Successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.pages.addproduct');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Products::findOrFail($id);
        $data->delete();
        $delete_file = Storage::delete('public/products/'.$data->images);
        return response()->json(['success' => 'Delete Data successfully.']);
    }
}
