@extends('layouts.app')

@section('title')Ubah Password @endsection

@section('header')Ubah Password Saya @endsection

@section('breadcrumb')
<a href="/user/profile" class="mr-1">Profil Saya</a>/ 
Ubah Password
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('user.profile.updatepassword', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="old_password">Password Lama <span class="text-danger">*</span></label>
                    <input name="old_password" type="password" placeholder="Password Lama Anda" id="old_password" class="form-control">
                    @if( $errors->has('old_password') )
                            <div class="text-danger">{{ $errors->first('old_password') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Password Baru <span class="text-danger">*</span></label>
                    <input name="password" type="password" placeholder="Password Baru Anda" id="password" class="form-control">
                    @if( $errors->has('password') )
                            <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="confirmpassword">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                    <input name="confirmpassword" type="password" placeholder="Konfirmasi Password Baru Anda" id="confirm_password" class="form-control">
                    @if( $errors->has('confirmpassword') )
                            <div class="text-danger">{{ $errors->first('confirmpassword') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Ubah Password</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
@endsection

@section('scripts')

    var password = document.getElementById("password"),
    confirm_password = document.getElementById("confirmpassword");

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