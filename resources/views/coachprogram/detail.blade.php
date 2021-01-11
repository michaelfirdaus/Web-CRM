@extends('layouts.app')

@section('header') List Semua Jadwal Kelas @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('coachprogram.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Jadwal Kelas</a>
        </div>
    </div>

            Nama Coach : {{ $coachprogram->coach->name }}
            Tanggal Batch : {{ $coachprogram->date }}
            Lokasi Kelas : {{ $coachprogram->program->branch->name }}
            Jumlah Peserta : {{ $countparticipant }}
                <div class="card">
                    <div class="card-body">
                        <table id="table" class="table table-hover table-bordered">
                            <thead>
                                <th class="text-center">
                                    Nomor Member
                                </th>
                                <th class="text-center">
                                    Nama Peserta
                                </th>
                                <th class="text-center">
                                    Nilai Ujian
                                </th>
                                <th class="text-center"> 
                                    Nomor Sertifikat Skill
                                </th>
                                <th class="text-center"> 
                                    Tanggal Pengambilan Sertifikat Skill
                                </th>
                                <th class="text-center"> 
                                    Nomor Sertifikat Kehadiran
                                </th>
                                <th class="text-center"> 
                                    Tanggal Pengambilan Sertifikat Kehadiran
                                </th>
                                <th class="text-center">
                                    Edit
                                </th>
                            </thead>
                    
                            <tbody>
                                @foreach($transactions as $t)
                                    <tr>
                                        <td>
                                            {{ $t->participant_id }}
                                        </td>
                                        <td>
                                            {{ $t->participant->name }}
                                        </td>
                                        @if($t->result != null)
                                            {{-- <td class="text-center">
                                                {{ $t->result->score }}
                                            </td>
                                            <td>
                                                {{ $t->result->skillcertificate_number }}
                                            </td>
                                            <td>
                                                {{ $t->result->skillcertificate_pickdate }}
                                            </td>
                                            <td>
                                                {{ $t->result->attendancecertificate_number }}
                                            </td>
                                            <td>
                                                {{ $t->result->attendancecertificate_pickdate }}
                                            </td> --}}
                                        @else
                                            <td colspan="5" class="text-center">
                                                Belum Ada Data Nilai yang Diinput
                                            </td>
                                        @endif
                                        <td class="text-center">
                                            <a href="{{ route('resultbyid', ['id'=> $t->id]) }}" class="btn btn-xs btn-info">
                                                <span class="fas fa-pencil-alt"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
 

@endsection