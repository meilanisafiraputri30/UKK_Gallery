@extends('layouts.navbar')
@section('tampilan')

<style>
    .like {
        display: flex;
        align-items: end;
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
</style>
    <main role="main">


    <section class="bg-gray200 pt-5 pb-5">
    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-9">
    			<article class="card">
    			<img class="card-img-top mb-2" src="{{ asset('storage/foto/' . $foto->lokasifile) }}" alt="Card image">
                <div class="card-body">
                    <div class="photo" style="display: flex; align-items: center;">
                        @if ($foto->owner && $foto->owner->profile)
                            <img src="{{ asset('storage/' . $foto->user->profile) }}"
                                style="margin-right: 10px; border-radius: 50%; width: 50px; height: 50px; object-fit: cover;"
                                alt="Profile Picture"
                                class="profile-picture">
                        @else
                            <!-- Gambar placeholder atau logika alternatif jika foto profil tidak tersedia -->
                            <img class="rounded-circle profile-image"
                                src="{{ asset('storage/default/defaultprofile.jpeg') }}"
                                style="width: 50px; height: 50px; margin-right: 10px;"
                                alt="Placeholder">
                        @endif
                        <div class="mb-2 ">
                            <h5 class="username fw-bold" style="font-size: 25px; margin: 0;">{{$foto->owner->name}}</h5>
                            <!-- Tambahkan teks tambahan atau informasi pengguna lainnya di sini jika diperlukan -->
                        </div>
                        <div class="like text-end" style="left: 25px;">
                            {{-- <span class="like-count" data-post-id="{{ $ps->id }}">{{ $ps->likes }}</span> --}}
                            @if ($foto->like)
                                <span class="like-count">{{ $foto->like->count() }}</span>
                            @else
                                <span class="like-count">0</span>
                            @endif
                            <form action="{{ route('like.create', ['id' => $foto->id]) }}" method="POST" class="like-form">
                                @csrf
                                <button type="submit" class="like-btn">
                                    @if (in_array($foto->id, $like))
                                        <i class="bi bi-heart-fill liked"></i>
                                    @else
                                        <i class="bi bi-heart-fill"></i>
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>
    				<h1 class="card-title display-4 fw-bold mb-4 mt-3 ml-3" style="font-size: 32px;">{{$foto->judulfoto}} </h1>
                    <h5 class="mt-3 ml-3">Deskripsi :</h5>
    				<ul>
    					<p>{{$foto->deskripsifoto}}</p>
    				</ul>
                    <br>
    				<!-- Begin Comments -replace demowebsite with your own id
                    ================================================== -->
    				<div class="komentar-content card py-4 px-4 mt-4 mb-3">
                        <h5 class="mt-1 mb-4 fw-bold">Kometar :</h5>
                        {{-- Kirim Komentar --}}
                        <form id="addKomentar" method="POST" action="{{ route('Komentar.store') }}">
                            @csrf
                            <input type="hidden" name="foto_id" value="{{ $foto->id }}">
                            <div class="card mb-3 p-2">
                                <div class="form-floating d-flex">
                                    <input type="text" name="isikomentar" class="form-control me-2" id="isikomentar" placeholder="Komentar">
                                    <label for="floatingInput">Komen :</label>
                                    <button type="submit" class="btn btn-primary" name="submitBtn"><i class="bi bi-send-fill"></i></button>
                                </div>
                            </div>
                        </form>

                        {{-- Foreach mulai dari sini! --}}
                        <div id="itemKomentar">
                          @forelse ($Komentar as $komentar)
                            <div class="card mb-4 comment-{{ $komentar->id }}">
                              <div class="chat px-4 pt-3 d-flex justify-content-between">
                                <div class="left d-flex">
                                  <div class="profile me-3">
                                    <div class="photo">
                                        @if ($komentar->user->profile)
                                                    <img src="{{ asset('storage/' . $komentar->user->profile) }}"
                                                        style="margin-bottom: 10px; border-radius: 50%;" alt="Profile Picture"
                                                        class="profile-picture">
                                                @else
                                                    <!-- Gambar placeholder atau logika alternatif jika foto profil tidak tersedia -->
                                                    <img class="rounded-circle profile-image"
                                                        src="{{ asset('storage/default/defaultprofile.jpeg') }}"
                                                        style="width: 50px; height: 50px; margin-bottom: 10px;"
                                                        alt="Placeholder">
                                                @endif
                                      {{-- <img class="rounded-circle" width="45px" height="45px" src="{{ asset($komentar->user->profile) }}" alt=""> --}}
                                    </div>
                                  </div>
                                  <div class="chat-column">
                                    <div class="username">
                                      <p>{{ $komentar->user->name }}</p>
                                    </div>
                                    <div class="text-chat">
                                      <p style="font-size: 18px;">{{ $komentar->isikomentar }}</p>
                                    </div>
                                    <div class="tanggal-chat">
                                      <p>{{ date('d F Y', strtotime($komentar->tanggalkomentar)) }}</p>
                                    </div>
                                  </div>
                                </div>
                                <div class="right">
                                    <div class="action">
                                        @if ($komentar->user_id == Auth::user()->id)
                                          <form action="{{ route('komentar.delete', $komentar->id) }}" method="POST" class="delete-comment-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-comment-btn dropdown-item" style="border: none; background: none; cursor: pointer;">
                                              <i class="bi bi-trash"></i> Delete
                                            </button>
                                          </form>
                                        @endif
                                      </div>
                                </div>
                              </div>
                            </div>
                          @empty
                            {{-- <div class="empty-comment-div">
                              <p class="message">Be the first one to comment</p>
                            </div> --}}
                          @endforelse
                          <div>
                            {{ $Komentar->links('pagination::bootstrap-5') }}
                          </div>
                        </div>
                      </div>
                    </div>

    				<!--End Comments
                    ================================================== -->
    			</div>
    			</article>
    		</div>
    	</div>
    <div class="container-fluid mt-5">
        <div class="row">
    		<h5 class="font-weight-bold">More like this</h5>
    		<div class="card-columns">
                @foreach ($posting as $post)
                <div class="card card-pin">
                    <img class="card-img" src="{{ asset('storage/foto/' . $post->lokasifile) }}" alt="Card image">
                    <div class="overlay">
                        <h2 class="card-title title">{{ $post->judulfoto }}</h2>
                        <div class="more">
                            <a href="{{ route('detailpost', ['id' => $post->id]) }}">
                                <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
    		</div>
    	</div>
    </div>
    </section>

    </main>

    <script src="assets/js/app.js"></script>
    <script src="assets/js/theme.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
          $('.delete-comment-btn').on('click', function (e) {
            e.preventDefault();
            var form = $(this).closest('form');
            Swal.fire({
              title: 'Apakah Anda yakin?',
              text: 'Anda tidak akan dapat mengembalikan tindakan ini!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Ya, hapus saja!',
              cancelButtonText: 'Batalkan'
            }).then((result) => {
              if (result.isConfirmed) {
                form.submit();
              }
            });
          });
        });
    </script>
@endsection

