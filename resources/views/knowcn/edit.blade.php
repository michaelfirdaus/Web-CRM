@extends('layouts.app')

@section('header') Perbaharui Kanal {{$knowcn->name}} Course-Net @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('knowcn.update', ['id' => $knowcn->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Kanal <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Contoh: Youtube" value="{{ $knowcn->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Kanal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection