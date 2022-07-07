@extends('dashboardAdmin.layouts.main')

@section('container')
    <h3>Data Mobil</h3>
    @if (session()->has('SuccessInput'))
        <div class="alert alert-primary alert-dismissible fade show col-lg-10" role="alert">
            {{ session('SuccessInput') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('gagalHapus'))
        <script>
            alert("{{ session('gagalHapus') }}");
        </script>
    @endif
    <a href="/dashboardAdmin/car/create">
        <button>Input</button>
    </a>
    <hr>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Plat</th>
                <th>Nama Mobil</th>
                <th>Jenis BBM</th>
                <th>Harga Sewa</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $car->no_plat }}</td>
                    <td>{{ $car->nama_mobil }}</td>
                    <td>{{ $car->jenis_bbm }}</td>
                    <td>{{ $car->harga_sewa }}</td>
                    @if ($car->status == 'idle')
                        <td class="text-success">
                            <strong>
                                {{ $car->status }}
                            </strong>
                        </td>
                    @else
                        <td class="text-danger">
                            <strong>
                                {{ $car->status }}
                            </strong>
                        </td>
                    @endif
                    <td>
                        <a href="/dashboardAdmin/car/{{ $car->id }}/edit">
                            <button class="btn btn-warning btn-sm">Edit</button>
                        </a>
                        <form action="/dashboardAdmin/car/{{ $car->id }}" method="post">
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
