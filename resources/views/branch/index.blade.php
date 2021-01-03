@extends('layouts.app')

@section('header') List Semua Cabang @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('branch.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Cabang Baru</a>
        </div>
    </div>
    <div class="card">
        <div class="card card-body">
            <table id="table" class="table table-hover table-bordered table-responsive">
                <thead>
                    <th>
                        Nama Cabang
                    </th>
                    <th>
                        Kode Cabang
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($branches->count() > 0)
                        @foreach ($branches as $branch)
                            <tr>
                                <td>
                                    {{ $branch->name }}
                                </td>
                                <td>
                                    {{ $branch->code }}
                                </td>
                                <td>
                                    <a href="{{ route('branch.edit', ['id' => $branch ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('branch.delete', ['id' => $branch ->id]) }}" class="btn btn-xs btn-danger">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">Tidak ada cabang, tambahkan cabang terlebih dahulu.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    
@endsection