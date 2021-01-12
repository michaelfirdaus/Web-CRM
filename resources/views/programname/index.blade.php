@extends('layouts.app')

@section('header') List Semua Program Course-Net @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('programname.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Program</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-hover table-bordered">
                <thead>
                    <th class="text-center">
                        Nama Program
                    </th>
                    <th class="text-center">
                        Status Program
                    </th>
                    <th class="text-center">
                        Edit
                    </th>
                </thead>
        
                <tbody>
                    @if($programnames->count() > 0)
                        @foreach ($programnames as $programname)
                            <tr>
                                <td>
                                    {{ $programname->name }}
                                </td>
                                <td class="text-center">
                                    @if($programname->status == 1)
                                        Aktif
                                    @else
                                        Tidak Aktif
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('programname.edit', ['id' => $programname ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">Tidak ada nama program yang tersedia, tambahkan nama program terlebih dahulu.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection