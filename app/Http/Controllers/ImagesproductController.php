<?php

namespace App\Http\Controllers;

use App\Models\Imagesproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ImagesproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = DB::table('imagesproducts')
        ->select('*')
        ->Where('product_id','=',$id)
        ->get();
        return response()->json(['images_details'=>$data,'number'=>count($data)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Imagesproduct  $imagesproduct
     * @return \Illuminate\Http\Response
     */
    public function show(Imagesproduct $imagesproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imagesproduct  $imagesproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Imagesproduct $imagesproduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imagesproduct  $imagesproduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = array(
            'images' =>  'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()]);
        }
        // dd($request->id_product);
        $input_images = '';
        if($request->hasFile('images')){
            $destination_path = 'public/products';
            $image = $request->file('images');
            // lấy name
            // $image_name = $image->getClientOriginalName();
            $image_name = Carbon::now()->timestamp;
            $path = $image->storeAs($destination_path,$image_name);
            $input_images = $image_name;
        }
        $form_data = array(
            'product_id' => $request->id_product,
            'images' => $input_images
        );
        Imagesproduct::create($form_data);
        return response()->json(['success' => 'Data Add Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imagesproduct  $imagesproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        DB::table('imagesproducts')->where('images', '=', $name)->delete();
        return response()->json(['success' => 'Delete successfully.']);
    }
    
}
