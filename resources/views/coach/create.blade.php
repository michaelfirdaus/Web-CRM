@extends('layouts.app')

@section('title')Tambah Coach @endsection

@section('header') Tambah Coach @endsection

@section('breadcrumb')
<a href="/branches" class="mr-1">Coach</a>/ 
Tambah Coach
@endsection

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
                    <input type="email" name="email" class="form-control" placeholder="Contoh: michael@sample.com" value="{{ old('email') }}">
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
                    <input type="date" name="dob" value="{{ old('dob') }}" class="ml-2">
                    @if( $errors->has('dob') )
                        <div class="text-danger">{{ $errors->first('dob') }}</div>
                    @endif
                </div>
        
                <div class="form-group">
                    <label for="address">Alamat <span class="text-danger">*</span></label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="Contoh: Villa Permata Berlian, Jalan Sukses 1 Blok E1-9, Jakarta 12345">
                    @if( $errors->has('address') )
                        <div class="text-danger">{{ $errors->first('address') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="status">Status Coach <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control select2" style="width: auto;">
                    <option value="1" selected> Aktif </option>
                    <option value="0"> Tidak Aktif </option>
                    </select>
                    @if( $errors->has('status') )
                        <div class="text-danger">{{ $errors->first('status') }}</div>
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