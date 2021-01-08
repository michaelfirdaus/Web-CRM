@extends('layouts.app')

@section('header') Tambah Coach Course-Net @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">  
            <p class="text-danger text-bold">* : Data diperlukan.</p> 
            <form action="{{ route('coach.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Coach <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Michael" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" placeholder="Contoh: michael@course-net.com" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="phonenumber">Nomor Telepon <span class="text-danger">*</span></label>
                    <input type="tel" name="phonenumber" class="form-control" placeholder="Contoh : 628551111111" value="{{ old('phonenumber') }}">
                </div>

                <div class="form-group">
                    <label for="dob">Tanggal Lahir <span class="text-danger">*</span></label>
                    <input type="date" name="dob" value="{{ old('dob') }}">
                </div>
        
                <div class="form-group">
                    <label for="address">Alamat <span class="text-danger">*</span></label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
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