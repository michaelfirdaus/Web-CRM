@extends('layouts.app')

@section('title') Sunting Profil @endsection

@section('header')Sunting Profil Saya @endsection

@section('breadcrumb')
<a href="/user/profile" class="mr-1">Profil Saya</a>/ 
Edit Profil
@endsection

@section('content')

    <div class="card">
        <div class="card-header text-danger text-bold">Informasi Penting</div>
        <div class="card-body">
            <ul>
                <li><b>Anda bisa mengganti username dengan meminta kepada Administrator Web CRM Course-Net.</b> </li>
                <li>Format foto yang diizinkan adalah .jpeg  .jpg  .png</li>  
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('user.profile.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="username">Username (Untuk Login Akun) <span class="text-danger">*</span></label>
                    <input type="text" name="username" class="form-control" placeholder="Contoh: michael" value={{ $user->username }} disabled>
                    @if( $errors->has('username') )
                        <div class="text-danger">{{ $errors->first('username') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="name">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Michael Firdaus" value={{ $user->name }}>
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <hr>
                <div class="text-danger text-bold">
                    Apabila tidak perlu pengubahan foto profil, silahkan lewati.
                </div>
                <div class="form-group">
                    <label for="photo">Upload Foto Profil</label><br>
                    <input type="file" name="photo" placeholder="">
                    @if( $errors->has('photo') )
                        <div class="text-danger">{{ $errors->first('photo') }}</div>
                    @endif
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