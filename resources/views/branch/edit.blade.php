@extends('layouts.app')

@section('header') Perbaharui Cabang {{ $branch->name }} @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('branch.update', ['id' => $branch->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Cabang <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ $branch->name }}" placeholder="Contoh: Bandung" class="form-control">
                </div>

                <div class="form-group">
                    <label for="code">Kode Cabang <span class="text-danger">*</span></label>
                    <input type="text" name="code" value="{{ $branch->code }}" placeholder="Contoh: 1" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Cabang</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection