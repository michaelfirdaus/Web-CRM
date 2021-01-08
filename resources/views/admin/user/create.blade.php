@extends('layouts.app')

@section('header') Tambah User Baru @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama User</label>
                    <input type="text" name="name" class="form-control" value={{ old('name') }}>
                </div>

                <div class="form-group">
                    <label for="username">Username (Untuk Login)</label>
                    <input type="text" name="username" class="form-control" value={{ old('username') }}>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" placeholder="Password" id="password" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="confirmpassword">Konfirmasi Password</label>
                    <input name="confirmpassword" type="password" placeholder="Konfirmasi Ubah Password" id="confirm_password" class="form-control">
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