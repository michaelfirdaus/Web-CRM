@extends('layouts.app')

@section('header') Tambah Referensi Baru @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('reference.store', ['id' => $currentparticipant]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Referensi <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Contoh: Michael" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="phone">Nomor Telepon Referensi <span class="text-danger">*</span></label>
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Contoh: 628561111011" value="{{ old('phone') }}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Referensi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection