@extends('layouts.app')

@section('header') Perbaharui Nama Program {{$programname->name}} Course-Net @endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('programname.update', ['id' => $programname->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Program <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Contoh: CCNA" value="{{ $programname->name }}" class="form-control">
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="status">Status Program <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control select2" style="width: auto;">
                        @if($programname->status == 1)
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
                        <button type="submit" class="btn btn-success">Perbaharui Program</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection