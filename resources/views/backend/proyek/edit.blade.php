@extends('layouts.app') 
@section('tabel')
<section class="section">
    <div class="section-header">
        <h1>{{$title}}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{route('proyek.index')}}">Dashboard</a>
            </div>
            <div class="breadcrumb-item">{{$title}}</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">{{$title}}</h2>

        <div class="row">
            <div class="col-12">
            <div class="card">
                    <form action="/proyek/{{$data->id}}/update" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Proyek</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="nama_proyek" id="nama_proyek" value="{{ old('nama_proyek', $data->nama_proyek ?? '')}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pelanggan</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" value="{{ old('nama_pelanggan', $data->nama_pelanggan ?? '')}}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Produk</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control" name="produk_id" id="produk_id" value="{{ old('produk_id', $data->produk_id ?? '')}}">
                                        @foreach($produk as $item)
                                        <option value="{{$item->id}}">{{$item->nama_produk}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control" name="status" id="status" value="{{ old('status', $data->status ?? '')}}">
                                        <option value="">[Pilih Status]</option>
                                        <option value="onproses">On Progress</option>
                                        <option vlaue="finish">Finish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No.Telp</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="phone" class="form-control" name="telp" id="telp" value="{{ old('telp', $data->telp ?? '')}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Photo</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" class="form-control" name="galeri" id="galeri" onchange="previewimage()">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="lokasi" id="lokasi" value="{{ old('lokasi', $data->lokasi ?? '')}}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Add
                                        {{$title}}</button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
</div>
</section>
<script>
    function previewimage()
    {
        const image = document.querySelector('#photo');
        const imagePreview = document.querySelector('.img-preview');
        imagePreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function (oFREvent){
            imgPreview.src=oFREvent.target.result;
        }

    }
</script>
@endsection