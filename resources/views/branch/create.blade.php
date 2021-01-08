@extends('layouts.app')

@section('header') Tambah Cabang Course-Net Baru @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('branch.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Cabang <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Bandung" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="code">Kode Cabang <span class="text-danger">*</span></label>
                    <input type="text" name="code" class="form-control" placeholder="Contoh: 1" value="{{ old('code') }}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Cabang</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
@endsection