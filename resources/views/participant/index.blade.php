@extends('layouts.app')

@section('header') List Semua Peserta Course-Net @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('participant.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Peserta</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-hover table-bordered table-responsive">
                <thead>
                    <th class="text-center">
                        Nomor Member
                    </th>
                    <th class="text-center">
                        Nama Peserta
                    </th>
                    <th class="text-center"> 
                        Tempat Lahir
                    </th>
                    <th class="text-center"> 
                        Tanggal Lahir
                    </th>
                    <th class="text-center"> 
                        Nomor Telepon
                    </th>
                    <th class="text-center"> 
                        Alamat
                    </th>
                    <th class="text-center"> 
                        E-mail
                    </th>
                    <th class="text-center"> 
                        ID Card Mahasiswa
                    </th>
                    <th class="text-center"> 
                        Link CV
                    </th>
                    <th class="text-center"> 
                        Link SP
                    </th>
                    <th class="text-center"> 
                        Nama Kontak Darurat
                    </th>
                    <th class="text-center"> 
                        Nomor Kontak Darurat
                    </th>
                    <th class="text-center"> 
                        Member Berlaku S/d
                    </th>
                    <th class="text-center"> 
                        Lokasi Pendaftaran
                    </th>
                    <th class="text-center"> 
                        Mengetahui CN dari
                    </th>
                    <th class="text-center"> 
                        Profesi
                    </th>
                    <th class="text-center">
                        Minat Program
                    </th>
                    <th class="text-center">
                        Referensi
                    </th>
                    <th class="text-center">
                        Edit
                    </th>
                    <th class="text-center">
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($participants->count() > 0)
                        @foreach ($participants as $participant)
                            <tr>
                                <td class="text-center">
                                    {{ $participant->id }}
                                </td>
                                <td>
                                    {{ $participant->name }}
                                </td>
                                <td>
                                    {{ $participant->pob }}
                                </td>
                                <td>
                                    {{ $participant->dob }}
                                </td>
                                <td class="text-center">
                                    {{ $participant->phonenumber }}
                                </td>
                                <td>
                                    {{ $participant->address }}
                                </td>
                                <td>
                                    {{ $participant->email }}
                                </td>
                                <td>
                                    {{ $participant->student_idcard }}
                                </td>
                                <td>
                                    <a href="{{ $participant->cv_link }}" target="_blank">{{ $participant->cv_link }}</a>
                                </td>
                                <td>
                                    <a href="{{ $participant->sp_link }}" target="_blank">{{ $participant->sp_link }}</a>
                                </td>
                                <td>
                                    {{ $participant->emergencycontact_name }}
                                </td>
                                <td>
                                    {{ $participant->emergencycontact_phone }}
                                </td>
                                <td class="text-center">
                                    {{ $participant->member_validthru }}
                                </td>
                                <td class="text-center">
                                    {{ $participant->branch->name }}
                                </td>
                                <td class="text-center">
                                    @if($participant->knowcn_id == 1)
                                        {{ $participant->memberreference_id }} - {{ $participant->memberreference_name }}
                                    @else
                                        {{ $participant->knowcn->name }}
                                    @endif
                                </td>
                                <td class="text-center">
                                    {{ $participant->profession->name }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('interests', ['id' => $participant ->id]) }}" class="btn btn-xs btn-success">
                                        <span class="fas fa-tasks"></span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('references', ['id' => $participant ->id]) }}" class="btn btn-xs btn-success">
                                        <span class="fas fa-address-book"></span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('participant.edit', ['id' => $participant ->id]) }}" class="btn btn-xs btn-info">
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
                                          <a href="{{ route('participant.delete', ['id' => $participant ->id]) }}" class="btn btn btn-danger">
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
                            <th colspan="19" class="text-center">Belum ada peserta yang terdaftar.</th>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
    
@endsection