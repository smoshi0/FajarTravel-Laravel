@extends('dashboardUser.layouts.main');

@section('container')
    <div class="my-5">
        @if (session()->has('SuccessInput'))
            <div class="alert alert-primary alert-dismissible fade show col-lg-10" role="alert">
                {{ session('SuccessInput') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
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
                                <a href="/dashboardUser/pemesanan/{{ $mobil->id }}" class="btn btn-primary">Pesan
                                    Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
