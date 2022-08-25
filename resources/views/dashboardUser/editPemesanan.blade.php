@extends('dashboardUser.layouts.main')

@section('container')
    <div class="my-5">
        <div class="row p-3">
            <h3>Edit Data Pemesanan</h3>
            <div class="col-md-8">
                <form action="/dashboardUser/pemesanan/{{ $pemesanans->id }}" method="POST">
                    @method('put')
                    @csrf
                    <input type="text" name="user_id" id="user_id" value="{{ auth()->user()->id }}" hidden>
                    <input type="text" name="car_id" id="car_id" value="{{ $pemesanans->car_id }}" hidden>
                    <div>
                        <label for="nama">Nama Mobil</label>
                        <input type="text" value="{{ $pemesanans->car->nama_mobil }}" class="form-control">
                    </div>
                    {{-- <input type="text" name="car_id" id="car_id" value="{{ $pemesanans->id }}"> --}}
                    <input type="number" name="harga" id="harga" value="{{ $pemesanans->car->harga_sewa }}" hidden>
                    <div>
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="form-control"
                            value="{{ $pemesanans->nama }}" required>
                    </div>
                    <div>
                        <label for="no_tlp">Nomor Telepon</label>
                        <input type="number" name="no_tlp" id="no_tlp" class="form-control"
                            value="{{ $pemesanans->no_tlp }}" required>
                    </div>
                    <div>
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control"
                            value="{{ $pemesanans->alamat }}" required>
                    </div>
                    <div>
                        <label for="tgl_awal">Tanggal Awal</label>
                        <input type="date" name="tgl_awal" id="tgl_awal" class="form-control"
                            value="{{ $pemesanans->tgl_awal }}" onchange="cal()" required>
                    </div>
                    <div>
                        <label for="tgl_akhir">Tanggal Akhir</label>
                        <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control"
                            value="{{ $pemesanans->tgl_akhir }}" onchange="cal()" required>
                    </div>
                    <div>
                        <label for="total_hari">Total Hari</label>
                        <input type="number" name="total_hari" id="total_hari" class="form-control"
                            value="{{ $pemesanans->total_hari }}" onchange="bukanNumber()" readonly required>
                    </div>
                    <div class="mb-3">
                        <label for="total_pembayaran">Total Pembayaran</label>
                        <input type="text" name="total_pembayaran" id="total_pembayaran" class="form-control"
                            value="{{ $pemesanans->total_pembayaran }}" readonly required>
                    </div>
                    <input type="button" value="Cek Jumlah Pembayaran" id="cek_total" onclick="cekTotalPembayaran()">
                    <button type="submit" onclick="cekTotalPembayaran()">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
