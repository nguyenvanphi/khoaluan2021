<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
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
            $data = Contact::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" class="btn btn-danger deletecontact" id="'.$data->id.'" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>';
                        $button .= '<a href="/shopthegmen/editcontacts/'.$data->id.'/edit" class="btn btn-info buttonedit" id="'.$data->id.'"><i class="fa fa-eye"></i> Xem</a>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('backend.pages.contacts');
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
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Contact::findOrFail($id);
        return view('backend.pages.editcontact',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = Contact::findOrFail($request->id);
        if($data->status==$request->status){
            return response()->json(['success' => 1]);
        }
        $update = array(
            'status' => $request->status,
        );
        Contact::whereId($request->id)->update($update);
        return response()->json(['success' => 2]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Contact::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Delete Data successfully.']);
    }

    public function viewcontact(){
        return view('frontend.pages.contact');
    }

    public function sendmail(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
            $data = array(
                'name'      =>  $request->name,
                'email'     => $request->email,
                'title'   => $request->subject,
                'message'   =>   $request->message
            );
            Contact::create($data);
        Mail::to('17T1021197@husc.edu.vn')->send(new SendMail($data));

        return back()->with('success', 'Thanks for contacting us!');      
    }
}
