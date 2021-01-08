@extends('layouts.app')

@section('header') Tambah Profesi Baru @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('profession.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Profesi <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Contoh: Staff" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Profesi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection