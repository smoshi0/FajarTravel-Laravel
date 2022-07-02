@extends('dashboardAdmin.layouts.main')

@section('container')
<h3>Create Data Mobil</h3>

<form action="/dashboardAdmin/car" method="POST">
    @csrf
    <div>
        <label for="no_plat">No Plat</label>
        <input type="text" name="no_plat" id="no_plat">
    </div>
    <div>
        <label for="nama_mobil">Nama Mobil</label>
        <input type="text" name="nama_mobil" id="nama_mobil">
    </div>
    <div>
        <label for="jenis_bbm">Jenis BBM</label>
        <input type="text" name="jenis_bbm" id="jenis_bbm">
    </div>
    <div>
        <label for="harga_sewa">Harga Sewa</label>
        <input type="text" name="harga_sewa" id="harga_sewa">
    </div>
    <input type="submit">
</form>
@endsection