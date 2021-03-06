@extends('layouts.app')

@section('title')Edit Kategori Program {{$programcategory->name}} @endsection

@section('header') Perbaharui Kategori Program <br>{{ $programcategory->name }} @endsection

@section('breadcrumb')
<a href="/programcategories" class="mr-1">Kategori Program</a>/ 
Edit Kategori Program {{$programcategory->name}}
@endsection

@section('content')

    <div class="card"> 
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('programcategory.update', ['id' => $programcategory->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Kategori Program <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Contoh: Advanced" value="{{ $programcategory->name }}" class="form-control">
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="status">Status Kategori Program <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control select2" style="width: auto;">
                        @if($programcategory->status == 1)
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
                        <button type="submit" class="btn btn-success">Perbaharui Kategori Program</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
@endsection