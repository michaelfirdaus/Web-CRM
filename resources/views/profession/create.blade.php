@extends('layouts.app')

@section('content')

    {{-- @include('admin.includes.errors') --}}


    <div class="card">
        <div class="card-header">
            Insert New Profession
        </div>

        <div class="card-body">
            <form action="{{ route('profession.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Profession Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Submit New Profession</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection