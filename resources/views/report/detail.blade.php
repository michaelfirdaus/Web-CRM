@extends('layouts.app')

@section('title') Laporan Kelas @endsection

@section('header') Laporan Kelas @endsection

@section('breadcrumb')
<a href="/reports" class="mr-1">Laporan Kelas</a>/ 
Laporan Kelas {{$program->programname->name}} ({{$program->date}})
@endsection

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
                    <li>Program: {{$program->programname->name}}</li>
                    <li>Kategori Program: {{$program->programcategory->name}}</li>
                    <li>Tanggal Batch: {{ $program->date }}</li>
                    <li>Jumlah Peserta: {{ $countparticipant }}</li>
                    <li>Lokasi Kelas: {{ $program->branch->name }}</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="table" class="display table-bordered" style="width: 100%;">
                <thead>
                    <th class="text-center">
                        Nomor Member
                    </th>
                    <th class="text-center">
                        Nama Peserta
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
                        Profesi
                    </th>
                    <th class="text-center">
                        Detail Profesi
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
                        Harga
                    </th>
                    <th class="text-center">
                        Note
                    </th>
                    <th class="text-center">
                        Sales
                    </th>
                    <th class="text-center">
                        Ukuran Jaket
                    </th>
                    <th class="text-center">
                        Nilai Ujian
                    </th>
                    <th class="text-center">
                        Grade
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
                        Rating
                    </th>
                    <th class="text-center">
                        Ulasan
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
                            <td>
                                {{$t->participant->dob}}
                            </td>
                            <td>
                                {{$t->participant->phonenumber}}
                            </td>
                            <td>
                                {{$t->participant->address}}
                            </td>
                            <td>
                                {{$t->participant->email}}
                            </td>
                            <td>
                                {{$t->participant->profession->name}}
                            </td>
                            <td>
                                {{$t->participant->profession_detail}}
                            </td>
                            <td>
                                <a href="{{$t->participant->cv_link}}" target='_blank'>{{$t->participant->cv_link}}</a>
                            </td>
                            <td>
                                <a href="{{$t->participant->sp_link}}" target='_blank'>{{$t->participant->sp_link}}</a>
                            </td>
                            <td>
                                {{$t->participant->emergencycontact_name}}
                            </td>
                            <td>
                                {{$t->participant->emergencycontact_phone}}
                            </td>
                            <td>
                                @currency($t->price)
                            </td>
                            <td>
                                {{$t->note}}
                            </td>
                            <td>
                                {{$t->salesperson->name}}
                            </td>
                            @if($t->result_flag == 1)
                                <td class="text-center">
                                    {{ $t->result->jacket_size }}
                                </td>
                                <td class="text-center">
                                    {{ $t->result->score }}
                                </td>
                                <td class="text-center">
                                    {{ $t->result->grade }}
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
                            @endif
                            <td>
                                {{$t->rating}}
                            </td>
                            <td>
                                {{$t->rating_text}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('scripts')
$(document).ready(function() {
    let preloader = '{{ asset('assets/data-preloader.gif') }}';
    $('#table').DataTable( {
    dom: 'lBfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    lengthMenu: [[10, 25, 50, 75, 100, -1], [10, 25, 50, 75, 100, "Semua"]],
    scrollY: "200",
    ordering: true,
    order: [[ 3, 'desc' ]],
    scrollX: true,
        language:{
            info: "<span class='font-weight-bold'>Menampilkan _START_ - _END_ dari _TOTAL_ data</span>",
            infoEmpty: "<span class='font-weight-bold'>Tidak ada data</span>",
            infoFiltered: "<span class='font-weight-bold'>(Filter dari _MAX_ data)</span>",
            paginate: 
            {
                previous: "<i class='fas fa-chevron-left'></i>",
                next: "<i class='fas fa-chevron-right'></i>"
            },
            processing: `<span class="bg-dark p-3"><img src="${preloader}" width="50" height="50"/>Memuat data...</span>`,
            search: "<span class='font-weight-bold'>Cari: </span>",
            searchPlaceholder: "",
            zeroRecords: "<span class='font-weight-bold'>Data tidak ditemukan</span>",

        },
        oLanguage: {
            sLengthMenu: "<span class='font-weight-bold mr-3'>Tampilkan _MENU_ data</span>",
        },         
    });
});
@endsection