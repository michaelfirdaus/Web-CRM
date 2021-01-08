@extends('layouts.app')

@section('header') Perbaharui User {{ $user->name }} @endsection

@section('content')

@include('includes.errors')

    <div class="card"> 
        <div class="card-body">
            <form action="{{ route('user.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama User</label>
                    <input type="text" name="name" class="form-control" value={{ $user->name }}>
                </div>

                <div class="form-group">
                    <label for="username">Username (Untuk Login)</label>
                    <input type="text" name="username" class="form-control" value={{ $user->username }}>
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