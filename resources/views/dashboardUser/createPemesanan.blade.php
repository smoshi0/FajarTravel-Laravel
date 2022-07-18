@extends('dashboardUser.layouts.main')

@section('container')
    <div class="my-5">
        <div class="row p-3">
            <h3>Create Data Pemesanan</h3>
            <div class="col-md-8">
                <form action="/dashboardUser" method="POST">
                    @csrf
                    <input type="text" name="user_id" id="user_id" value="{{ auth()->user()->id }}" hidden>
                    @foreach ($mobils as $item)
                        <div>
                            <label for="nama">Nama Mobil</label>
                            <input type="text" value="{{ $item->nama_mobil }}" class="form-control" disabled readonly>
                        </div>
                        <input type="text" name="car_id" id="car_id" value="{{ $item->id }}" hidden>
                        <input type="number" name="harga" id="harga" value="{{ $item->harga_sewa }}" hidden>
                    @endforeach
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
                        <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" onchange="cal()"
                            required>
                    </div>
                    <div>
                        <label for="total_hari">Total Hari</label>
                        <input type="number" name="total_hari" id="total_hari" class="form-control"
                            onchange="bukanNumber()" readonly required>
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
    </div>
@endsection
