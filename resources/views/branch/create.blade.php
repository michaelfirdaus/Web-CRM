@extends('layouts.app')

@section('header') Tambah Cabang Course-Net Baru @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('branch.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Cabang</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="code">Kode Cabang</label>
                    <input type="text" name="branch_code" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Cabang</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
@endsection