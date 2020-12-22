@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card card-header">
            <th><strong>List Semua Sales</strong></th>
        </div>
        <div class="card card-body">

            <table class="table table-hover">
                <thead>
                    <th>
                        Nama Sales
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($salesperson->count() > 0)
                        @foreach ($salesperson as $salespeople)
                            <tr>
                                <td>
                                    {{ $coach->name }}
                                </td>
                                <td>
                                    <a href="{{ route('salespeople.edit', ['id' => $salespeople ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('salespeople.delete', ['id' => $salespople ->id]) }}" class="btn btn-xs btn-danger">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">Tidak ada sales yang tersedia, tambahkan sales terlebih dahulu.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection