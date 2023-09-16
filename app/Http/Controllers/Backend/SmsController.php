<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\smsGateway;
use App\Models\proyek;


class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'SMS Gateway';
        $data = smsGateway::all();
        return view('backend.sms.index',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'SMS Gateway';
        $produk = proyek::all();
        return view ('backend.sms.create',compact('title','produk'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = smsGateway::find($id);
        $data->delete();
        return redirect('/sms');

    }

    // public function sendsms()
    // {
    //     $sid = getenv("TWILIO_SID");
    //     $token = getenv("TWILIO_TOKEN");
    //     $phone = getenv("TWILIO_PHONE");
    //     $twilio = new Client($sid, $token);

    //     $message = $twilio -> messages -> create("+62 858 8063 1562", // to
    //             [
    //         "body" => "This is the ship that made the Kessel Run in fourteen parsecs?",
    //         "from" => $phone
    //     ]);
    //     dd($message);
    // }

    public function sendSMS(Request $request)
    {
        $sid = getenv("TWILIO_SID");
        $token = getenv("TWILIO_TOKEN");
        $phone = getenv("TWILIO_PHONE");
    
        // Inisialisasi klien Twilio
        $twilio = new Client($sid, $token);
        
        $nomorPenerima = $request->input('penerima'); 
    
        $body = $request->input('pesan');
    
        // Kirim SMS menggunakan Twilio dengan body dari request
        $message = $twilio->messages->create($nomorPenerima, [
            "body" => $body,
            "from" => $phone,
        ]);
    
        $data = new smsGateway;
        $data->proyek_id = $request->input('proyek_id');
        $data ->tanggal = now();
        $data->pesan = $body;
        $data->penerima = $nomorPenerima;
        $data->save();

        // return $data;
        return redirect('/sms');

    }
}
