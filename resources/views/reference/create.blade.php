@extends('layouts.app')

@section('title')Tambah Referensi {{$participant->id}} - {{$participant->name}} @endsection

@section('header') Tambah Referensi Peserta<br>{{$participant->id}} - {{$participant->name}}@endsection

@section('breadcrumb')
<a href="/participants" class="mr-1">Dashboard Peserta</a>/
<a href="/references/{{$participant->id}}" class="mr-1 ml-1">Referensi {{$participant->id}} - {{ $participant->name }}</a>/ 
Tambah Referensi
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('reference.store', ['id' => $currentparticipant]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Referensi <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Contoh: Michael" value="{{ old('name') }}">
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="phone">Nomor Telepon Referensi <span class="text-danger">*</span></label>
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Contoh: 628561111011" value="{{ old('phone') }}">
                    @if( $errors->has('phone') )
                        <div class="text-danger">{{ $errors->first('phone') }}</div>
                    @endif
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