<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = DB::table('infos')->first();
        return view('backend.pages.info',['info'=>$info]);
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
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function show(Info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function edit(Info $info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $info)
    {
        $rules = array(
            'id'        =>  'required',
            'web_name'        =>  'required',
            'name' =>  'required',
            'email'  =>  'required|email',
            'phone' => 'required|numeric|min:10|max:11',
            'address' => 'required|string',
            'link_fb' => 'required|string',
            'link_ytb' => 'required|string',
            'link_in' => 'required|string',
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
            'web_name'    =>  $request->web_name,
            'name'    =>  $request->name,
            'email'     =>  $request->email,
            'phone'    =>  $request->phone,
            'address'     =>  $request->address,
            'link_fb'    =>  $request->link_fb,
            'link_ytb'     =>  $request->link_ytb,
            'link_in'    =>  $request->link_in
        );
        Info::whereId($request->id)->update($form_data);  
        return response()->json(['success' => 'Data Update successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Info  $info
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info $info)
    {
        //
    }
}
