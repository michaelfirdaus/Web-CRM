@extends('layouts.app')

@section('header') Perbaharui User {{ $user->name }} @endsection

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
            <form action="{{ route('user.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama User <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Michael Firdaus" value={{ $user->name }}>
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="username">Username (Untuk Login) <span class="text-danger">*</span></label>
                    <input type="text" name="username" class="form-control" placeholder="Contoh: michael" value={{ $user->username }}>
                    @if( $errors->has('username') )
                        <div class="text-danger">{{ $errors->first('username') }}</div>
                    @endif
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