@extends('layouts.app')

@section('header') Tambah Program Baru @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('program.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="programcategory">Kategori Program <span class="text-danger">*</span></label>
                    <select name="programcategory" id="programcategory" class="form-control select2" style="width: 300px;">
                    <option value="" selected disabled hidden> - Pilih Kategori Program - </option>
                    @foreach($programcategories as $p)
                        @if( old('programcategory') )
                            <option selected value="{{ $p->id }}"> {{ $p->name }} </option>
                        @else
                            <option value="{{ $p->id }}"> {{ $p->name }} </option>
                        @endif
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Nama Program <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: CCNA" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="branch_location">Lokasi Cabang <span class="text-danger">*</span></label>
                    <select name="branch_location" id="location" class="form-control select2" style="width: 300px;">
                    <option value="" selected disabled hidden> - Pilih Lokasi Kelas/Cabang - </option>
                    @foreach($branches as $branch)
                        @if( old('branch_location') )
                            <option selected value="{{ $branch->id }}"> {{ $branch->id }} - {{ $branch->name }} </option>
                        @else
                            <option value="{{ $branch->id }}"> {{ $branch->id }} - {{ $branch->name }} </option>
                        @endif
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