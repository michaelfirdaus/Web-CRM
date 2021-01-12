@extends('layouts.app')

@section('header') Tambah Nama Program Baru Course-Net @endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('programname.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Program <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Contoh: CCNA" class="form-control" value="{{ old('name') }}">
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="status">Status Program <span class="text-danger">*</span></label>
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
                        <button type="submit" class="btn btn-success">Tambahkan Program</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection