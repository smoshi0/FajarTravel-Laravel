@extends('dashboardAdmin.layouts.main')

@section('container')
    <h3>Create Data Pembayaran</h3>
    <div class="row">
        <div class="col-md-8">
            <form action="/dashboardAdmin/pembayaran" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="accept" id="accept" value="pending">
                <div class="mb-3">
                    <label for="no_plat">Nama Pemesan</label>
                    <select name="pemesanan_id" id="pemesanan_id" class="form-select">
                        <option value="">- Pilih Nama Pemesan -</option>
                        @foreach ($pemesanans as $pemesan)
                            <option value="{{ $pemesan->id }}">{{ $pemesan->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="date" name="tgl_bayar" id="tgl_bayar" value="{{ date('Y-m-d') }}" class="form-control"
                    hidden>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Bukti Transfer</label>
                    <img class="img-preview img-fluid my-3 col-md-4">
                    <input class="form-control @error('bukti_transfer') is-invalid @enderror" name="bukti_transfer"
                        id="bukti_transfer" type="file" id="formFile" onchange="previewImg()">
                    @error('bukti_transfer')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" onclick="cekPemesanan()">Submit</button>
            </form>
        </div>
    </div>
    <script>
        function cekPemesanan() {
            var a = document.getElementById("pemesanan_id").value;
            if (a == "" || a == null) {
                alert("Mohon Isi Formulir Nama Pemesan");
                return false;
            }
        }

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
