@extends('dashboardAdmin.layouts.main')

@section('container')
    <h3>Data Pembayaran</h3>
    @if (session()->has('SuccessInput'))
        <div class="alert alert-primary alert-dismissible fade show col-lg-10" role="alert">
            {{ session('SuccessInput') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Nama Mobil</th>
                <th>Jumlah Pembayaran</th>
                <th>Tanggal Transfer</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $pembayarans->pemesanan->nama }}</td>
                <td>{{ $pembayarans->pemesanan->car->nama_mobil }}</td>
                <td>Rp {{ number_format($pembayarans->pemesanan->total_pembayaran) }}</td>
                <td>{{ $pembayarans->tgl_bayar }}</td>
                <td><img src="{{ asset('storage/' . $pembayarans->bukti_transfer) }}" alt="" width="70px"
                        height="70px"></td>
                <td>{{ $pembayarans->accept }}</td>
            </tr>
        </tbody>
    </table>
@endsection
