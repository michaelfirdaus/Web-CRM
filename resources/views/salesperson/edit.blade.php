@extends('layouts.app')

@section('content')

    @include('includes.errors')


    <div class="card">
        <div class="card-header">
            Perbaharui Sales {{ $salespeople->name }}
        </div>

        <div class="card-body">
            <form action="{{ route('salespeople.update', ['id' => $salespeople->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Sales</label>
                    <input type="text" name="name" value="{{ $salespeople->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Sales</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection