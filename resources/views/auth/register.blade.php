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
                                 <img src="/images/register.jpg" class="img-fluid auth-img-cover-login" width="550" alt=""/>
							</div>
						</div>
					</div>

					<div class="col-12 col-xl-5 col-xxl-4 auth-cover-right bg-red-800 align-items-center justify-content-center" style="background-color: #113D3C !important;">
                        <div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
							<div class="card-body p-sm-5">
								<div class="">
									<div class="text-center mb-4" style="color: #F4EDDB">
										<h5 class="" style="font-family: montserrat, bold; font-weight: bold; font-size: 30px; color: #F4EDDB">Galerry Kitaa</h5>
										<p class="mb-0">Silakan isi detail di bawah ini untuk membuat akun Anda</p>
									</div>
                                    <form action="{{ route('createregis') }}" method="POST">
                                        @csrf
                                        <div class="row" style="color: #F4EDDB">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="text-name"
                                                        class="form-label text-whiite fw-bold mt-2">Nama Panjang</label>
                                                    <input type="text" class="form-control py-6" id="text-name"
                                                        value="{{ old('name') }}" name="name"
                                                        class="form-control @error('name')is-invalid @enderror">
                                                    @error('name')
                                                        <p class="text-whiite">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="text-name"
                                                        class="form-label text-whiite fw-bold mt-2">Username</label>
                                                    <input type="text" class="form-control py-6" id="text-name"
                                                        value="{{ old('username') }}" name="username"
                                                        class="form-control @error('username')is-invalid @enderror">
                                                    @error('username')
                                                        <p class="text-whiite">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="text-email"
                                                        class="form-label text-whiite fw-bold mt-2">Alamat E-Mail</label>
                                                    <input type="email" class="form-control py-6" id="text-email"
                                                        value="{{ old('email') }}" name="email"
                                                        class="form-control @error('email')is-invalid @enderror">
                                                    @error('email')
                                                        <p class="text-whiite">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="text-name"
                                                        class="form-label text-whiite fw-bold mt-2">Alamat</label>
                                                    <textarea type="text" class="form-control py-6" id="alamat"
                                                        value="{{ old('alamat') }}" name="alamat"
                                                        class="form-control @error('alamat')is-invalid @enderror"></textarea>
                                                    @error('alamat')
                                                        <p class="text-whiite">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="text-password"
                                                        class="form-label text-whiite fw-bold mt-2">Kata Sandi</label>
                                                    <input type="password" class="form-control py-6"
                                                        id="text-password" name="password"
                                                        class="form-control @error('password')is-invalid @enderror">
                                                    @error('password')
                                                        <p class="text-whiite">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="text-confirm-pwd"
                                                        class="form-label text-whiite fw-bold mt-2">Konfirmasi Kata Sandi</label>
                                                    <input type="password" class="form-control py-6"
                                                        id="text-confirm-pwd" name="re-password"
                                                        class="form-control @error('re-password')is-invalid @enderror">
                                                    @error('re-password')
                                                        <p class="text-whiite">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-success btn-md bg-white  w-100 mb-7 mt-5 rounded-pill" style="color: #113D3C; font-weight: bold;  outline: none !important;"
                                                type="submit">Daftar</button>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center mt-2">
                                            <p class="mb-0" style="font-size: 15px; text-align: center !important;">Sudah Punya Akun?</p>
                                            <a class="text-white fw-bold ms-2 fs-6" href="{{ route('login') }}">Masuk</a>
                                        </div>
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

@endsection
