@extends('layouts.app')

@section('header') Tambah Kategori Program Baru @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('programcategory.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Kategori Program <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Contoh: Advanced" class="form-control" value="{{ old('name') }}">
                </div>


                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Kategori Program</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection