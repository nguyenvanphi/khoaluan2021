<?php

namespace App\Http\Controllers;

use App\Models\Categoryproduct;
use App\Models\Products;
use App\Models\Attributevalue;
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
                        $button .= '<a href="/shopthegmen/editproducts/'.$data->id.'/edit" class="btn btn-info buttonedit" id="'.$data->id.'"><i class="fa fa-edit"></i> Sửa</a>';
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
            'price' =>  'required|numeric|min:1',
            'qty'        =>  'required|numeric|min:1',
            'image' =>  'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_product'        =>  'required',
            'hot'        =>  'required',
            'del' => 'required',
            'content'        =>  'required',
            'size'  => 'required'
        );
        if($request->sale!=''){
            $rules['sale'] = 'numeric|min:1';
        }
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
            'images'     =>  $input_images,
            'qty'     =>  $request->qty,
            'category_product_id'     =>  $request->category_product,
            'is_hot'    =>  $request->hot,
            'is_del'    => $request->del,
            'description'    =>  $request->content
        );
        $id_product = DB::table('products')->insertGetId($form_data); 
        foreach($request->size as $size){
            $data = array(
                'attribute_id' => '1',
                'product_id' =>$id_product,
                'value' => $size
            );
            Attributevalue::create($data); 
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
        $category = Categoryproduct::all();
        $data = Products::findOrFail($id);
        $attribute = DB::table('attributevalues')
            ->select('attributevalues.*')
            ->where('product_id','=',$id)
            ->get();
        return view('backend.pages.editproduct',['data'=>$data,'attribute'=>$attribute,'categoryproducts'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = array(
            'name' =>  'required',
            'price' =>  'required|numeric|min:1',
            'qty'        =>  'required|numeric|min:1',
            'category_product'        =>  'required',
            'hot'        =>  'required',
            'del'        =>  'required',
            'content'        =>  'required',
            'size'  => 'required'
        );
        if($request->sale!=''){
            $rules['sale'] = 'numeric|min:1';
        }
        if($request->hasFile('image')){
            $rules['image'] = 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()]);
        }
        $input_images = '';
        if($request->hasFile('image')){
            Storage::delete('public/products/'.$request->image_last);
            $destination_path = 'public/products';
            $image = $request->file('image');
            $image_name = Carbon::now()->timestamp;
            $path = $image->storeAs($destination_path,$image_name);
            $input_images = $image_name;
            $form_data = array(
                'name'    =>  $request->name,
                'price'     =>  $request->price,
                'sale'    =>  $request->sale,
                'images'     =>  $input_images,
                'qty'     =>  $request->qty,
                'category_product_id'     =>  $request->category_product,
                'is_hot'    =>  $request->hot,
                'is_del'    =>  $request->del,
                'description'    =>  $request->content
            );
            Products::whereId($request->id)->update($form_data);
        }else{
            $form_data = array(
                'name'    =>  $request->name,
                'price'     =>  $request->price,
                'sale'    =>  $request->sale,
                'qty'     =>  $request->qty,
                'category_product_id'     =>  $request->category_product,
                'is_hot'    =>  $request->hot,
                'is_del'    =>  $request->del,
                'description'    =>  $request->content
            );
            Products::whereId($request->id)->update($form_data);
        }
        DB::table('attributevalues')->where('product_id', '=', $request->id)->delete();
        foreach($request->size as $size){
            $data = array(
                'attribute_id' => '1',
                'product_id' =>$request->id,
                'value' => $size
            );
            Attributevalue::create($data); 
        }
        if($input_images!=''){
            return response()->json(['success' => 'Data Add Successfully.','img' => $input_images]);
        }
        return response()->json(['success' => 'Data Add Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = DB::table('imagesproducts')
        ->select('images')
        ->where('product_id','=',$id)
        ->get();
        foreach($images as $item){
            Storage::delete('public/products/'.$item->images);
        }
        DB::table('imagesproducts')->where('product_id', '=', $id)->delete();
        $data = Products::findOrFail($id);
        $delete_file = Storage::delete('public/products/'.$data->images);
        $data->delete();
        DB::table('attributevalues')->where('product_id', '=', $id)->delete();
        return response()->json(['success' => 'Delete Data successfully.']);
    }
}
