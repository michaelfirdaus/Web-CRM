@extends('layouts.app')

@section('header') Perbaharui Batch Program {{ $program->programname->name }}<br> Tanggal {{ $program->date }} @endsection

@section('content')

    <div class="card"> 
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('program.update', ['id' => $program->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="programcategory">Nama Program <span class="text-danger">*</span></label>
                    <select name="programname" id="programname" class="form-control select2" style="width: auto;">
                    @foreach($programnames as $p)
                        @if($p->id == $program->programname->id)
                            <option selected value="{{ $p->id }}"> {{ $p->name }} </option>
                        @else
                            <option value="{{ $p->id }}"> {{ $p->name }} </option>
                        @endif
                    @endforeach
                    </select>
                    @if( $errors->has('programname') )
                        <div class="text-danger">{{ $errors->first('programname') }}</div>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="programcategory">Kategori Program <span class="text-danger">*</span></label>
                    <select name="programcategory" id="programcategory" class="form-control select2" style="width: auto;">
                        @foreach($programcategories as $p)
                            @if($program->programcategory_id == $p->id)
                                <option selected value="{{ $p->id }}"> {{ $p->name }} </option>
                            @else
                                <option value="{{ $p->id }}"> {{ $p->name }} </option>
                            @endif
                        @endforeach
                    </select>
                    @if( $errors->has('programcategory') )
                        <div class="text-danger">{{ $errors->first('programcategory') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="date">Tanggal Batch <span class="text-danger">*</span></label>
                    <input type="date" id="date" name="date" value="{{ $program->date }}" class="ml-2">
                    @if( $errors->has('date') )
                        <div class="text-danger">{{ $errors->first('date') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="branch_location">Lokasi Kelas/Cabang <span class="text-danger">*</span></label>
                    <select name="branch_location" id="location" class="form-control select2" style="width: auto;">
                        @foreach($branches as $branch)
                            @if($branch->id == $current_branch)
                                <option selected value="{{ $branch->id }}"> {{ $branch->code }} - {{ $branch->name }} </option>
                            @else
                                <option value="{{ $branch->id }}"> {{ $branch->code }} - {{ $branch->name }} </option>
                            @endif
                        @endforeach
                    </select>
                    @if( $errors->has('branch_location') )
                        <div class="text-danger">{{ $errors->first('branch_location') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Batch Program</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
@endsection