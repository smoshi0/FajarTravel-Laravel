@extends('dashboardUser.layouts.main')

@section('container')
    <div class="my-5">
        <div class="row p-3">
            @if (session()->has('SuccessInput'))
                <div class="alert alert-primary alert-dismissible fade show col-lg-10" role="alert">
                    {{ session('SuccessInput') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h1>Pemesanan</h1>
            @if (count($pemesanans) == 0)
                <div class="d-flex align-items-center justify-content-center">
                    <h4>Anda Belum Memesan!</h4>
                </div>
            @else
                <table class="table table-bordered table-responsive table-sm text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mobil</th>
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
                                <td>{{ $pemesanan->no_tlp }}</td>
                                <td>{{ $pemesanan->total_hari }}</td>
                                <td>Rp {{ number_format($pemesanan->total_pembayaran) }}</td>
                                <td class="d-flex justify-content-around">
                                    <div>
                                        <a href="/dashboardUser/pemesanan/{{ $pemesanan->id }}/edit">
                                            <button class="btn btn-warning btn-sm">Edit</button>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="/dashboardUser/pembayaran/{{ $pemesanan->id }}">
                                            <button class="btn btn-success btn-sm">Bayar</button>
                                        </a>
                                    </div>
                                    <div>
                                        <form action="/dashboardUser/pemesanan/{{ $pemesanan->id }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin Akan Membatalkan Pemesanan?')">Batal
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
