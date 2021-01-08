@extends('layouts.app')

@section('header') Tambah Perusahaan Penerima Loker @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('jobconnector.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Perusahaan <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Contoh: BCA" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="location">Lokasi Perusahaan <span class="text-danger">*</span></label>
                    <input type="text" name="location" placeholder="Contoh: Jakarta" class="form-control" value="{{ old('location') }}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Perusahaan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
@endsection