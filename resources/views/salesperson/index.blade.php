@extends('layouts.app')

@section('header') List Semua Sales Course-Net @endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-responsive">
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
                    @if($salespersons->count() > 0)
                        @foreach ($salespersons as $salesperson)
                            <tr>
                                <td>
                                    {{ $salesperson->name }}
                                </td>
                                <td>
                                    <a href="{{ route('salesperson.edit', ['id' => $salesperson ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('salesperson.delete', ['id' => $salesperson ->id]) }}" class="btn btn-xs btn-danger">
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