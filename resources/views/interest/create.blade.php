@extends('layouts.app')

@section('header') Tambah Minat Program Baru Untuk Peserta  @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('interest.store', ['id' => $currentparticipant]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="program_id">Minat Program</label>
                    <select name="program_id" id="program_id" class="form-control select2" style="width: 300px;">
                        <option value="" selected disabled hidden> - Pilih Minat Program - </option>
                    @foreach($programs as $program)
                        <option value="{{ $program->id }}"> {{ $program->name }} - {{ $program->branch->name }} </option> 
                    @endforeach
                    </select>
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