@extends('layouts.app')

@section('header') Tambah Kanal Baru Course-Net @endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('knowcn.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Kanal <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Contoh: Youtube" class="form-control" value="{{ old('name') }}">
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Kanal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection