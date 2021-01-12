@extends('layouts.app')

@section('header') Perbaharui Jadwal Kelas {{ $program->name }}<br>Batch {{ $program->date }} @endsection

@section('content')

    <div class="card mb-5">
        <div class="card-header text-danger text-bold">Informasi Penting</div>
        <div class="card-body">
            <ul>
                <li>Apabila Anda merubah Tanggal Batch, maka akan merubah juga data tanggal batch yang berada di List Semua <a href="{{ route('programs') }}">Batch Program</a>.</li>
            </ul>
        </div>
    </div>

    <div class="card"> 
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('coachprogram.update', ['id' => $program->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="program">Pilih Batch Program <span class="text-danger">*</span></label>
                    <select name="program" id="program" class="form-control select2" style="width: 300px;" disabled>
                    <option value="" selected disabled hidden> - Pilih Program - </option>
                    @foreach($programs as $p)
                        @if( $p->id == $program->id )
                        <option selected value="{{ $p->id }}"> {{ $p->programcategory->name }} - {{ $p->programname->name }} - Batch {{ $p->date }} </option>
                        @else
                            <option value="{{ $p->id }}"> {{ $p->programcategory->name }} - {{ $p->programname->name }} - Batch {{ $p->date }} </option>
                        @endif
                    @endforeach
                    </select>
                    @if( $errors->has('program') )
                        <div class="text-danger">{{ $errors->first('program') }}</div>
                    @endif
                </div>

            
                <div class="form-group">
                    <label>Nama Coach yang Akan Mengajar <span class="text-danger">*</span></label>
                    <select class="select2" multiple="multiple" name="coach[]" data-placeholder="Pilih Coach" style="width: 100%;">
                        @foreach($coaches as $coach)
                            <option value="{{ $coach->id }}"
                                @foreach($program->coachprograms as $c)
                                    @if($coach->id == $c->coach_id)
                                        selected
                                    @endif
                                @endforeach
                            > {{ $coach->name }} </option>      
                        @endforeach
                    </select>
                    @if( $errors->has('coach') )
                        <div class="text-danger">{{ $errors->first('coach') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="date">Tanggal Batch <span class="text-danger">*</span></label>
                    <input type="date" id="date" name="date" value="{{ $program->date }}">
                    @if( $errors->has('date') )
                        <div class="text-danger">{{ $errors->first('date') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="branch">Lokasi Kelas <span class="text-danger">*</span></label>
                    <select name="branch" id="branch" class="form-control">
                        @foreach($branches as $branch)
                            @if($branch->id == $program->branch_id)
                                <option selected value="{{ $branch->id }}"> {{ $branch->id }} - {{ $branch->name }} </option>
                            @else
                                <option value="{{ $branch->id }}"> {{ $branch->id }} - {{ $branch->name }} </option>
                            @endif 
                        @endforeach
                    </select>
                    @if( $errors->has('branch') )
                        <div class="text-danger">{{ $errors->first('branch') }}</div>
                    @endif
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