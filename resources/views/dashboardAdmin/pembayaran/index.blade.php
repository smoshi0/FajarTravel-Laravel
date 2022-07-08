@extends('dashboardAdmin.layouts.main')

@section('container')
    <h3>Data Pembayaran</h3>
    @if (session()->has('SuccessInput'))
        <div class="alert alert-primary alert-dismissible fade show col-lg-10" role="alert">
            {{ session('SuccessInput') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/dashboardAdmin/pembayaran/create">
        <button>Input</button>
    </a>
    <hr>
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayarans as $bayar)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $bayar->pemesanan->nama }}</td>
                    <td>{{ $bayar->pemesanan->car->nama_mobil }}</td>
                    <td>Rp {{ number_format($bayar->pemesanan->total_pembayaran) }}</td>
                    <td>{{ $bayar->tgl_bayar }}</td>
                    <td><img src="{{ asset('storage/' . $bayar->bukti_transfer) }}" alt="" width="70px"
                            height="70px"></td>
                    <td>{{ $bayar->accept }}</td>
                    <td>
                        <a href="/dashboardAdmin/pembayaran/{{ $bayar->id }}">
                            <button class="btn btn-success btn-sm">Detail</button>
                        </a>
                        <a href="/dashboardAdmin/pembayaran/{{ $bayar->id }}/edit">
                            <button class="btn btn-warning btn-sm">Edit</button>
                        </a>
                        <form action="/dashboardAdmin/pembayaran/{{ $bayar->id }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin Akan Menghapus Data?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
