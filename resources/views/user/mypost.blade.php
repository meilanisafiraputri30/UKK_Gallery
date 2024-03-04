@extends('layouts.navbar')
@section('tampilan')
<style>
    .card .overlay .title {
        margin-bottom: 5px;
    }

    .card .overlay .action {
        position: absolute;
        bottom: 10px;
        left: 10px;
        right: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #fff;
    }

    .card .overlay .action .icon {
        display: flex;
        align-items: center;
        margin-right: 5px; /* Tambahkan margin kanan di sini */
    }

    .card .overlay .action .more {
        display: flex;
        align-items: center;
    }

    .card .overlay .action a {
        text-decoration: none;
        color: inherit;
    }

</style>

<main role="main">
    <section class="mt-4 mb-5">
        <div class="container mb-4">
            <h1 class="font-weight-bold title"><center>Gallery</center></h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="card-columns">
                    @foreach ($foto as $ps)
                    <div class="card card-pin">
                        <img class="card-img" src="{{ asset('storage/foto/' . $ps->lokasifile) }}" alt="Card image">
                        <div class="overlay">
                            <h2 class="card-title title">{{ $ps->judulfoto }}</h2>
                            <div class="action">
                                <div class="icon">
                                    <a href="{{ route('User.show', ['id' => $ps->id])}}">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                </div>
                                <div class="more">
                                    <a href="{{ route('detailpost', ['id' => $ps->id]) }}">
                                        More <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>

<script src="public/assets/js/app.js"></script>
<script src="public/assets/js/theme.js"></script>
@endsection
