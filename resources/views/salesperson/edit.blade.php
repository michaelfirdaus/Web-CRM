@extends('layouts.app')

@section('header') Perbaharui Sales {{$salesperson->name}} @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('salesperson.update', ['id' => $salesperson->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Sales</label>
                    <input type="text" name="name" value="{{ $salesperson->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Sales</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
@endsection