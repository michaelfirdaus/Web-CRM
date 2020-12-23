@extends('layouts.app')

@section('content')

    @include('includes.errors')


    <div class="card">
        <div class="card-header">
            Tambah Jadwal Kelas Baru
        </div>

        <div class="card-body">
            <form action="{{ route('programpivot.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="program">Nama Program</label>
                    <select name="program" id="program" class="form-control">
                        @foreach($programs as $program)
                            <option value="{{ $program->id }}"> {{ $program->name }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="coach">Nama Coach yang Akan Mengajar</label>
                    <select name="coach" id="coach" class="form-control">
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