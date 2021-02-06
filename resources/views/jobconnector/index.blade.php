@extends('layouts.app')

@section('title')Perusahaan Rekanan @endsection

@section('header') List Semua Perusahaan Rekanan @endsection

@section('breadcrumb')
Perusahaan Rekanan
@endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('jobconnector.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Perusahaan Rekanan</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="table" class="display table-bordered" style="width:100%">
                <thead>
                    <th class="text-center">
                        Nama Perusahaan
                    </th>
                    <th class="text-center">
                        Lokasi Perusahaan
                    </th>
                    <th class="text-center">
                        Status Perusahaan
                    </th>
                    <th class="text-center">
                        Edit
                    </th>
                </thead>
        
                <tbody>
                    @if($jobconnectors->count() > 0)
                        @foreach ($jobconnectors as $jobconnector)
                            <tr>
                                <td>
                                    {{ $jobconnector->name }}
                                </td>
                                <td>
                                    {{ $jobconnector->location }}
                                </td>
                                <td class="text-center">
                                    @if( $jobconnector->status == 1 )
                                        Aktif
                                    @else
                                        Tidak Aktif
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('jobconnector.edit', ['id' => $jobconnector ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="4" class="text-center">Tidak ada perusahaan yang tersedia, tambahkan perusahaan penerima loker terlebih dahulu.</th>
                        </tr>
                    @endif
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
        order: [[ 0, 'asc' ]],
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
            url: "{{ route('jobconnectors') }}",
        },
        columns: 
        [
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'location',
                name: 'location'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'Edit',
                name: 'Edit'
            },
        ]
    });
});
@endsection