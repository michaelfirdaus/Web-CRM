@extends('layouts.app')

@section('header') Tambah Kelas Baru @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('program.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="programcategory">Kategori Program</label>
                    <select name="programcategory" id="programcategory" class="form-control select2" style="width: 300px;">
                    <option value="" selected disabled hidden> - Pilih Kategori Program - </option>
                    @foreach($programcategories as $p)
                        <option value="{{ $p->id }}"> {{ $p->name }} </option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Nama Program</label>
                    <input type="text" name="name" class="form-control" value={{ old('name') }}>
                </div>

                <div class="form-group">
                    <label for="branch_location">Lokasi Cabang</label>
                    <select name="branch_location" id="location" class="form-control select2" style="width: 300px;">
                    <option value="" selected disabled hidden> - Pilih Lokasi Kelas/Cabang - </option>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}"> {{ $branch->name }} </option>
                    @endforeach
                    </select>
                </div>




                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Program</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection