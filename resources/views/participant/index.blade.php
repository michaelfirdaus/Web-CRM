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
                    <th>
                        Nama Peserta
                    </th>
                    <th> 
                        Tempat Lahir
                    </th>
                    <th> 
                        Tanggal Lahir
                    </th>
                    <th> 
                        Nomor Telepon
                    </th>
                    <th> 
                        Alamat
                    </th>
                    <th> 
                        E-mail
                    </th>
                    <th> 
                        ID Card Mahasiswa
                    </th>
                    <th> 
                        Link CV
                    </th>
                    <th> 
                        Link SP
                    </th>
                    <th> 
                        Nama Kontak Darurat
                    </th>
                    <th> 
                        Nomor Kontak Darurat
                    </th>
                    <th> 
                        Member Berlaku S/d
                    </th>
                    <th> 
                        Lokasi Pendaftaran
                    </th>
                    <th> 
                        Minat Program
                    </th>
                    <th> 
                        Mengetahui CN dari
                    </th>
                    <th> 
                        Profesi
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
                                <td>
                                    {{ $participant->name }}
                                </td>
                                <td>
                                    {{ $participant->pob }}
                                </td>
                                <td>
                                    {{ $participant->dob }}
                                </td>
                                <td>
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
                                    {{ $participant->cv_link }}
                                </td>
                                <td>
                                    {{ $participant->sp_link }}
                                </td>
                                <td>
                                    {{ $participant->emergencycontact_name }}
                                </td>
                                <td>
                                    {{ $participant->emergencycontact_phone }}
                                </td>
                                <td>
                                    {{ $participant->member_validthru }}
                                </td>
                                <td>
                                    {{ $participant->branch->name }}
                                </td>
                                <td>
                                    {{ $participant->program_id != NULL ? $participant->program->name : 'Belum Ada Minat' }}
                                </td>
                                <td>
                                    {{ $participant->knowcn->name }}
                                </td>
                                <td>
                                    {{ $participant->profession->name }}
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
                                    <a href="{{ route('participant.delete', ['id' => $participant ->id]) }}" class="btn btn-xs btn-danger">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
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