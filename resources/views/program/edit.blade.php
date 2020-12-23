@extends('layouts.app')

@section('content')

    @include('includes.errors')


    <div class="card"> 
        <div class="card-header">
            Perbaharui Program {{ $program->name }}
        </div>

        <div class="card-body">
            <form action="{{ route('program.update', ['id' => $program->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Program</label>
                    <input type="text" name="name" value="{{ $program->name }}" class="form-control">
                </div>


                <div class="form-group">
                    <label for="branch_location">Lokasi Cabang</label>
                    <select name="branch_location" id="location" class="form-control">
                        @foreach($branches as $branch)
                            @if($branch->id == $current_branch)
                                <option selected value="{{ $branch->id }}"> {{ $branch->name }} </option>
                            @else
                                <option value="{{ $branch->id }}"> {{ $branch->name }} </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                {{-- <div class="form-group">
                    <label for="date">Tanggal Batch</label>
                    <input type="date" id="date" name="date" value="{{ $program->date }}">
                </div> --}}


                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Program</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection