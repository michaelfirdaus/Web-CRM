@extends('layouts.app')

@section('header') List Semua Batch Program @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('program.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Batch Program</a>
        </div>
    </div>
    <div class="card">
        <div class="card card-body">
            <table id="table" class="table table-hover  table-bordered">
                <thead>
                    <th class="text-center">
                        Nama Program
                    </th>
                    <th class="text-center">
                        Kategori Program
                    </th>
                    <th class="text-center">
                        Tanggal Batch
                    </th>
                    <th class="text-center"> 
                        Lokasi Cabang
                    </th>
                    <th class="text-center">
                        Edit
                    </th>
                </thead>
        
                <tbody>
                    @if($programs->count() > 0)
                        @foreach ($programs as $program)
                            <tr>
                                <td>
                                    {{ $program->programname->name }}
                                </td>
                                <td>
                                    {{ $program->programcategory->name }}
                                </td>
                                <td>
                                    {{ $program->date }}
                                </td>
                                <td>
                                    {{ $program->branch->name }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('program.edit', ['id' => $program ->id]) }}" class="btn btn-xs btn-info">
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