@extends('dashboardAdmin.layouts.main')

@section('container')
    <h3>Data Pemesanan</h3>
    @if (session()->has('SuccessInput'))
        <div class="alert alert-primary alert-dismissible fade show col-lg-10" role="alert">
            {{ session('SuccessInput') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="/dashboardAdmin/pemesanan/create">
        <button>Input</button>
    </a>
    <hr>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mobil</th>
                <th>Nama User</th>
                <th>Nama Lengkap</th>
                <th>No Telephon</th>
                <th>Alamat</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
                <th>Total Hari</th>
                <th>Total Pembayaran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemesanans as $pemesanan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pemesanan->car->nama_mobil }}</td>
                    <td>{{ $pemesanan->user->name }}</td>
                    <td>{{ $pemesanan->nama }}</td>
                    <td>{{ $pemesanan->no_tlp }}</td>
                    <td>{{ $pemesanan->alamat }}</td>
                    <td>{{ $pemesanan->tgl_awal }}</td>
                    <td>{{ $pemesanan->tgl_akhir }}</td>
                    <td>{{ $pemesanan->total_hari }}</td>
                    <td>Rp {{ number_format($pemesanan->total_pembayaran) }}</td>
                    <td>
                        <a href="/dashboardAdmin/pemesanan/{{ $pemesanan->id }}/edit">
                            <button class="btn btn-warning btn-sm">Edit</button>
                        </a>
                        <form action="/dashboardAdmin/pemesanan/{{ $pemesanan->id }}" method="post">
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
