@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card card-header">
            <th><strong>List Semua Peserta</strong></th>
        </div>
        <div class="card card-body">

            <table class="table table-hover">
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
                    <th>
                        Edit
                    </th>
                    <th>
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
                                    {{ $participant->branch_id }}
                                </td>
                                <td>
                                    {{ $participant->program_id }}
                                </td>
                                <td>
                                    {{ $participant->knowcn_id }}
                                </td>
                                <td>
                                    {{ $participant->profession_id }}
                                </td>
                                <td>
                                    <a href="{{ route('participant.edit', ['id' => $participant ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('participant.delete', ['id' => $participant ->id]) }}" class="btn btn-xs btn-danger">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">Belum ada peserta yang terdaftar.</th>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection