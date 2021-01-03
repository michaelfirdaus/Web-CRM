@extends('layouts.app')

@section('header') Tambah Jadwal Kelas Baru @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('coachprogram.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="program">Nama Program</label>
                    <select name="program" id="program" class="form-control">
                    {{-- <option value="" selected disabled hidden> - Pilih Program - </option> --}}
                    @foreach($programs as $program)
                        <option value="{{ $program->id }}"> {{ $program->name }} </option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="coach">Nama Coach yang Akan Mengajar</label>
                    <select name="coach" id="coach" class="form-control">
                    {{-- <option value="" selected disabled hidden> - Pilih Coach - </option> --}}
                    @foreach($coaches as $coach)
                        <option value="{{ $coach->id }}"> {{ $coach->name }} </option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date">Tanggal Batch</label>
                    <input type="date" id="date" name="date">
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

@section('scripts')
    $(document).ready(function(e){
  
        $('#program').select3({ width: 260, placeholder: ' - Pilih Program - ', zIndex: 100 });  
        $('#coach').select3({ width: 260, placeholder: ' - Pilih Coach - ', zIndex: 100 });  
  
  
    });
@endsection