@extends('layouts.app')

@section('header') List Semua Kategori Program @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('programcategory.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Kategori Program</a>
        </div>
    </div>
    <div class="card">
        <div class="card card-body">
            <table id="table" class="table table-hover  table-bordered">
                <thead>
                    <th class="text-center">
                        Nama Kategori Program
                    </th>
                    <th class="text-center">
                        Edit
                    </th>
                </thead>
        
                <tbody>
                    @if($programcategories->count() > 0)
                        @foreach ($programcategories as $programcategory)
                            <tr>
                                <td>
                                    {{ $programcategory->name }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('programcategory.edit', ['id' => $programcategory ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="4" class="text-center">Tidak ada program yang tersedia, tambahkan program baru.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection