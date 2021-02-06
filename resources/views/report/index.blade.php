@extends('layouts.app')

@section('title')Laporan Kelas @endsection

@section('header') List Semua Laporan Kelas @endsection

@section('breadcrumb')
Laporan Kelas
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <table id="table" class="display table-bordered" style="width: 100%;">
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
                        Lihat Laporan
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
                                    <td class="text-center">
                                        {{ $p->date }}
                                    </td>
                                    <td class="text-center">
                                        {{ $p->branch->name }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('report.detail', ['id'=> $p->id]) }}" class="btn btn-xs btn-success">
                                            <span class="far fa-eye"></span>
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
            url: "{{ route('reports') }}",
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
                data: 'report',
                name: 'report'
            }
        ]
    });
});
@endsection