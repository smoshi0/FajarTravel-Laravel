@extends('dashboardAdmin.layouts.main')

@section('container')

<h3>Edit Data Pemesanan</h3>
<div class="row">
<div class="col-md-8">

    <form action="/dashboardAdmin/pemesanan/{{ $pemesanans->id }}" method="POST">
        @method('put')
        @csrf
    <div>
        <label for="no_plat">Nama Mobil</label>
        <select name="car_id" id="car_id" class="form-select" onchange="myFunction()">
            @foreach ($mobils as $mobil)
            @if ($pemesanans->car_id == $mobil->id)
            <option value="{{ $mobil->id }}" selected>{{ $mobil->nama_mobil }}</option>
            @else
            <option value="{{ $mobil->id }}">{{ $mobil->nama_mobil }}</option>
            @endif
            @endforeach
        </select>
        <select name="sewa" id="sewa" class="form-control" onchange="myFunction()" hidden>
            @foreach ($mobils as $mobil)
            @if ($pemesanans->car_id == $mobil->id)
            <option value="{{ $mobil->id }}" selected>{{ $mobil->harga_sewa }}</option>
            @else
            <option value="{{ $mobil->id }}">{{ $mobil->harga_sewa }}</option>
            @endif
            @endforeach
        </select>
    </div>
    
        <input type="number" name="harga" id="harga" value="{{ $pemesanans->car->harga_sewa }}" hidden>

        
    <div>
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" class="form-control" required value="{{ $pemesanans->nama }}">
    </div>
    <div>
        <label for="no_tlp">Nomor Telepon</label>
        <input type="number" name="no_tlp" id="no_tlp" class="form-control" value="{{ $pemesanans->no_tlp }}" required>
    </div>
    <div>
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $pemesanans->alamat }}" required>
    </div>
    <div>
        <label for="tgl_awal">Tanggal Awal</label>
        <input type="date" name="tgl_awal" id="tgl_awal" class="form-control" value="{{ $pemesanans->tgl_awal }}" onchange="cal()" required>
    </div>
    <div>
        <label for="tgl_akhir">Tanggal Akhir</label>
        <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" value="{{ $pemesanans->tgl_akhir }}" onchange="cal()" required>
    </div>
    <div>
        <label for="total_hari">Total Hari</label>
        <input type="number" name="total_hari" id="total_hari" class="form-control" value="{{ $pemesanans->total_hari }}" onchange="bukanNumber()" readonly required>
    </div>
    <div>
        <label for="cekbok">
        <input type="checkbox"  name="cekbok" id="cekbok" onclick="cobaKlik()"> Tambah Jasa Supir (Rp.100.000/Hari)
        </label>
        
        <br>
        <input type="number" id="cok" value="0" hidden>
    </div>
    <div>
        <label for="total_pembayaran">Total Pembayaran</label>
        <input type="text" name="total_pembayaran" id="total_pembayaran" class="form-control"  value="{{ $pemesanans->total_pembayaran }}" readonly required>
    </div>
    <input type="button" value="Cek Jumlah Pembayaran" id="cek_total" onclick="cekTotalPembayaran()">
    <button  type="submit" onclick="cekTotalPembayaran()">Submit</button>
</form>
</div>
</div>

<script>
    function cekTotalPembayaran(){
        var a = document.getElementById("harga").value;
        var b = document.getElementById("total_hari").value;
        var c = document.getElementById("cok").value;
        if(a == "" || a == null){
            alert("Mohon Isi Formulir Mobil Dengan Benar");
            return false;
        }
        if( b == "" || b == null || b <= 0 ){
            alert("Mohon Isi Formulir Tanggal Penyewaan Dengan Benar");
            return false;
        }
        var jumlah = (a*b)+(b*c)
        document.getElementById("total_pembayaran").value = jumlah;
    }
</script>



<script>
    function cekTotalPembayarans(){
        var a = document.getElementById("harga").value;
        var b = document.getElementById("total_hari").value;
        var c = document.getElementById("cok").value;

        var jumlah = (a*b)+(b*c)
        document.getElementById("total_pembayaran").value = jumlah;
    }
</script>

<script>
    function myFunction(){
    var x = document.getElementById("car_id");
    var y = document.getElementById("sewa");
    y.options[y.selectedIndex].value = x.options[x.selectedIndex].value;
    document.getElementById("harga").value = y.options[x.selectedIndex].text;
    }
</script>

<script>
    function cobaKlik(){
        const cek = document.getElementById("cekbok");
        if(cek.checked){
            document.getElementById("cok").value = 100000;
        }else{                    
            document.getElementById("cok").value = 0;
        }
    }
</script>
<script type="text/javascript">
    function GetDays(){
            var dropdt = new Date(document.getElementById("tgl_akhir").value);
            var pickdt = new Date(document.getElementById("tgl_awal").value);
            return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
    }

    function cal(){
    if(document.getElementById("tgl_akhir")){
        document.getElementById("total_hari").value=GetDays();
        }  
    }
</script>
@endsection
