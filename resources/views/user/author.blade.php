@extends('layouts.navbar')
@section('tampilan')
<style>
    .profile-foto {
        width: 150px;
        height: 150px;
        overflow: hidden;
        border-radius: 50%;
        margin: 0 auto;
    }

    .profile-foto img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .btn-primary {
        background-color: #113D3C;
        border-color: #F4EDDB;
    }

    .btn-primary:hover {
        background-color: #113D3C;
        border-color: #F4EDDB;
    }


</style>
<div class="page-nav">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="profile-foto mt-4">
                    @if (Auth::user()->profile)
                    <img src="{{ asset('storage/' . Auth::user()->profile) }}" height="100%" width="150%" alt="Profile Picture" id="preview-picture">
                    @else
                    <img id="preview-picture" src="{{ asset('storage/default/defaultprofile.jpeg') }}" alt="Default Profile Image">
                    @endif
                </div>
                <h2 style="color: #113D3C !important;">{{ Auth::user()->name }}</h2>
                @if(Auth::user()->username)
                    <p style="color: #113D3C !important;">@ {{ Auth::user()->username }}</p>
                @else
                    <p style="color: #113D3C !important;">@ tidak ada</p>
                @endif
                {{-- <p style="color: rgb(0, 44, 106)">{{ Auth::user()->about }}</p> --}}
            </div>
        </div>
    </div>
</div>

<div class="faq-page">
    <div class="container" style="background-color: #F4EDDB !important">
        <div class="row justify-content-center" style="background-color: #F4EDDB !important">
            <div class="col-sm-8" style="background-color: #F4EDDB !important">
                <form action="{{route('profile.update', Auth::user()->id)}}" method="POST" enctype="multipart/form-data" style="background-color: #F4EDDB !important">
                    @method('PUT')
                    @csrf
                    <input type="text" hidden>
                    <table class="table" style="background-color: #113D3C !important">
                        <tbody style="background-color: #113D3C !important;">
                            <tr style="color: #113D3C; background-color:#113D3C; border-top-right-radius:10px;">
                                <td style="color: #F4EDDB !important; background-color: #113D3C !important; border-top-left-radius: 10px !important; font-weight: bold;">Profile Picture:</td>
                                <td style="color: #F4EDDB !important; background-color: #113D3C !important; border-top-right-radius: 10px !important;">
                                    <input type="file" name="profile" class="form-control" id="profile-picture" style="color: #113D3C !important; background-color: #F4EDDB !important">
                                    @error('profile')
                                    <p class="text-danger">{{ $message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td style="color: #F4EDDB !important; background-color: #113D3C !important; font-weight: bold;">Nama Panjang:</td>
                                <td style="color: #F4EDDB !important; background-color: #113D3C !important"><input type="text" name="name" style="color: #113D3C !important; background-color: #F4EDDB !important" class="form-control" value="{{ Auth::user()->name }}">
                                    @error('name')
                                    <p class="text-danger">{{ $message}}</p>
                                    @enderror</td>
                            </tr>
                            <tr style="border-bottom-right-radius: 10px !important;">
                                <td style="border-bottom-right-radius: 10px; color: #F4EDDB !important; background-color: #113D3C !important; font-weight: bold; ">Username:</td>
                                <td style="color: #F4EDDB !important; background-color: #113D3C !important"><input type="text" name="username" class="form-control" style="color: #113D3C !important; background-color: #F4EDDB !important" value="{{ Auth::user()->username }}">
                                    @error('username')
                                    <p class="text-danger">{{ $message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            {{-- <tr>
                                <td style="color: rgb(0, 44, 106)">About:</td>
                                <td><input type="text" name="about" class="form-control" value="{{ Auth::user()->about }}"></td>
                            </tr> --}}
                        </tbody>
                    </table>
                    <!-- Tambahkan ikon untuk tombol "Save Changes" -->
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="js/plugin.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>

<script>
    document.getElementById("profile-picture").addEventListener("change", function() {
        var fileInput = this;
        var file = fileInput.files[0];
        var previewPicture = document.getElementById("preview-picture");

        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                previewPicture.src = e.target.result;
            }
            reader.readAsDataURL(file);
        } else {
            previewPicture.src = "{{ asset('storage/default/defaultprofile.jpeg') }}"; // Ganti dengan default gambar Anda
        }
    });
</script>


@endsection
