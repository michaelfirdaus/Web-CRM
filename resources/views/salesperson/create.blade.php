@extends('layouts.app')

@section('content')

    @include('includes.errors')


    <div class="card">
        <div class="card-header">
            Tambah Sales Baru
        </div>

        <div class="card-body">
            <form action="{{ route('salespeople.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Sales</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Sales Baru</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection