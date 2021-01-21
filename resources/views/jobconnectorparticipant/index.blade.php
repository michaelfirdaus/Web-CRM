@extends('layouts.app')

@section('header') List Semua Job Connector @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('jobconnectorparticipant.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Job Connector</a>
        </div>
    </div>

    <div class="card">
        <div class="card card-body">
            <table id="table" class="table table-hover table-bordered table-responsive">
                <thead>
                    <th class="text-center">
                        Nomor Member
                    </th>
                    <th class="text-center">
                        Nama Peserta
                    </th>
                    <th class="text-center">
                        Link CV
                    </th>
                    <th class="text-center"> 
                        Perusahaan Rekanan
                    </th>
                    <th class="text-center"> 
                        Tanggal Apply
                    </th>
                    <th class="text-center"> 
                        Status
                    </th>
                    <th class="text-center">
                        Edit
                    </th>
                    <th class="text-center">
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($jobconnectorparticipants->count() > 0)
                        @foreach ($jobconnectorparticipants as $jobconnectorparticipant)
                            <tr>
                                <td>
                                    {{ $jobconnectorparticipant->participant->id }}
                                </td>
                                <td>
                                    {{ $jobconnectorparticipant->participant->name }}
                                </td>
                                <td>
                                    <a href="{{ $jobconnectorparticipant->participant->cv_link }}" target="_blank">{{ $jobconnectorparticipant->participant->cv_link }}</a>
                                </td>
                                <td>
                                    {{ $jobconnectorparticipant->jobconnector->name }}
                                </td>
                                <td>
                                    {{ $jobconnectorparticipant->date }}
                                </td>
                                <td>
                                    @if( $jobconnectorparticipant->application_status == 1 )
                                        Sedang Dalam Proses
                                    @elseif( $jobconnectorparticipant->application_status == 2 )
                                        Ditolak
                                    @elseif( $jobconnectorparticipant->application_status == 3 )
                                        Diterima
                                    @elseif( $jobconnectorparticipant->application_status == 4 )
                                        Dibatalkan
                                    @else
                                        Lainnya
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('jobconnectorparticipant.edit', ['id' => $jobconnectorparticipant->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="" class="btn btn-xs btn-danger"  data-toggle="modal" data-target="#modal-default">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>

                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Konfirmasi</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin Untuk Menghapus Item Ini?</p>
                                            <p class="text-bold">PERINGATAN! Data yang Sudah Dihapus Tidak Dapat Dikembalikan</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">
                                                <span class="fas fa-times mr-1"></span>
                                            Batalkan
                                            </button>
                                            <a href="{{ route('jobconnectorparticipant.delete', ['id' => $jobconnectorparticipant->id]) }}" class="btn btn btn-danger">
                                            <span class="fas fa-check mr-1"></span>
                                            Hapus
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="8" class="text-center">Tidak ada job connector yang terdaftar.</th>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
    
@endsection