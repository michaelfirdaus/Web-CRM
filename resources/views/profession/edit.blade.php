@extends('layouts.app')

@section('header') Perbaharui Profesi {{ $profession->name }} @endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('profession.update', ['id' => $profession->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Profesi <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Contoh: Staff" value="{{ $profession->name }}" class="form-control">
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
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