@extends('layouts.app')

@section('header') Sunting Profil Anda @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-header text-danger text-bold">Informasi Penting</div>
        <div class="card-body text-bold">
            PASTIKAN username tidak mengandung spasi.      
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="username">Username (Untuk Login Akun) <span class="text-danger">*</span></label>
                    <input type="text" name="username" class="form-control" placeholder="Contoh: michael" value={{ $user->username }}>
                </div>

                <div class="form-group">
                    <label for="name">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Michael Firdaus" value={{ $user->name }}>
                </div>

                <br>
                <hr>
                <div class="text-danger text-bold">
                    Apabila tidak perlu pengubahan password, silahkan kosongkan textbox dibawah ini.
                </div>
                <br>
                <div class="form-group">
                    <label for="password">Ubah Password</label>
                    <input name="password" type="password" placeholder="Password" id="password" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="confirmpassword">Konfirmasi Ubah Password</label>
                    <input name="confirmpassword" type="password" placeholder="Konfirmasi Ubah Password" id="confirm_password" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Profil</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
@endsection

@section('scripts')

    var password = document.getElementById("password"),
    confirm_password = document.getElementById("confirm_password");

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