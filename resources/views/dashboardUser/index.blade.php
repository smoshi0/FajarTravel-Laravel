@extends('dashboardUser.layouts.main');

@section('container')
    <h4 class="h2">Welcome, {{ auth()->user()->name }}</h4>
    <h4>Kamu Sebagai {{ auth()->user()->level }}</h4>
    <div class="row ">
        @if (count($mobils) === 0)
            <div class="col-md-12 p-3 d-flex align-items-center justify-content-center border">
                Semua Mobil Sedang Dibooking
            </div>
        @else
            <div class="col-md-12 p-3 d-flex align-items-center justify-content-center">
                <div class="h2">
                    Semua Mobil
                </div>
            </div>
            @foreach ($mobils as $mobil)
                <div class="col-md-4 p-3">
                    <div class="card shadow border">
                        <div class="card-body">
                            <h5 class="card-title">{{ $mobil->nama_mobil }}</h5>
                            <p class="card-text">{{ $mobil->no_plat }}</p>
                            <p class="card-text">{{ $mobil->harga_sewa }}</p>
                            <p class="card-text">{{ $mobil->jenis_bbm }}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <br>
    <form action="/logout" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection
