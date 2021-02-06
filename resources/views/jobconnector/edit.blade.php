@extends('layouts.app')

@section('title')Edit Perusahaan Rekanan {{$jobconnector->name}} @endsection

@section('header') Perbaharui Perusahaan {{ $jobconnector->name }} @endsection

@section('breadcrumb')
<a href="/knowcns" class="mr-1">Perusahaan Rekanan</a>/ 
Edit Perusahaan {{$jobconnector->name}}
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('jobconnector.update', ['id' => $jobconnector->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Perusahaan <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Contoh: BCA" value="{{ $jobconnector->name }}" class="form-control">
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
                    <label for="status">Status Perusahaan <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control select2" style="width: auto;">
                        @if($jobconnector->status == 1)
                            <option value="1" selected> Aktif </option>
                            <option value="0"> Tidak Aktif </option>
                        @else
                            <option value="1"> Aktif </option>
                            <option value="0" selected> Tidak Aktif </option>
                        @endif
                    </select>
                    @if( $errors->has('status') )
                        <div class="text-danger">{{ $errors->first('status') }}</div>
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