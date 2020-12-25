@extends('layouts.app')

@section('header') List Semua Program @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('program.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Program</a>
        </div>
    </div>
    <div class="card">
        <div class="card card-body">
            <table id="table" class="table table-hover  table-bordered table-responsive">
                <thead>
                    <th>
                        Nama Program
                    </th>
                    <th> 
                        Lokasi Cabang
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($programs->count() > 0)
                        @foreach ($programs as $program)
                            <tr>
                                <td>
                                    {{ $program->name }}
                                </td>
                                <td>
                                    {{ $program->branch->name }}
                                </td>
                                <td>
                                    <a href="{{ route('program.edit', ['id' => $program ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('program.delete', ['id' => $program ->id]) }}" class="btn btn-xs btn-danger">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">Tidak ada program yang tersedia, tambahkan program baru.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection