@extends('layouts.navbar')

@section('tampilan')
<style>
    .gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        /* gap: 5px; */
        padding: 5px 0;
    }
    .thumbnail {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: calc(20% - 15px);
        min-width: 200px;
        height: 180px;
        cursor: pointer;
        background-color: #f7ebcc;
        box-shadow: 0 5px 6px rgba(0, 0, 0, 0.1);
        border: 1px dotted #e4e4e4;
        margin-bottom: 20px;
        position: relative;
    }
    .thumbnail:hover {
        border-color: #ddd;
    }
    .thumbnail .folder {
        width: 55%;
        height: 40%;
        background: #fbe36a;
        border-radius: 0 4px 0 0;
        position: relative;
        margin-top: 2px;
    }
    .thumbnail .folder:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 30%;
        height: 10px;
        background: #fbd36a;
        border-radius: 2px 6px 0 0;
    }
    .thumbnail .folder:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #fbe36a;
        border-radius: 4px 4px 0 0;
        transform: scaleY(1) skewX(-2deg);
        transform-origin: bottom left;
    }
    .thumbnail:hover .folder,
    .thumbnail:hover .folder:before {
        background: #fbd36a;
    }
    .thumbnail:hover .folder:after {
        transform: scaleY(0.9) skewX(-6deg);
        background: #fbe36a;
    }
    .title {
        margin-top: 15px;
        padding: 0 0 20px 0;
        color: #113d3cbb;
        font-weight: 500;
        font-size: 1.1em;
    }
</style>

<main role="main">
    <section class="mt-4 mb-5">
        <div class="container mb-4">
            <h1 class="font-weight-bold title" style="color: #113D3C !important; font-size: 30px"><center>Gallery</center></h1>
        </div>
        <div class="container">
            <div class="row gallery">
                @foreach ($album as $ab)
                    <a href="{{ route('foto.index', ['id' => $ab->id]) }}">
                        <div class="col-md-2" style="margin-right: 35px !important;">
                            <div class="thumbnail">
                                <span class="folder"></span>
                                <div class="title">{{$ab->namaAlbum}}</div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</main>

<script src="{{ asset('public/assets/js/app.js') }}"></script>
<script src="{{ asset('public/assets/js/theme.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@endsection
