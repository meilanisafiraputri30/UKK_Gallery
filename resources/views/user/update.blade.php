@extends('layouts.navbar')
@section('tampilan')
<style>
    .container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 10px;
    }

    .card {
        /* border: 1px solid #ccc; */
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); /* Menambahkan bayangan */
        overflow: hidden;
    }

    .card-body {
        padding: 15px; /* Menambah ruang di dalam card */
    }

    .left {
        width: 45%;
    }

    .right {
        width: 45%;
    }

    .card img {
        width: 100%;
        height: auto;
        max-height: 500px; /* Maksimum tinggi foto */
        object-fit: cover; /* Untuk mempertahankan aspek rasio foto */
    }

    .form-group {
        margin-bottom: 10px;
        margin-right: 15px;
        margin-left: 15px;
        /* padding: 10px; */
        background-color: #f9f9f9;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="file"],
    textarea {
        width: 100%;
        /* padding: 8px; */
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    textarea {
        resize: vertical;
    }

    button {
        padding: 5px 5px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #0056b3;
      /* background-color: #0056b3; */
    }

</style>
<main role="main">
    <div class="container">
        <div class="left">
            <div class="card">
                <div class="card-body" style="background-color: #113D3C">
                    <img src="{{ asset('storage/foto/' . $foto->lokasifile) }}" alt="Foto" style="width:100%" id="previewImage">
                </div>
            </div>
        </div>
        <div class="right">
            <div class="card" style="background-color: #113D3C">
                <form action="{{ route('User.update', $foto->id)}}" method="post" enctype="multipart/form-data" id="uploadForm" style="background-color: #113D3C">
                    @method('PUT')
                    @csrf
                    <div class="judul mt-3" style="color: #F4EDDB"><center><h4><strong>Edit Data</strong></h4></center></div>
                    <div class="form-group mt-2" style="background-color: #113D3C">
                        <label for="lokasifile" style="color: #F4EDDB">Gambar:</label>
                        <input type="file" id="foto" name="lokasifile" onchange="previewFile()" style="background-color: #F4EDDB; color:#113D3C">
                    </div>
                    <div class="form-group" style="background-color: #113D3C">
                        <label for="title" style="background-color: #113D3C; color: #F4EDDB">Title:</label>
                        <input type="text" id="judulfoto" style="background-color: #F4EDDB; color:#113D3C" name="judulfoto" value="{{ $foto->judulfoto }}" required>
                    </div>
                    <div class="form-group" style="background-color: #113D3C;">
                        <label for="album_id" style="background-color: #113D3C; color: #F4EDDB;">Nama Album:</label>
                        <select class="form-select" style="background-color: #F4EDDB" id="album_id" name="album_id" required>
                            @foreach ($album as $albums)
                                <option value="{{ $albums->id }}" @if ($albums->id == $foto->album_id) selected @endif>{{ $albums->namaAlbum }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group"  style="background-color: #113D3C;">
                        <label for="deskripsifoto" style="background-color: #113D3C; color: #F4EDDB;">Deskripsi:</label>
                        <textarea id="deskripsifoto" name="deskripsifoto" style="background-color: #F4EDDB" rows="4" required>{{ $foto->deskripsifoto }}</textarea>
                    </div>
                    <div style="text-align: center;">
                        <button class="btn btn-success btn-md w-50 mb-4 mt-2 rounded-pill" style="color: #113D3C; font-weight: bold; background-color:#F4EDDB" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    function previewFile() {
        var preview = document.getElementById('previewImage');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "placeholder.jpg";
        }
    }
</script>
<script src="assets/js/app.js"></script>
<script src="assets/js/theme.js"></script>

@endsection
