@extends('layouts.app')

@section('header') Tambah Jadwal Kelas Baru @endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('coachprogram.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="program">Nama Program <span class="text-danger">*</span></label>
                    <select name="program" id="program" class="form-control select2" style="width: 300px;">
                    <option value="" selected disabled hidden> - Pilih Program - </option>
                    @foreach($programs as $program)
                        @if( old('program') )
                        <option selected value="{{ $program->id }}"> {{ $program->programcategory->name }} - {{ $program->name }} </option>
                        @else
                            <option value="{{ $program->id }}"> {{ $program->programcategory->name }} - {{ $program->name }} </option>
                        @endif
                    @endforeach
                    </select>
                    @if( $errors->has('program') )
                        <div class="text-danger">{{ $errors->first('program') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="coach">Nama Coach yang Akan Mengajar <span class="text-danger">*</span></label>
                    <select name="coach" id="coach" class="form-control select2" style="width: 300px;">
                    <option value="" selected disabled hidden> - Pilih Coach - </option>
                    @foreach($coaches as $coach)
                        @if( old('coach') )
                            <option selected value="{{ $coach->id }}"> {{ $coach->name }} </option>
                        @else
                            <option value="{{ $coach->id }}"> {{ $coach->name }} </option>
                        @endif
                    @endforeach
                    </select>
                    @if( $errors->has('coach') )
                        <div class="text-danger">{{ $errors->first('coach') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="date">Tanggal Batch <span class="text-danger">*</span></label>
                    <input type="date" id="date" name="date" value="{{ old('date') }}">
                    @if( $errors->has('date') )
                        <div class="text-danger">{{ $errors->first('date') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Jadwal Kelas</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
