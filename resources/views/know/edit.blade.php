@extends('layouts.app')

@section('header') Perbaharui Kanal {{$know->name}} CRM @endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('know.update', ['id' => $know->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Kanal <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Contoh: Youtube" value="{{ $know->name }}" class="form-control">
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="status">Status Kanal <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control select2" style="width: auto;">
                        @if($know->status == 1)
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
                        <button type="submit" class="btn btn-success">Perbaharui Kanal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection