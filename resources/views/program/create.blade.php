@extends('layouts.app')

@section('content')

    @include('includes.errors')


    <div class="card">
        <div class="card-header">
            Tambah Program Baru
        </div>

        <div class="card-body">
            <form action="{{ route('profession.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Program</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="branch_location">Lokasi Cabang</label>
                    <select name="branch_location" id="location" class="form-control">
                        @foreach($branches as $branch)
                            <option value="{{ $branch->id }}"> {{ $branch->name }} </option>
                        @endforeach
                    </select>
                </div>

                {{-- <div class="form-group">
                    <label for="date">Tanggal Batch</label>
                    <input type="date" id="date" name="date">
                </div> --}}

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Program</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection