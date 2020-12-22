@extends('layouts.app')

@section('content')

    {{-- @include('admin.includes.errors') --}}


    <div class="card"> 
        <div class="card-header">
            Update {{ $profession->name }} Profession
        </div>

        <div class="card-body">
            <form action="{{ route('profession.update', ['id' => $profession->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Profession Name</label>
                    <input type="text" name="name" value="{{ $profession->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update Profession</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection