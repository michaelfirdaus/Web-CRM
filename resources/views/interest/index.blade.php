@extends('layouts.app')

@section('header') List Minat Program Peserta {{$currentparticipant->name}} @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('interest.create', ['id' => $currentparticipant->id]) }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Minat Program</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-hover">
                <thead>
                    <th class="text-center">
                        Minat Program
                    </th>
                    <th class="text-center"> 
                        Lokasi Kelas
                    </th>
                    <th class="text-center">
                        Edit
                    </th>
                    <th class="text-center">
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($interests->count() > 0)
                        @foreach ($interests as $interest)
                            
                            <tr>
                                <td>
                                    {{ $interest->program->name }}
                                </td>
                                <td>
                                    {{ $interest->program->branch->name }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('interest.edit', ['id' => $interest->id]) }}" class="btn btn-xs btn-info">
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
                                          <a href="{{ route('interest.delete', ['id' => $interest->id]) }}" class="btn btn btn-danger">
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
                            <th colspan="4" class="text-center">Belum ada minat program yang terdaftar.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection