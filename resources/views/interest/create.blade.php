@extends('layouts.app')

@section('title')Tambah Minat Program Peserta {{$participant->id}} - {{$participant->name}} @endsection

@section('header') Tambah Minat Program Peserta <br>{{$participant->id}} - {{$participant->name}} @endsection

@section('breadcrumb')
<a href="/participants" class="mr-1">Dashboard Peserta</a>/ 
<a href="/interests/{{$participant->id}}" class="mr-1 ml-1">Minat Program {{$participant->id}} - {{$participant->name}}</a>/ 
Tambah Minat Program
@endsection


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
                    @foreach($programnames as $p)
                        @if( old('program_id') )
                            <option selected value="{{ $p->id }}"> {{ $p->name }}</option>
                        @else
                            <option value="{{ $p->id }}"> {{ $p->name }}</option> 
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