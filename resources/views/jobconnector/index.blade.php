@extends('layouts.app')

@section('header') List Semua Perusahaan Rekanan @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('jobconnector.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Perusahaan Rekanan</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-hover table-bordered">
                <thead>
                    <th class="text-center">
                        Nama Perusahaan
                    </th>
                    <th class="text-center">
                        Lokasi Perusahaan
                    </th>
                    <th class="text-center">
                        Status Perusahaan
                    </th>
                    <th class="text-center">
                        Edit
                    </th>
                </thead>
        
                <tbody>
                    @if($jobconnectors->count() > 0)
                        @foreach ($jobconnectors as $jobconnector)
                            <tr>
                                <td>
                                    {{ $jobconnector->company_name }}
                                </td>
                                <td>
                                    {{ $jobconnector->location }}
                                </td>
                                <td class="text-center">
                                    @if( $jobconnector->status == 1 )
                                        Aktif
                                    @else
                                        Tidak Aktif
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('jobconnector.edit', ['id' => $jobconnector ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="4" class="text-center">Tidak ada perusahaan yang tersedia, tambahkan perusahaan penerima loker terlebih dahulu.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection