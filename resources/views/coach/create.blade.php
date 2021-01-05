@extends('layouts.app')

@section('header') Tambah Coach Course-Net @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">   
            <form action="{{ route('coach.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Coach</label>
                    <input type="text" name="name" class="form-control" value={{ old('name') }}>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value={{ old('email') }}>
                </div>

                <div class="form-group">
                    <label for="phonenumber">Nomor Telepon</label>
                    <input type="tel" name="phonenumber" class="form-control" placeholder="Contoh : 628551111111" value={{ old('phonenumber') }}>
                </div>

                <div class="form-group">
                    <label for="dob">Tanggal Lahir</label>
                    <input type="date" name="dob" class="form-control" value={{ old('dob') }}>
                </div>
        
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" name="address" class="form-control" value={{ old('address') }}>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Coach</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
 
@endsection