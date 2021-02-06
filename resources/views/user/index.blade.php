@extends('layouts.app')

@section('title')Profil {{Auth::user()->name}}@endsection

@section('header')Profil Saya @endsection

@section('breadcrumb')
Profil Saya
@endsection

@section('content')
    <div class="card col-lg-10 my-auto mx-auto">
        <div class="card-body">
            <div class="text-center">
                <img src="{{ asset('uploads/userphoto/'.Auth::user()->photo) }}" alt="" class="img-thumbnail" height="20%" width="20%"><br><br>
                <h4>{{Auth::user()->name}}</h4>
                <hr>
            </div>
            <strong>Username: </strong>{{$user->username}}
            <br>
            <strong>Password: </strong>******<br>
            <br>
            <strong>Status: </strong>
                @if($user->admin == 1)
                    Admin
                @else
                    User
                @endif
            <br><br>
            <strong>Akun Dibuat: </strong>{{$user->created_at}}
            <br>
            <strong>Akun Terakhir Diedit: </strong> {{$user->updated_at}}
        </div>
    </div>
    <div class="text-center">
        <a href="{{ route('user.profile.changepassword') }}" class="btn btn-md btn-primary m-3">
            <span class="fas fa-key mr-1"></span> Ubah Password
        </a>
        <a href="{{ route('user.profile.edit') }}" class="btn btn-md btn-info m-3">
            <span class="fas fa-pencil-alt mr-1"></span> Edit Profil
        </a>
    </div>
    <div class="text-center">
        
    </div>
@endsection