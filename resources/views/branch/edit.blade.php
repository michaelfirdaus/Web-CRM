@extends('layouts.app')

@section('title')Edit Cabang/Lokasi Kelas {{$branch->name}} @endsection

@section('header') Perbaharui Cabang/Lokasi Kelas {{ $branch->name }} @endsection

@section('breadcrumb')
<a href="/branches" class="mr-1">Cabang/Lokasi Kelas</a>/ 
Edit Cabang/Lokasi Kelas {{$branch->name}}
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('branch.update', ['id' => $branch->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Cabang <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ $branch->name }}" placeholder="Contoh: Bandung" class="form-control">
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="code">Kode Cabang <span class="text-danger">*</span></label>
                    <input type="text" name="code" value="{{ $branch->code }}" placeholder="Contoh: 1" class="form-control">
                    @if( $errors->has('code') )
                        <div class="text-danger">{{ $errors->first('code') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="status">Status Cabang/Lokasi Kelas <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control select2" style="width: auto;">
                        @if($branch->status == 1)
                            <option value="1" selected> Aktif </option>
                            <option value="0"> Tidak Aktif </option>
                        @else
                            <option value="1"> Aktif </option>
                            <option value="0" selected> Tidak Aktif </option>
                        @endif
                    </select>
                    @if( $errors->has('status') )
                        <div class="text-danger">{{ $errors->first('status') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Cabang/Lokasi Kelas</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection