@extends('dashboardUser.layouts.main')

@section('container')
    <div class="my-5">
        <div class="row p-3">
            <h1>Pemesanan</h1>
            @if (count($pemesanans) == 0)
                <div class="d-flex align-items-center justify-content-center">
                    <h4>Anda Belum Memesan!</h4>
                </div>
            @else
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mobil</th>
                            <th>Nama User</th>
                            <th>Nama Lengkap</th>
                            <th>No Telephon</th>
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
            @endif
        </div>
    </div>
@endsection
