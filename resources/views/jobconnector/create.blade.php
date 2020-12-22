@extends('layouts.app')

@section('content')

    @include('includes.errors')


    <div class="card">
        <div class="card-header">
            Tambah Perusahaan Penerima Loker
        </div>

        <div class="card-body">
            <form action="{{ route('jobconnector.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Perusahaan</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="location">Lokasi Perusahaan</label>
                    <input type="text" name="location" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Perusahaan</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection