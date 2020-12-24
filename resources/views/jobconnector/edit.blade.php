@extends('layouts.app')

@section('header') Perbaharui Perusahaan {{ $jobconnector->name }} @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('jobconnector.update', ['id' => $jobconnector->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Perusahaan</label>
                    <input type="text" name="name" value="{{ $jobconnector->company_name }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="location">Lokasi Perusahaan</label>
                    <input type="text" name="location" value="{{ $jobconnector->location }}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Perusahaan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection