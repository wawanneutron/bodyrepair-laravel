@extends('layouts.dashboard-admin.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            @if (session('status') == 'profile-information-updated')
                                <p>Profile has been updated.</p>
                            @endif
                            @if (session('status') == 'password-updated')
                                <p>password has been updated.</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card border-0 shadow">
                    <div class="card-header m-0 font-weight-bold text-uppercase"><i class="fas fa-user-circle mr-3"></i>edit profile</div>
                    <div class="card-body">
                        <form action="{{ route('user-profile-information.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-12 text-center mb-4">
                                <img src="{{ auth()->user()->getAvatarUrl() }}" class=" rounded-circle img-thumbnail shadow" style="width: 220px; height: 220px;"> <br>
                                <span class=" small"><i>update photo profile</i></span>
                                <div class="form-group mb-5">
                                    <input type="file" name="avatar" id="avatar" class=" form-control-file @error('avatar') is-invalid @enderror">
                                    @error('avatar')
                                        <div class="invalid-feedback">
                                            <h6 class=" alert alert-danger">{{ $message }}</h6>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group mb-2">
                                        <label for="first_name">Nama Pertama</label>
                                        <input type="text" name="first_name" id="first_name" class=" form-control @error('first_name') is-invalid @enderror"
                                               value="{{ old('first_name') ?? auth()->user()->first_name }}" autofocus autocomplete="first_name">
                                        @error('first_name')
                                            <div class="invalid-feedback ">
                                                <h6 class=" alert alert-danger">{{ $message }}</h6>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="last_name">Nama Terakhir</label>
                                        <input type="text" name="last_name" id="last_name" class=" form-control @error('last_name') is-invalid @enderror"
                                               value="{{ old('last_name') ?? auth()->user()->last_name }}" autofocus autocomplete="last_name">
                                        @error('last_name')
                                            <div class="invalid-feedback ">
                                                <h6 class=" alert alert-danger">{{ $message }}</h6>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="email">email</label>
                                        <input type="email" name="email" id="email" class=" form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? auth()->user()->email }}"
                                               autofocus>
                                        @error('email')
                                            <div class="invalid-feedback ">
                                                <h6 class=" alert alert-danger">{{ $message }}</h6>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="no_wa">No Whatsapp</label>
                                        <input type="number" name="no_wa" id="no_wa" class=" form-control @error('no_wa') is-invalid @enderror" value="{{ old('no_wa') ?? auth()->user()->no_wa }}"
                                               autofocus>
                                        @error('no_wa')
                                            <div class="invalid-feedback ">
                                                <h6 class=" alert alert-danger">{{ $message }}</h6>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="form-label ">Alamat</label>
                                        <textarea class="form-control" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="exampleFormControlTextarea1"
                                                  rows="3">{{ old('alamat') ?? auth()->user()->alamat }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback ">
                                                <h6 class=" alert alert-danger">{{ $message }}</h6>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class=" btn btn-primary text-uppercase">update profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card border-0 shadow mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-uppercase"><i class="fas fa-unlock mr-3"></i>update password</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user-password.update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-2">
                                <label for="current_password">Current Password</label>
                                <input type="password" name="current_password" id="current_password" class=" form-control @error('current_password') is-invalid @enderror" autocomplete="current-password">
                                @error('current_password')
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="pass">Password</label>
                                <input type="password" name="password" id="pass" class=" form-control @error('password') is-invalid @enderror" autocomplete="new-password">
                                @error('password')
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="confirm">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="confirm" class=" form-control  @error('password_confirmation') is-invalid @enderror" autocomplete="new-password">
                                @error('password_confirmation')
                                    <div class="alert alert-danger mt-1" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary text-uppercase" type="submit">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
