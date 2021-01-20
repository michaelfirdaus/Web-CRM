@extends('layouts.app')

@section('header') Perbaharui Referensi {{$reference->name}} @endsection

@section('content')

    <div class="card"> 
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('reference.update', ['id' => $reference->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Referensi <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" value="{{ $reference->name }}" placeholder="Contoh: Michael" class="form-control">
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="phone">Nomor Telepon Referensi <span class="text-danger">*</span></label>
                    <input type="text" id="phone" name="phone" value="{{ $reference->phone }}" placeholder="Contoh: 628561111011" class="form-control">
                    @if( $errors->has('phone') )
                        <div class="text-danger">{{ $errors->first('phone') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Referensi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection