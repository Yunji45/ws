<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\proyek;
use App\Models\produk;
use App\Models\User;
use ErrorException;
use Illuminate\Support\Facades\Session;
use Storage;
use Auth;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Proyek';
        $data = proyek::all();
        return view ('backend.proyek.index',compact('data','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Proyek';
        $produk = produk::all();
        $data = proyek::all();
        return view ('backend.proyek.create',compact('title','produk','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     if ($request->hasFile('galeri') && $request->file('galeri')->isValid()) {
    //         try {
    //             $image = $request->file('galeri');
    //             $nama = time() . "_" . $image->getClientOriginalName();
    //             $tujuan_upload = public_path().'\images\proyek';
    //             $image->move($tujuan_upload, $nama);
    //             // $requestData["galeri"]= '/storage'.$nama;
    //             $proyek = new proyek;
    //             $proyek->produk_id = $request->input('produk_id');
    //             $proyek->user_id = Auth::user()->id;
    //             $proyek->nama_proyek = $request->input('nama_proyek');
    //             $proyek->nama_pelanggan = $request->input('nama_pelanggan');
    //             $proyek->telp = $request->input('telp');
    //             $proyek->lokasi = $request->input('lokasi');
    //             $proyek->status = $request->input('status');
    //             $proyek->galeri = $nama;
    //             $proyek->save();
                
    //             Session::flash('success', 'Data Tamu Berhasil ditambah!');
    //             return redirect('/proyek');
    //             // return $proyek;
    //         } catch (Exception $e) {
    //             throw new Exception($e->getMessage());
    //         }
    //     } else {
    //         return "ubah galeri mu ke file png";
    //     }

    // }
    public function store(Request $request)
    {
        try {
            $proyek = new proyek;
            $proyek->produk_id = $request->input('produk_id');
            $proyek->user_id = Auth::user()->id;
            $proyek->nama_proyek = $request->input('nama_proyek');
            $proyek->nama_pelanggan = $request->input('nama_pelanggan');
            $proyek->telp = $request->input('telp');
            $proyek->lokasi = $request->input('lokasi');
            $proyek->status = $request->input('status');

            // Loop untuk mengunggah gambar ke 10 kolom galeri
            for ($i = 1; $i <= 10; $i++) {
                $kolom_galeri = 'galeri' . $i;
                if ($request->hasFile($kolom_galeri) && $request->file($kolom_galeri)->isValid()) {
                    $image = $request->file($kolom_galeri);
                    $nama = time() . "_galeri" . $i . "_" . $image->getClientOriginalName();
                    $tujuan_upload = public_path('images/proyek');
                    $image->move($tujuan_upload, $nama);
                    $proyek->$kolom_galeri = $nama;
                } else {
                    // Jika gambar tidak diunggah, atur kolom galeri menjadi null
                    $proyek->$kolom_galeri = null;
                }
            }

            $proyek->save();

            return redirect('/proyek')->with('success', 'Data Proyek berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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
        $title = 'Proyek';
        $data = proyek::find($id);
        $produk = produk::all();
        return view('backend.proyek.edit',compact('title','data','produk'));
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
        if ($request->hasFile('galeri') && $request->file('galeri')->isValid()) {
            try {
                $image = $request->file('galeri');
                $nama = time() . "_" . $image->getClientOriginalName();
                $tujuan_upload = public_path().'\images\proyek';
                $image->move($tujuan_upload, $nama);
                
                // Ambil data proyek yang akan diperbarui berdasarkan ID
                $proyek = proyek::find($id);
                
                // Periksa jika proyek ditemukan
                if (!$proyek) {
                    return redirect('/proyek')->with('error', 'Proyek tidak ditemukan');
                }

                // Hapus gambar lama jika ada
                if ($proyek->galeri) {
                    Storage::delete('public/images/proyek/' . $proyek->galeri);
                }
                
                // Setel nilai-nilai yang ingin diperbarui
                $proyek->produk_id = $request->input('produk_id');
                $proyek->user_id = Auth::user()->id;
                $proyek->nama_proyek = $request->input('nama_proyek');
                $proyek->nama_pelanggan = $request->input('nama_pelanggan');
                $proyek->telp = $request->input('telp');
                $proyek->lokasi = $request->input('lokasi');
                $proyek->status = $request->input('status');
                $proyek->galeri = $nama;
                
                // Simpan perubahan
                $proyek->save();
                
                Session::flash('success', 'Data Proyek Berhasil diperbarui!');
                return redirect('/proyek');
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        } else {
            return "Ubah galeri Anda ke file PNG";
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data =proyek::find($id);
        $data ->delete();
        return redirect ('/proyek');
    }
}