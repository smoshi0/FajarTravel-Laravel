@extends('dashboardAdmin.layouts.main')

@section('container')

<h3>Create Data Pembayaran</h3>
<div class="row">
<div class="col-md-8">

    <form action="/dashboardAdmin/pembayaran" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
        <label for="no_plat">Nama Pemesan</label>
        <select name="pemesanan_id" id="pemesanan_id" class="form-select">
            <option value="">- Pilih Nama Pemesan -</option>
            @foreach ($pemesanans as $pemesan)
            <option value="{{ $pemesan->id }}">{{ $pemesan->nama }}</option>
            @endforeach
        </select>
    </div>
        
        <input type="date" name="tgl_bayar" id="tgl_bayar" value="{{ date('Y-m-d') }}" class="form-control" hidden>

    <div class="mb-3">
        <label for="formFile" class="form-label">Bukti Pembayaran</label>
        <input class="form-control" name="bukti_transfer" id="bukti_transfer" type="file" id="formFile">
      </div>
    <button  type="submit" onclick="cekPemesanan()">Submit</button>
</form>
</div>
</div>
<script>
    function cekPemesanan(){
        var a = document.getElementById("pemesanan_id").value;
        if(a == "" || a == null){
            alert("Mohon Isi Formulir Nama Pemesan");
            return false;
        }
    }
</script>
@endsection
