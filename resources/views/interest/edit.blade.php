@extends('layouts.app')

@section('title')Edit Minat Program {{$interest->participant_id}} - {{$interest->participant->name}} @endsection

@section('header') Perbaharui Minat Program <br>{{$interest->participant_id}} - {{$interest->participant->name}} @endsection

@section('breadcrumb')
<a href="/participants" class="mr-1">Dashboard Peserta</a>/ 
<a href="/interests/{{$interest->participant_id}}" class="mr-1 ml-1">Minat Program {{$interest->participant_id}} - {{$interest->participant->name}}</a>/ 
Edit Minat Program
@endsection

@section('content')

    <div class="card"> 
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('interest.update', ['id' => $interest->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="program_id">Minat Program <span class="text-danger">*</span></label>
                    <select name="program_id" id="program_id" class="form-control select2" style="width: 300px;">
                    @foreach($programnames as $program)
                        @if($program->id == $interest->programname_id)
                            <option selected value="{{ $program->id }}"> {{ $program->name }} </option> 
                        @else
                            <option value="{{ $program->id }}"> {{ $program->name }} </option> 
                        @endif
                    @endforeach
                    </select>
                    @if( $errors->has('program_id') )
                        <div class="text-danger">{{ $errors->first('program_id') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Minat Program</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection