@extends('layouts.app')

@section('header') List Semua Sales Course-Net @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('salesperson.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Sales</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-hover table-bordered">
                <thead>
                    <th class="text-center">
                        Nama Sales
                    </th>
                    <th class="text-center">
                        Status Sales
                    </th>
                    <th class="text-center">
                        Edit
                    </th>
                </thead>
        
                <tbody>
                    @if($salespersons->count() > 0)
                        @foreach ($salespersons as $salesperson)
                            <tr>
                                <td>
                                    {{ $salesperson->name }}
                                </td>
                                <td class="text-center">
                                    @if($salesperson->status == 1)
                                        Aktif
                                    @else
                                        Tidak Aktif
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('salesperson.edit', ['id' => $salesperson ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
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