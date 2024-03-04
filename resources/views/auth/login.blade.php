@extends('layouts.app')

@section('content')

<body class="bg-theme bg-theme2">
<div class="wrapper">
    <div class="section-authentication-cover">
        <div class="">
            <div class="row g-0">
                <div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex bg-white">
                    <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
                        <div class="card-body">
                             <img src="/images/login.jpg" class="img-fluid auth-img-cover-login" width="550" alt=""/>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-xl-5 col-xxl-4 bg-red-800 auth-cover-right bg-light align-items-center justify-content-center" style="background-color: #113D3C !important;">
                    <div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
                        <div class="card-body p-sm-3">
                            <div class="">
                                <div class="text-center mb-5" style="color: #F4EDDB">
                                    <h5 class="" style="font-family: montserrat, bold; font-weight: bold; font-size: 30px; color: #F4EDDB">Gallery Kitaa</h5>
                                    <p class="mb-0">Silakan masuk ke akun anda</p>
                                </div>
                                <div class="form-body" style="color: #F4EDDB">
                                    <form class="row g-3" method="POST" action="{{ route('loginproses') }}">
                                        @csrf
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label text-white">Email</label>
                                            <input  id="inputEmailAddress" type="email" class="form-control @error('email') is-invalid @enderror"
                                             name="email" value="{{ old('email') }}"  autofocus placeholder="user@gmail.com">
                                             @error('email')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                        <div class="col-12" style="color: #F4EDDB">
                                            <label for="inputChoosePassword" class="form-label text-white">Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input id="inputChoosePassword" type="password" class="form-control @error('password') is-invalid @enderror border-end-0" name="password"  placeholder="Masukan Password">
                                                <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                                               @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message  }}
                                                </span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-success btn-md bg-white" style="color: #113D3C; font-weight: bold;  outline: none !important;">Masuk</button>
                                            </div>
                                        </div>
                                         @if(Route::has('registerPage'))
                                        <div class="col-12">
                                            <div class="text-center">
                                                <p class="mb-0">Tidak punya Akun? <a href="{{ route('registerPage') }}" style="color: #F4EDDB">Daftar di sini</a>
                                                </p>
                                            </div>
                                        </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--end row-->
        </div>
    </div>
</div>
</div>
@endsection
