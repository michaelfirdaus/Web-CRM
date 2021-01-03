@extends('layouts.app')

@section('header') List Semua Profesi @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('profession.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Profesi</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-hover table-bordered">
                <thead>
                    <th class="text-center">
                        Nama Profesi
                    </th>
                    <th class="text-center">
                        Edit
                    </th>
                    <th class="text-center">
                        Hapus
                    </th>
                </thead>

                <tbody>
                    @if($professions->count() > 0)
                        @foreach ($professions as $profession)
                            <tr>
                                <td>
                                    {{ $profession->name }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('profession.edit', ['id' => $profession ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('profession.delete', ['id' => $profession ->id]) }}" class="btn btn-xs btn-danger">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">Tidak ada profesi yang tersedia, tambahkan profesi baru.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    
@endsection