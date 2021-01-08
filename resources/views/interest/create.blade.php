@extends('layouts.app')

@section('header') Tambah Minat Program Baru Untuk Peserta  @endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('interest.store', ['id' => $currentparticipant]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="program_id">Minat Program <span class="text-danger">*</span></label>
                    <select name="program_id" id="program_id" class="form-control select2" style="width: 300px;">
                        <option value="" selected disabled hidden> - Pilih Minat Program - </option>
                    @foreach($programs as $program)
                        @if( old('program_id') )
                            <option selected value="{{ $program->id }}"> {{ $program->name }} - {{ $program->branch->name }} </option>
                        @else
                            <option value="{{ $program->id }}"> {{ $program->name }} - {{ $program->branch->name }} </option> 
                        @endif
                    @endforeach
                    </select>
                    @if( $errors->has('program_id') )
                        <div class="text-danger">{{ $errors->first('program_id') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Minat Program</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection