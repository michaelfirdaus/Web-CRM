@extends('layouts.app')

@section('content')

    @include('includes.errors')


    <div class="card"> 
        <div class="card-header">
            Perbaharui Profesi {{ $profession->name }}
        </div>

        <div class="card-body">
            <form action="{{ route('profession.update', ['id' => $profession->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Profesi</label>
                    <input type="text" name="name" value="{{ $profession->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Profesi</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection