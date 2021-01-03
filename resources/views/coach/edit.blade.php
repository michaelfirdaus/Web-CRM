@extends('layouts.app')

@section('header') Perbaharui Coach {{ $coach->name }} @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('coach.update', ['id' => $coach->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Coach</label>
                    <input type="text" name="name" value="{{ $coach->name }}" class="form-control">
                </div>
        
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Coach</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  
@endsection