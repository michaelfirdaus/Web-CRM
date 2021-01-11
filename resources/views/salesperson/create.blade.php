@extends('layouts.app')

@section('header') Tambah Sales Baru Course-Net @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('salesperson.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Sales <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Michael" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="status">Status Sales <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control select2" style="width: 300px;">
                    <option value="1" selected> Aktif </option>
                    <option value="0"> Tidak Aktif </option>
                    </select>
                    @if( $errors->has('status') )
                        <div class="text-danger">{{ $errors->first('status') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Sales</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
@endsection