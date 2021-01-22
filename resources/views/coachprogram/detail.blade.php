@extends('layouts.app')

@section('header') List Semua Jadwal Kelas @endsection

@section('content')

    <div class="card mb-5">
        <div class="card-header text-success text-bold">Informasi Kelas</div>
            <div class="card-body">
                <ul>
                    <li>
                        Coach: 
                        @php
                            $c = $program->coaches->count();
                            $a = 0;
                        @endphp
                        @if($c == 1)
                            @foreach($program->coaches as $pc)
                                {{ $pc->name }}
                            @endforeach
                        @elseif($program->coachprograms->count() > 1)
                            @foreach($program->coaches as $pc)
                                @if(++$a == $c)
                                    {{ $pc->name }}
                                @else
                                    {{ $pc->name }},
                                @endif 
                            @endforeach
                        @else
                            <span class="text-bold text-danger">Coach Belum Dipilih</span>
                        @endif
                    </li>
                    <li>Tanggal Batch: {{ $program->date }}</li>
                    <li>Jumlah Peserta: {{ $countparticipant }}</li>
                    <li>Lokasi Kelas: {{ $program->branch->name }}</li>
                </ul>
            </div>
        </div>
    </div>

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
                        Edit Data Peserta
                    </th>
                    <th class="text-center">
                        Edit Nilai
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
                            @if($t->result_flag == 1)
                                <td class="text-center">
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
                                </td>
                            @else
                                <td colspan="5" class="text-center">
                                    Belum Ada Data Nilai yang Diinput
                                </td>
                            @endif
                            <td class="text-center">
                                <a href="{{ route('participant.edit', ['id'=> $t->participant_id]) }}" class="btn btn-xs btn-info">
                                    <span class="fas fa-users-cog"></span>
                                </a>
                            </td>
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