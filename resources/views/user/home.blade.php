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
    }

    .card .overlay .action .icon i {
        margin-right: 5px;
    }

    .card .overlay .action a {
        text-decoration: none;
        color: inherit;
    }

    .like {
        display: flex;
        align-items: center; /* Untuk membuat ikon dan count vertikal bersejajar */
    }

    .like-count {
        margin-right: 3px;
        margin-bottom: 2px;
    }

    .like-btn {
        background: none;
        border: none;
        cursor: pointer;
        outline: none;
    }

    .like-btn i {
        color: white;
        transition: all 0.3s ease;
    }

    .like-btn .liked {
        color: red;
    }

    .like-form:hover .like-btn i {
        transform: scale(1.2);
    }

    .no-data {
        text-align: center;
        font-size: 24px;
        margin-left: 490px;
        margin-top: 25vh;
        width: 100%;
    }

</style>

<main role="main">
    <section class="mt-4 mb-5">
        <div class="container mb-4">
            <h1 class="font-weight-bold title" style="color: #113D3C !important"><center>Gallery</center></h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="card-columns">
                    @if($foto)
                        @if($foto->isEmpty())
                            <p>Data kosong</p>
                        @else
                    @foreach ($foto as $ps)
                    <div class="card card-pin">
                        <img class="card-img" src="{{ asset('storage/foto/' . $ps->lokasifile) }}" alt="Card image">
                        <div class="overlay">
                            <h2 class="card-title title">{{ $ps->judulfoto }}</h2>
                            <div class="action">
                                <div class="like text-end">
                                    {{-- <span class="like-count" data-post-id="{{ $ps->id }}">{{ $ps->likes }}</span> --}}
                                    @if ($ps->like)
                                        <span class="like-count">{{ $ps->like->count() }}</span>
                                    @else
                                        <span class="like-count">0</span>
                                    @endif
                                    <form action="{{ route('like.create', ['id' => $ps->id]) }}" method="POST" class="like-form">
                                        @csrf
                                        <button type="submit" class="like-btn">
                                            @if (in_array($ps->id, $like))
                                                <i class="bi bi-heart-fill liked"></i>
                                            @else
                                                <i class="bi bi-heart-fill"></i>
                                            @endif
                                        </button>
                                    </form>
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
                    @endif
                    @else
                    <center style="margin-left: auto"><h2 class="no-data">Data tidak tersedia</h2></center>
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>

{{-- <script src="{{ asset('public/assets/js/app.js') }}"></script>
<script src="{{ asset('public/assets/js/theme.js') }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('public/assets/js/app.js') }}"></script>
    <script src="{{ asset('public/assets/js/theme.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

{{-- <script>
    $(document).ready(function() {
        $('.like-btn').click(function() {
            var fotoId = $(this).data('post-id');
            var likeIcon = $(this).find('i');
            var likeCount = $('.like-count[data-post-id="' + fotoId + '"]');

            $.ajax({
                type: 'POST',
                url: '{{ route('like.create') }}',
                data: {
                    'foto_id': fotoId,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(data) {
                    if (data.success) {
                        if (data.action === 'like') {
                            likeIcon.css('color', 'red');
                            likeCount.text(parseInt(likeCount.text()) + 1);
                        } else if (data.action === 'unlike') {
                            likeIcon.css('color', 'white');
                            likeCount.text(parseInt(likeCount.text()) - 1);
                        }
                    }
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });
    });
</script> --}}
@endsection
