@extends('layouts.app')

@section('header') Perbaharui Program {{ $programcategory->name }} @endsection

@section('content')

@include('includes.errors')

    <div class="card"> 
        <div class="card-body">
            <form action="{{ route('programcategory.update', ['id' => $programcategory->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Kategori Program</label>
                    <input type="text" name="name" value="{{ $programcategory->name }}" class="form-control">
                </div>


                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Kategori Program</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
@endsection