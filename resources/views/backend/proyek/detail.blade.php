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

    <section class="product-container">
        <!-- left side -->
        <div class="img-card">
            <img src="{{ asset('images/proyek/' . $data->galeri1) }}" alt="" id="featured-image">
            <!-- small img -->
            <div class="small-Card">
                <img src="{{ asset('images/proyek/' . $data->galeri2) }}" alt="" class="small-Img">
                <img src="{{ asset('images/proyek/' . $data->galeri3) }}" alt="" class="small-Img">
                <img src="{{ asset('images/proyek/' . $data->galeri4) }}" alt="" class="small-Img">
                <img src="{{ asset('images/proyek/' . $data->galeri5) }}" alt="" class="small-Img">
                <img src="{{ asset('images/proyek/' . $data->galeri6) }}" alt="" class="small-Img">
            </div>
            <div class="small-Card">
                <img src="{{ asset('images/proyek/' . $data->galeri7) }}" alt="" class="small-Img">
                <img src="{{ asset('images/proyek/' . $data->galeri8) }}" alt="" class="small-Img">
                <img src="{{ asset('images/proyek/' . $data->galeri9) }}" alt="" class="small-Img">
                <img src="{{ asset('images/proyek/' . $data->galeri10) }}" alt="" class="small-Img">
            </div>

        </div>
        <!-- Right side -->
        <div class="product-info">
            <h3>{{$data ->nama_proyek}}</h3>
            <h5>Harga Jual: {{'Rp.' . number_format(floatval($data->harga_jual), 0, ',', '.')}}</h5>
            <div>
                <p>Status: {{$data->status}}</p>
                <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100" style="width: {{ $data->bar_progress }}%">
                        {{ $data->bar_progress }}%
                    </div>
                </div>
                <hr>
                <div class="delivery">
                    <p>TYPE</p> <p>KETERANGAN</p>
                </div>
                <hr>
                <div class="delivery">
                    <p>Nama Proyek</p> 
                    <p>{{$data ->nama_proyek}}</p> 
                </div>
                <div class="delivery">
                    <p>Produk</p> 
                    <p>{{$data->produk->nama_produk}}</p> 
                </div>
                <div class="delivery">
                    <p>Nama Pelanggan</p> 
                    <p>{{$data->nama_pelanggan}}</p> 
                </div>
                <div class="delivery">
                    <p>No.Telp</p> 
                    <p>{{$data->telp}}</p> 
                </div>
                <div class="delivery">
                    <p>Lokasi</p> 
                    <p>{{$data->lokasi}}</p> 
                </div>
                <div class="delivery">
                    <p>Harga Jual</p> 
                    <p>Rp {{ number_format($data->harga_jual, 0, ',', '.') }}</p>
                </div>
                <div class="delivery">
                    <p>Modal</p> 
                    <p>Rp {{ number_format($data->modal, 0, ',', '.') }}</p>
                </div>
                <div class="delivery">
                    <p>Keuntungan</p> 
                    <p>Rp {{ number_format($data->keuntungan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </section>
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
<style>
    * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
body {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 30px;
}

header {
  margin-bottom: 20px;
}

.product-container {
  display: flex;
  justify-content: start;
  align-items: start;
  gap: 40px;
}

/* .img-card{
    width: 40%;
} */

.img-card img {
  width: 100%;
  flex-shrink: 0;
  border-radius: 4px;
  height: 520px;
  object-fit: cover;
}

.small-Card {
  display: flex;
  justify-content: start;
  align-items: center;
  margin-top: 15px;
  gap: 12px;
}

.small-Card img {
  width: 104px;
  height: 104px;
  border-radius: 4px;
  cursor: pointer;
}

.small-Card img:active {
  border: 1px solid #17696a;
}

.sm-card {
  border: 2px solid darkred;
}

.product-info{
  width: 60%;
}
.product-info h3 {
  font-size: 32px;
  font-family: Lato;
  font-weight: 600;
  line-height: 130%;
}

.product-info h5 {
  font-size: 24px;
  font-family: Lato;
  font-weight: 500;
  line-height: 130%;
  color: #ff4242;
  margin: 6px 0;
}

.product-info del {
  color: #a9a9a9;
}

.product-info p {
  color: #424551;
  margin: 15px 0;
  width: 70%;
}

.sizes p {
  font-size: 22px;
  color: black;
}

.size-option {
  width: 200px;
  height: 30px;
  margin-bottom: 15px;
  padding: 5px;
}

.quantity input {
  width: 51px;
  height: 33px;
  margin-bottom: 15px;
  padding: 6px;
}

button {
  background: #17696a;
  border-radius: 4px;
  padding: 10px 37px;
  border: none;
  color: white;
  font-weight: 600;
}

button:hover {
  background: #ff4242;
  transition: ease-in 0.4s;
}

.delivery {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 70%;
  color: #787a80;
  font-size: 12px;
  font-family: Lato;
  line-height: 150%;
  letter-spacing: 1px;
}

hr {
  color: #787a80;
  width: 58%;
  opacity: 0.67;
}

.pagination {
    color: #787a80;
    margin: 15px 0;
    cursor: pointer;
}

@media screen and (max-width: 576px) {
  .product-container{
    flex-direction: column;
  }
  .small-Card img{
    width: 80px;
  }
  .product-info{
    width: 100%;
  }
  echo "# product-details-page-html-css-js" >> README.md
  .product-info p{
    width: 100%;
  }

  .delivery{
    width: 100%;
  }

  hr{
    width: 100%;
  }
}
</style>
<script>
    let featuedImg = document.getElementById('featured-image');
let smallImgs = document.getElementsByClassName('small-Img');

smallImgs[0].addEventListener('click', () => {
    featuedImg.src = smallImgs[0].src;
    smallImgs[0].classList.add('sm-card')
    smallImgs[1].classList.remove('sm-card')
    smallImgs[2].classList.remove('sm-card')
    smallImgs[3].classList.remove('sm-card')
    smallImgs[4].classList.remove('sm-card')
})
smallImgs[1].addEventListener('click', () => {
    featuedImg.src = smallImgs[1].src;
    smallImgs[0].classList.remove('sm-card')
    smallImgs[1].classList.add('sm-card')
    smallImgs[2].classList.remove('sm-card')
    smallImgs[3].classList.remove('sm-card')
    smallImgs[4].classList.remove('sm-card')
})
smallImgs[2].addEventListener('click', () => {
    featuedImg.src = smallImgs[2].src;
    smallImgs[0].classList.remove('sm-card')
    smallImgs[1].classList.remove('sm-card')
    smallImgs[2].classList.add('sm-card')
    smallImgs[3].classList.remove('sm-card')
    smallImgs[4].classList.remove('sm-card')
})
smallImgs[3].addEventListener('click', () => {
    featuedImg.src = smallImgs[3].src;
    smallImgs[0].classList.remove('sm-card')
    smallImgs[1].classList.remove('sm-card')
    smallImgs[2].classList.remove('sm-card')
    smallImgs[3].classList.add('sm-card')
    smallImgs[4].classList.remove('sm-card')
})
smallImgs[4].addEventListener('click', () => {
    featuedImg.src = smallImgs[4].src;
    smallImgs[0].classList.remove('sm-card')
    smallImgs[1].classList.remove('sm-card')
    smallImgs[2].classList.remove('sm-card')
    smallImgs[3].classList.remove('sm-card')
    smallImgs[4].classList.add('sm-card')
})
</script>
@endsection