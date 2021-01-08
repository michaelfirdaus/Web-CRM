@extends('layouts.app')

@section('header') Perbaharui Program {{ $program->name }} @endsection

@section('content')

@include('includes.errors')

    <div class="card"> 
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('program.update', ['id' => $program->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="programcategory">Kategori Program <span class="text-danger">*</span></label>
                    <select name="programcategory" id="programcategory" class="form-control select2" style="width: 300px;">
                        @foreach($programcategories as $p)
                            @if($program->programcategory_id == $p->id)
                                <option selected value="{{ $p->id }}"> {{ $p->name }} </option>
                            @else
                                <option value="{{ $p->id }}"> {{ $p->name }} </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Nama Program <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Contoh: CCNA" value="{{ $program->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="branch_location">Lokasi Cabang <span class="text-danger">*</span></label>
                    <select name="branch_location" id="location" class="form-control select2" style="width: 300px;">
                        @foreach($branches as $branch)
                            @if($branch->id == $current_branch)
                                <option selected value="{{ $branch->id }}"> {{ $branch->name }} </option>
                            @else
                                <option value="{{ $branch->id }}"> {{ $branch->name }} </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Program</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
@endsection