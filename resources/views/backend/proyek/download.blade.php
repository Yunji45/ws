<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Proyek Yang Sudah Berjalan</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Produk</th>
				<th>Proyek</th>
				<th>Pelanggan</th>
				<th>Telepon</th>
				<th>Lokasi</th>
                <th>Status</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($proyek as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->produk->nama_produk}}</td>
				<td>{{$p->nama_proyek}}</td>
				<td>{{$p->nama_pelanggan}}</td>
				<td>{{$p->telp}}</td>
				<td>{{$p->lokasi}}</td>
                <td>{{$p->status}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>





