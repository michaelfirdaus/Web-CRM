@extends('layouts.app')

@section('header') List Semua Jadwal Kelas @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('jobconnectorparticipant.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Job Connector</a>
        </div>
    </div>

    <div class="card">
        <div class="card card-body">
            <table id="table" class="table table-hover table-bordered">
                <thead>
                    <th>
                        Nama Peserta
                    </th>
                    <th> 
                        Perusahaan Rekanan
                    </th>
                    <th> 
                        Tanggal Batch
                    </th>
                    <th> 
                        Status
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($jcps->count() > 0)
                        @foreach ($jcps as $jcp)
                                <tr>
                                    <td>
                                        {{ $jcp->participant->name }}
                                    </td>
                                    <td>
                                        {{ $jcp->jobconnector->company_name }}
                                    </td>
                                    <td>
                                        {{ $jcp->date }}
                                    </td>
                                    <td>
                                        {{ $jcp->application_status }}
                                    </td>
                                    <td>
                                        <a href="{{ route('jobconnectorparticipant.edit', $jcp->id) }}" class="btn btn-xs btn-info">
                                            <span class="fas fa-pencil-alt"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('jobconnectorparticipant.delete', ['id' => $jcp->id]) }}" class="btn btn-xs btn-danger">
                                            <span class="fas fa-trash-alt"></span>
                                        </a>
                                    </td>
                                </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="6" class="text-center">Tidak ada job connector yang terdaftar.</th>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
    
@endsection