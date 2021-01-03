@extends('layouts.app')

@section('header') Perbaharui Referensi {{$reference->name}} @endsection

@section('content')

@include('includes.errors')

    <div class="card"> 
        <div class="card-body">
            <form action="{{ route('reference.update', ['id' => $reference->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Referensi</label>
                    <input type="text" id="name" name="name" value="{{ $reference->name }}">
                </div>

                <div class="form-group">
                    <label for="phone">Nomor Telepon Referensi</label>
                    <input type="text" id="phone" name="phone" value="{{ $reference->phone }}">
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