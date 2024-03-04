<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from wowthemesnet.github.io/template-pintereso-bootstrap-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Feb 2024 07:21:43 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - Pintereso Bootstrap Template</title>
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = '../../stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <link rel="stylesheet" href="{{ url('css/theme.css') }}">
    <link rel="stylesheet" href="{{ url('Css/komentar.css ') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    {{-- ICON Flaticon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    {{-- IMPORT FONT --}}
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&family=Raleway:wght@400;700&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .nav-link.active {
            /* background-color: #f00; Warna latar belakang merah untuk menandai aktif */
            color: #fff; /* Warna teks putih */
            font-weight: bold; /* Teks tebal */
        }
    </style>
</head>

<body style="background-color: #F4EDDB">
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-lg" style="background-color: #113D3C !important; color: #113D3C !important;">
        <a class="navbar-brand font-weight-bolder ml-4 fw-bold" href="" style="font-family: montserrat, bold; font-size: 25px;  color:#F4EDDB"><img src="">Gallery Kita</a>
        <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse mr-4" id="navbarsDefault" style="color: #F4EDDB !important;">
            <ul class="navbar-nav ml-auto align-items-center" style="background-color: #113D3C !important; color:#F4EDDB !important">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('Home.index') ? 'active' : '' }}" href="{{ route('Home.index', ['id' => Auth::user()->id]) }}) }}"  style="color: #F4EDDB !important;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('album.index') ? 'active' : '' }}" href="{{ route('album.index') }}"  style="color: #F4EDDB !important;">Album</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('post.index') ? 'active' : '' }}" href="{{ route('post.index') }}"  style="color: #F4EDDB !important;">Unggah</a>
                </li>
                <li class="nav-item mr-5">
                    <a class="nav-link {{ request()->routeIs('mypost') ? 'active' : '' }}" href="{{ route('mypost') }}"  style="color: #F4EDDB !important;">My Post</a>
                </li>
                <li class="nav-item dropdown mr-1" style="background-color: #113D3C !important; color:#F4EDDB !important">
                    <div class="profile-picture mt-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                        @if (Auth::user()->profile)
                            <img src="{{ asset('storage/' . Auth::user()->profile) }}" style="border-radius: 50%; width: 30px; height: 30px; object-fit: cover; margin-right: 5px;"  alt="Profile Picture" id="preview-picture">
                        @else
                            <img id="preview-picture" src="{{ asset('storage/default/defaultprofile.jpeg') }}" style="border-radius: 50%; width: 30px; height: 30px; object-fit: cover; margin-right: 5px;" alt="Default Profile Image">
                        @endif
                    </div>
                    <ul class="dropdown-menu mt-3 shadow" style="right: 0; left: auto; min-width: auto; background-color: #113D3C !important; color:#F4EDDB !important" aria-labelledby="navbarDropdown">
                        <li class="px-2 profile username d-inline-block text-truncate fw-bold" style="max-width: 150px;">
                            {{ Auth::user()->name }}
                        </li>
                        <li>
                            <hr style="margin: 3px !important; background-color: #F4EDDB !important;">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('Profile') }}" style="color: #F4EDDB !important; background-color: #113D3C !important;"><i class="fi fi-sr-user-pen me-3 icon-blue" style="color: #F4EDDB !important;"></i>Profile</a></li>
                        <li>
                            <hr style="margin: 3px !important; background-color: #F4EDDB !important;">
                        </li>
                        <li>
                            <a class="dropdown-item logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #F4EDDB !important; background-color: #113D3C !important;">
                                <i class="fi fi-br-sign-out-alt me-3" style="color: #F4EDDB !important;"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        </nav>
    {{-- @yield('content') --}}
    @yield('tampilan')
</body>


<!-- Mirrored from wowthemesnet.github.io/template-pintereso-bootstrap-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Feb 2024 07:22:24 GMT -->
</html>
