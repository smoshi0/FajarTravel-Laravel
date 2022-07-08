@extends('dashboardAdmin.layouts.main')

@section('container')
    <h3>Edit Data Pembayaran</h3>
    <div class="row">
        <div class="col-md-8">
            <form action="/dashboardAdmin/pembayaran/{{ $pembayarans->id }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <input type="hidden" name="pemesanan_id" id="pemesanan_id" value="{{ $pembayarans->pemesanan_id }}">
                <input type="hidden" name="accept" id="accept" value="{{ $pembayarans->accept }}">
                <div class="mb-3">
                    <label for="no_plat">Nama Pemesan</label>
                    <input type="text" class="form-control" placeholder="{{ $pembayarans->pemesanan->nama }}" readonly
                        disabled>
                </div>
                <div class="mb-3">
                    <label for="no_plat">Tanggal Pembayaran</label>
                    <input type="date" name="tgl_bayar" id="tgl_bayar" value="{{ $pembayarans->tgl_bayar }}"
                        class="form-control">
                    @error('tgl_bayar')
                        <small>
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Bukti Pembayaran</label>
                    <input type="hidden" name="oldImg" value="{{ $pembayarans->bukti_transfer }}">
                    @if ($pembayarans->bukti_transfer)
                        <img src="{{ asset('storage/' . $pembayarans->bukti_transfer) }}"
                            class="img-preview img-fluid mb-3 col-md-4 d-block">
                    @endif
                    <input class="form-control @error('bukti_transfer') is-invalid @enderror" name="bukti_transfer"
                        id="bukti_transfer" type="file" id="formFile" onchange="previewImg()">
                    @error('bukti_transfer')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="harga_sewa">Status</label>
                    @if ($pembayarans->accept == 'pending')
                        <br>
                        <input type="radio" name="accept" id="accept" value="pending" checked> Pending
                        <br>
                        <input type="radio" name="accept" id="accept" value="accept"> Accept
                    @else
                        <br>
                        <input type="radio" name="accept" id="accept" value="pending"> Pending
                        <br>
                        <input type="radio" name="accept" id="accept" value="accept" checked> Accept
                    @endif
                </div>
                <button type="submit">Edit</button>
            </form>
        </div>
    </div>
    <script>
        function previewImg() {
            const img = document.querySelector('#bukti_transfer');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(img.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
