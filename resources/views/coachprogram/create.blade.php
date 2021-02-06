@extends('layouts.app')

@section('title')Tambah Jadwal Kelas @endsection

@section('header') Tambah Jadwal Kelas @endsection

@section('breadcrumb')
<a href="/coachprograms" class="mr-1">Jadwal Kelas</a>/ 
Tambah Jadwal Kelas 
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('coachprogram.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="program">Pilih Batch Program <span class="text-danger">*</span></label>
                    <select name="program" id="program" class="form-control select2" style="width: auto;">
                    <option value="" selected disabled hidden> - Pilih Program - </option>
                    @foreach($programs as $program)
                        @if( old('program') )
                        <option selected value="{{ $program->id }}"> {{ $program->programcategory->name }} | {{ $program->programname->name }} | Batch {{ $program->date }} </option>
                        @else
                            <option value="{{ $program->id }}"> {{ $program->programcategory->name }} | {{ $program->programname->name }} | Batch {{ $program->date }} </option>
                        @endif
                    @endforeach
                    </select>
                    @if( $errors->has('program') )
                        <div class="text-danger">{{ $errors->first('program') }}</div>
                    @endif
                </div>

                {{-- <div class="form-group">
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
                </div> --}}

                <div class="form-group">
                    <label>Nama Coach yang Akan Mengajar <span class="text-danger">*</span></label>
                    <select class="select2" multiple="multiple" name="coach[]" data-placeholder="Masukkan Nama Coach" style="width: 100%;">
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
                

{{-- 
                <div class="form-group">
                    <label for="date">Tanggal Batch <span class="text-danger">*</span></label>
                    <input type="date" id="date" name="date" value="{{ old('date') }}">
                    @if( $errors->has('date') )
                        <div class="text-danger">{{ $errors->first('date') }}</div>
                    @endif
                </div> --}}
                

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Jadwal Kelas</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
