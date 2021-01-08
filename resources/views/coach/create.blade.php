@extends('layouts.app')

@section('header') Tambah Coach Course-Net @endsection

@section('content')

    <div class="card">
        <div class="card-body">  
            <p class="text-danger text-bold">* : Data diperlukan.</p> 
            <form action="{{ route('coach.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Coach <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Michael" value="{{ old('name') }}">
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" placeholder="Contoh: michael@course-net.com" value="{{ old('email') }}">
                    @if( $errors->has('email') )
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="phonenumber">Nomor Telepon <span class="text-danger">*</span></label>
                    <input type="tel" name="phonenumber" class="form-control" placeholder="Contoh : 628551111111" value="{{ old('phonenumber') }}">
                    @if( $errors->has('phonenumber') )
                        <div class="text-danger">{{ $errors->first('phonenumber') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="dob">Tanggal Lahir <span class="text-danger">*</span></label>
                    <input type="date" name="dob" value="{{ old('dob') }}">
                    @if( $errors->has('dob') )
                        <div class="text-danger">{{ $errors->first('dob') }}</div>
                    @endif
                </div>
        
                <div class="form-group">
                    <label for="address">Alamat <span class="text-danger">*</span></label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                    @if( $errors->has('address') )
                        <div class="text-danger">{{ $errors->first('address') }}</div>
                    @endif
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