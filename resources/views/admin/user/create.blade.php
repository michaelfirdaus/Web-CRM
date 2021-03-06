@extends('layouts.app')

@section('title')Tambah User @endsection

@section('header') Tambah User @endsection

@section('breadcrumb')
<a href="/users" class="mr-1">User</a>/
Tambah User
@endsection

@section('content')

    <div class="card">
        <div class="card-header text-danger text-bold">Informasi Penting</div>
        <div class="card-body text-bold">
            PASTIKAN username tidak mengandung spasi.      
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama User <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Michael" value="{{ old('name') }}">
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="username">Username (Untuk Login) <span class="text-danger">*</span></label>
                    <input type="text" name="username" class="form-control" placeholder="Contoh: michael" value="{{ old('username') }}">
                    @if( $errors->has('username') )
                        <div class="text-danger">{{ $errors->first('username') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <input name="password" type="password" placeholder="Password" id="password" class="form-control">
                    @if( $errors->has('password') )
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="confirmpassword">Konfirmasi Password <span class="text-danger">*</span></label>
                    <input name="confirmpassword" type="password" placeholder="Konfirmasi Password" id="confirm_password" class="form-control">
                    @if( $errors->has('confirmpassword') )
                        <div class="text-danger">{{ $errors->first('confirmpassword') }}</div>
                    @endif
                </div>

                <br>
                <hr>
                <div class="text-danger text-bold">
                    Secara default, foto profil akan menggunakan logo Course-Net.
                </div>
                <div class="form-group">
                    <label for="photo">Upload Foto Profil</label><br>
                    <input type="file" name="photo" placeholder="">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Password Tidak Sesuai");
    } else {
        confirm_password.setCustomValidity('');
    }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
@endsection