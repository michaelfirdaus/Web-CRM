@extends('layouts.app')

@section('title')Jadwal Kelas @endsection

@section('header') List Semua Jadwal Kelas @endsection

@section('breadcrumb')
Jadwal Kelas
@endsection

@section('content')

    <div class="card">
        <div class="card-header text-danger text-bold">Informasi Penting</div>
        <div class="card-body">
            <ul>
                <li>Data yang ada di halaman ini diambil dari menu <a href="{{ route('programs') }}">Batch Program</a>.
                <li>Apabila kolom Nama Coach berisi <span class="text-bold text-danger">'Belum Ada Coach!'</span>, maka coach belum dipilih untuk kelas tersebut.</li>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-hover table-bordered">
                <thead>
                    <th class="text-center">
                        Nama Program
                    </th>
                    <th class="text-center">
                        Kategori Program
                    </th>
                    <th class="text-center"> 
                        Tanggal Batch
                    </th>
                    <th class="text-center"> 
                        Lokasi Kelas
                    </th>
                    <th class="text-center"> 
                        Status Coach
                    </th>
                    <th class="text-center">
                        Diinput Oleh
                    </th>
                    <th class="text-center">
                        Terakhir di Edit Oleh
                    </th>
                    <th class="text-center"> 
                        Lihat Detail Kelas
                    </th>
                    <th class="text-center">
                        Edit
                    </th>
                </thead>
        
                <tbody>
                    {{-- @if($programs->count() > 0)
                        @foreach ($programs as $p)
                                <tr>
                                    <td>
                                        {{ $p->programname->name }}
                                    </td>
                                    <td>
                                        {{ $p->programcategory->name }}
                                    </td>
                                    <td>
                                        @php
                                        $c = $p->coaches->count();
                                        $a = 0;
                                        @endphp
                                        @if($c == 1)
                                            @foreach($p->coaches as $coach)
                                                {{ $coach->name }}
                                            @endforeach
                                        @elseif($p->coaches->count() > 1)
                                            @foreach($p->coaches as $coach)
                                                @if(++$a == $c)
                                                    {{ $coach->name }}
                                                @else
                                                    {{ $coach->name }},
                                                @endif 
                                            @endforeach
                                        @else
                                            <div class="text-bold text-danger">'Belum Ada Coach!'</div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $p->date }}
                                    </td>
                                    <td class="text-center">
                                        {{ $p->branch->name }}
                                    </td>
                                    <td class="text-center">
                                        {{ $p->created_by }}
                                    </td>
                                    <td class="text-center">
                                        {{ $p->lastedited_by }}
                                    </td>
                                    <td class="text-center">
                                        @if($p->transaction)
                                            <a href="{{ route('coachprogram.detail', ['id'=> $p->id]) }}" class="btn btn-xs btn-success">
                                                <span class="far fa-eye"></span>
                                            </a>
                                        @else
                                            <b>Belum Ada Peserta</b>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('coachprogram.edit', ['id'=> $p->id]) }}" class="btn btn-xs btn-info">
                                            <span class="fas fa-pencil-alt"></span>
                                        </a>
                                    </td>
                                </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="6" class="text-center">Tidak ada jadwal kelas yang tersedia, tambahkan jadwal kelas baru.</th>
                        </tr>
                    @endif --}}
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('scripts')
$(document).ready(function() {
    let preloader = '{{ asset('assets/data-preloader.gif') }}';
    $('#table').DataTable({
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        lengthMenu: [[10, 25, 50, 75, 100, -1], [10, 25, 50, 75, 100, "Semua"]],
        scrollY: 200,
        scrollX: true,
        ordering: true,
        order: [[ 2, 'desc' ]],
        processing: true,
        serverSide: true,
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
        ajax: 
        {
            url: "{{ route('coachprograms') }}",
        },
        columns: 
        [
            {
                data: 'programname.name',
                name: 'programname.name'
            },
            {
                data: 'programcategory.name',
                name: 'programcategory.name'
            },
            {
                data: 'date',
                name: 'date'
            },
            {
                data: 'branch.name',
                name: 'branch.name'
            },
            {
                data: 'Status Coach',
                name: 'Status Coach'
            },
            {
                data: 'created_by',
                name: 'created_by'
            },
            {
                data: 'edited_by',
                name: 'edited_by'
            },
            {
                data: 'Detail',
                name: 'Detail'
            },
            {
                data: 'Edit',
                name: 'Edit'
            },
        ]
    });
});
@endsection