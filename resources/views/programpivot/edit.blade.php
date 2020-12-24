@extends('layouts.app')

@section('header') Perbaharui Jadwal Kelas {{ $current_program->name }}, Tanggal {{ $coachprogram->date }} @endsection

@section('content')

@include('includes.errors')

    <div class="card"> 
        <div class="card-body">
            <form action="{{ route('programpivot.update', ['id' => $coachprogram->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="program">Nama Program</label>
                    <select name="program" id="program" class="form-control">
                        @foreach($programs as $program)
                            @if($program->id == $coachprogram->program_id)
                                <option selected value="{{ $program->id }}"> {{ $program->name }} </option>
                            @else
                                <option value="{{ $program->id }}"> {{ $program->name }} </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="coach">Coach yang Akan Mengajar</label>
                    <select name="coach" id="coach" class="form-control">
                        @foreach($coaches as $coach)
                            @if($coach->id == $coachprogram->coach_id)
                                <option selected value="{{ $coach->id }}"> {{ $coach->name }} </option>
                            @else
                                <option value="{{ $coach->id }}"> {{ $coach->name }} </option>
                            @endif 
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date">Tanggal Batch</label>
                    <input type="date" id="date" name="date" value="{{ $coachprogram->date }}">
                </div>

                <div class="form-group">
                    <label for="branch">Lokasi Kelas</label>
                    <select name="branch" id="branch" class="form-control">
                        @foreach($branches as $branch)
                            @if($branch->id == $current_program->branch_id)
                                <option selected value="{{ $branch->id }}"> {{ $branch->name }} </option>
                            @else
                                <option value="{{ $branch->id }}"> {{ $branch->name }} </option>
                            @endif 
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Jadwal Kelas</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection