@extends('layouts.app')

@section('header') Perbaharui Referensi {{$interest->participant->name}} @endsection

@section('content')

@include('includes.errors')

    <div class="card"> 
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('interest.update', ['id' => $interest->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="program_id">Minat Program <span class="text-danger">*</span></label>
                    <select name="program_id" id="program_id" class="form-control select2" style="width: 300px;">
                    @foreach($programs as $program)
                        @if($interest->program->id == $interest->program_id)
                            <option selected value="{{ $program->id }}"> {{ $program->name }} - {{ $program->branch->name }} </option> 
                        @else
                            <option value="{{ $program->id }}"> {{ $program->name }} - {{ $program->branch->name }} </option> 
                        @endif
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Minat Program {{ $interest->participant->name }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection