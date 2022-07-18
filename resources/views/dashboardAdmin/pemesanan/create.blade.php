@extends('dashboardAdmin.layouts.main')

@section('container')
    <h3>Create Data Pemesanan</h3>
    <div class="row">
        <div class="col-md-8">
            <form action="/dashboardAdmin/pemesanan" method="POST">
                @csrf
                <div>
                    <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                    <label for="no_plat">Nama Mobil</label>
                    <select name="car_id" id="car_id" class="form-select" onchange="myFunction()">
                        <option value="">- Pilih Mobil -</option>
                        @foreach ($mobils as $mobil)
                            <option value="{{ $mobil->id }}">{{ $mobil->nama_mobil }}</option>
                        @endforeach
                    </select>
                    <select name="sewa" id="sewa" class="form-control" onchange="myFunction()" hidden>
                        <option value="">- Pilih Mobil -</option>
                        @foreach ($mobils as $mobil)
                            <option value="{{ $mobil->id }}">{{ $mobil->harga_sewa }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="number" name="harga" id="harga" value="" hidden>
                <div>
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>
                <div>
                    <label for="no_tlp">Nomor Telepon</label>
                    <input type="number" name="no_tlp" id="no_tlp" class="form-control" required>
                </div>
                <div>
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" required>
                </div>
                <div>
                    <label for="tgl_awal">Tanggal Awal</label>
                    <input type="date" name="tgl_awal" id="tgl_awal" class="form-control" onchange="cal()" required>
                </div>
                <div>
                    <label for="tgl_akhir">Tanggal Akhir</label>
                    <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" onchange="cal()" required>
                </div>
                <div>
                    <label for="total_hari">Total Hari</label>
                    <input type="number" name="total_hari" id="total_hari" class="form-control" onchange="bukanNumber()"
                        readonly required>
                </div>
                <div class="mb-3">
                    <label for="total_pembayaran">Total Pembayaran</label>
                    <input type="text" name="total_pembayaran" id="total_pembayaran" class="form-control" readonly
                        required>
                </div>
                <input type="button" value="Cek Jumlah Pembayaran" id="cek_total" onclick="cekTotalPembayaran()">
                <button type="submit" onclick="cekTotalPembayaran()">Submit</button>
            </form>
        </div>
    </div>
@endsection
