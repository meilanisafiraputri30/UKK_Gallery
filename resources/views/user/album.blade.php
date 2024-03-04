@extends('layouts.navbar')
@section('tampilan')
<style>
    .container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 20px;
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
    <div class="ms-auto">
        <button type="button" class="btn btn-dark float-end mr-5" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bx bx-plus fw-bold" style="font-size: 20px;"></i></button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #113D3C">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: #F4EDDB"><strong>Tambah Data</strong></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="background-color: #113D3C">
                        <form action="{{ route('album.create')}}" method="post" id="uploadForm" style="background-color: #113D3C">
                            @csrf
                            {{-- <div class="judul mt-3" style="color: #F4EDDB"><center><h4><strong>Tambahkan Data</h4></center></div> --}}
                            <div class="form-group" style="background-color: #113D3C">
                                <label for="namaAlbum" style="background-color: #113D3C; color: #F4EDDB; font-weight:bold">Nama Album :</label>
                                <input type="text" style="background-color: #F4EDDB; color:#113D3C" id="namaAlbum" name="namaAlbum" required>
                            </div>
                            <div class="form-group" style="background-color: #113D3C;">
                                <label for="deskripsi" style="background-color: #113D3C; color: #F4EDDB; font-weight:bold">Deskripsi:</label>
                                <textarea style="background-color: #F4EDDB" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                            </div>
                            <div class="form-group gap-4" style="margin-left: 275px; display: flex; justify-content: space-between; background-color: #113D3C">
                                <button class="btn btn-success btn-md w-45 rounded-pill" style="color: #113D3C; font-weight: bold; background-color:#F4EDDB" type="submit">Simpan</button>
                                <a href="{{ route('album.index') }}" class="btn btn-success btn-md w-45 rounded-pill" style="color: #113D3C; font-weight: bold; background-color:#F4EDDB">Tutup</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <h3 class="mb-0 text-uppercase text-center mt-2">Data Album</h3>
        <hr/>
        <div class="card mr-5 ml-5">
            <div class="card-body" style="background-color: #113D3C">
                <div class="table-responsive" style="background-color:#113D3C; color:#F4EDDB">
                    <table id="example" class="table table-striped table-bordered" style="width:100%; background-color:#113D3C; color:#F4EDDB">
                        <thead style="background-color:#113D3C; color:#F4EDDB">
                            <tr style="background-color:#113D3C">
                                <th style="background-color:#113D3C; color:#F4EDDB">No</th>
                                <th style="background-color:#113D3C; color:#F4EDDB">Nama Album</th>
                                <th style="background-color:#113D3C; color:#F4EDDB">Deskripsi</th>
                                <th style="background-color:#113D3C; color:#F4EDDB">Pembuat Album</th>
                                <th style="background-color:#113D3C; color:#F4EDDB">Tanggal</th>
                                <th style="background-color:#113D3C; color:#F4EDDB">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="background-color:#113D3C">
                            @php
                                $no= 1;
                            @endphp
                            @foreach($album as $albums)
                            <tr style="background-color:#113D3C; color:#F4EDDB">
                                <td style="background-color:#113D3C; color:#F4EDDB">{{$no++}}</td>
                                <td style="background-color:#113D3C; color:#F4EDDB">{{ $albums->namaAlbum }}</td>
                                <td style="background-color:#113D3C; color:#F4EDDB">
                                    {{ $albums->deskripsi }}
                                </td>
                                <td style="background-color:#113D3C; color:#F4EDDB">{{ $albums->owner->name }}</td>
                                <td style="background-color:#113D3C; color:#F4EDDB">{{ date('d F Y', strtotime($albums->tanggaldibuat)) }}</td>
                                <td class="text-center" style="width: 100px; background-color:#113D3C; color:#F4EDDB">
                                    <div class="d-flex justify-content-left" style="background-color:#113D3C; color:#F4EDDB">
                                        <button type="button" class="btn btn-outline-warning px-4" style="margin-right:2%;" data-bs-toggle="modal" data-bs-target="#{{ $albums->id }}">Edit</button>
                                        <form id="delete-form-{{ $albums->id }}" action="{{ route('album.destroy', $albums->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-outline-danger px-3 show_confirm" data-toggle="tooltip" title="Delete" onclick="handleDelete({{ $albums->id }})">HAPUS</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                    </table>
            </div>
        </div>
    </div>
    @foreach($album as $albums)
    <!-- Modal Edit -->
    <div class="modal fade" id="{{ $albums->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #113D3C">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: #F4EDDB"><strong>Edit Data</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color: #113D3C">
                    <form action="{{ route('album.update', $albums->id) }}" method="post" id="updateForm" style="background-color: #113D3C">
                        @csrf
                        @method('PUT')
                        <div class="form-group" style="background-color: #113D3C">
                            <label for="namaAlbum" style="background-color: #113D3C; color: #F4EDDB; font-weight:bold">Nama Album :</label>
                            <input type="text" style="background-color: #F4EDDB; color:#113D3C" id="namaAlbum" name="namaAlbum" value="{{ $albums->namaAlbum }}" required>
                        </div>
                        <div class="form-group" style="background-color: #113D3C;">
                            <label for="deskripsi" style="background-color: #113D3C; color: #F4EDDB; font-weight:bold">Deskripsi:</label>
                            <textarea style="background-color: #F4EDDB" id="deskripsi" name="deskripsi" rows="4" required>{{ $albums->deskripsi }}</textarea>
                        </div>
                        <div class="form-group gap-4" style="margin-left: 275px; display: flex; justify-content: space-between; background-color: #113D3C">
                            <button class="btn btn-success btn-md w-45 rounded-pill" style="color: #113D3C; font-weight: bold; background-color:#F4EDDB" type="submit">Simpan</button>
                            <a href="{{ route('album.index') }}" class="btn btn-success btn-md w-45 rounded-pill" style="color: #113D3C; font-weight: bold; background-color:#F4EDDB">Tutup</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
</main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.10/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.10/dist/sweetalert2.min.css">
<script>
    function handleDelete(albumId) {
        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: 'Apakah Anda yakin ingin menghapus album ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.querySelector(`#delete-form-${albumId}`);
                form.submit();
            }
        });
    }
</script>
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
