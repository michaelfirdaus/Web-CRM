@extends('layouts.app')

@section('header') Perbaharui Cabang {{ $branch->name }} @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('branch.update', ['id' => $branch->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Cabang</label>
                    <input type="text" name="name" value="{{ $branch->branch_name }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="code">Kode Cabang</label>
                    <input type="text" name="branch_code" value="{{ $branch->branch_code }}" class="form-control">
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