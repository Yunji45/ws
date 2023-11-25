@extends('layouts.app')

@section('tabel')
<section class="section">
          <div class="section-header">
            <h1>{{$title}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">{{$title}}</div>
            </div>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                
                  <div class="card-body">
                    <div class="section-title">Tabel {{$title}}</div>
                      <div class="buttons">
                        <a href="{{route('proyek.create')}}" class="btn btn-primary" >Tambah {{$title}}</a>
                        <a href="{{route('cetak.proyek')}}" class="btn btn-success" target="_blank">Cetak</a>
                      </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-white">
                          <thead>
                            <tr>
                              <th scope="col" class="text-center">No</th>
                              <th scope="col" class="text-center">Produk</th>
                              <th scope="col" class="text-center">Proyek</th>
                              <th scope="col" class="text-center">Pelanggan</th>
                              <th scope="col" class="text-center">No.telp</th>
                              <th scope="col" class="text-center">Lokasi</th>
                              <th scope="col" class="text-center">Status</th>
                              <th scope="col" class="text-center">Galeri</th>
                              <th scope="col" class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          @php $no =1; @endphp @foreach ($data as $item)
                          <tr>
                                <td class="text-center">{{$no++}}</td>
                                <td class="text-center">{{$item->produk->nama_produk}}</td>
                                <td class="text-center">{{$item->nama_proyek}}</td>
                                <td class="text-center">{{$item->nama_pelanggan}}</td>
                                <td class="text-center">{{$item->telp}}</td>
                                <td class="text-center">{{$item->lokasi}}</td>
                                <td class="text-center">{{$item->status}}</td>
                                <td class="text-center"><img src="{{ asset('images/proyek/' . $item->galeri) }}" alt="foto" widht="50" height="30"></td>
                                <td class="text-center">
                                    <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                        <a href="/proyek/ {{$item->id}} /destroy" class="btn btn-danger" onclick="return confirm('Yakin akan dihapus?')"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <a href="/proyek/ {{$item->id}} /edit" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
                                        <a href="{{route('detail.proyek', $item->id)}}" class="btn btn-info"><i class="far fa-eye"></i> Detail</a>
                                        <a href="{{route('cetak.per.proyek' ,$item->id)}}" class="btn btn-success"><i class="far fa-download"></i> Unduh</a>
                                        <!-- <a  class="btn btn-success"><i class="fas fa-eye"></i></a> -->
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
                
              </div>
              
            </div>
          </div>
        </section>
       
        <style>
            .card-body {
                position: relative;
            }

            .buttons {
                position: absolute;
                top: 10px;
                right: 10px;
            }
        </style>
@endsection