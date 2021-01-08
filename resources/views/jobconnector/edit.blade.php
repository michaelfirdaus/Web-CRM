@extends('layouts.app')

@section('header') Perbaharui Perusahaan {{ $jobconnector->name }} @endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('jobconnector.update', ['id' => $jobconnector->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Perusahaan <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Contoh: BCA" value="{{ $jobconnector->company_name }}" class="form-control">
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="location">Lokasi Perusahaan <span class="text-danger">*</span></label>
                    <input type="text" name="location" placeholder="Contoh: BCA" value="{{ $jobconnector->location }}" class="form-control">
                    @if( $errors->has('location') )
                        <div class="text-danger">{{ $errors->first('location') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Perusahaan Rekanan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection