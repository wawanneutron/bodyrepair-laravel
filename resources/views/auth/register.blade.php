@extends('layouts.auth.app')
@section('content')

    <body class="bg-gradient-primary">

        <div class="container pt-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block">
                            <img src="{{ url('/images/mbs_logo_transparent.png') }}" alt="" class="w-100 mt-5">
                        </div>
                        <div class="col-lg-7">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Silahkan daftar!</h1>
                                </div>
                                <form class="user" action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control form-control-user @error('first_name') is_invalid @enderror"
                                                   id="exampleFirstName" placeholder="Nama Pertama">
                                            @error('first_name')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control form-control-user @error('last_name') is_invalid @enderror"
                                                   id="exampleLastName" placeholder="Nama Terakhir">
                                            @error('last_name')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail"
                                               placeholder="Alamat Email">
                                        @error('email')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword"
                                                   placeholder="Password">
                                            @error('password')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" name="password_confirmation" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
                                                   id="exampleRepeatPassword" placeholder="Ulangi Password">
                                            @error('password_confirmation')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register Account
                                    </button>
                                </form>
                                <hr>
                                {{-- <div class="text-center">
                                    <a class="small" href="{{ route('password.request') }}">Lupa Password?</a>
                                </div> --}}
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Sudah punya akun? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </body>
@endsection
