@extends('layouts.app')

@section('title')Job Connector @endsection

@section('header') List Semua Job Connector @endsection

@section('breadcrumb')
Job Connector
@endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('jobconnectorparticipant.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Job Connector</a>
        </div>
    </div>

    <div class="card">
        <div class="card card-body">
            <table id="table" class="display table-bordered" style="width:100%">
                <thead>
                    <th class="text-center">
                        Nomor Member
                    </th>
                    <th class="text-center">
                        Nama Peserta
                    </th>
                    <th class="text-center">
                        Link CV
                    </th>
                    <th class="text-center"> 
                        Perusahaan Rekanan
                    </th>
                    <th class="text-center"> 
                        Tanggal Apply
                    </th>
                    <th class="text-center"> 
                        Status
                    </th>
                    <th class="text-center">
                        Diinput Oleh
                    </th>
                    <th class="text-center">
                        Terakhir di Edit Oleh
                    </th>
                    <th class="text-center">
                        Edit
                    </th>
                    <th class="text-center">
                        Hapus
                    </th>
                </thead>
        
                <tbody>
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
        order: [[ 4, 'desc' ]],
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
            sLengthMenu: "<span class='font-weight-bold mr-3'>Tampilkan _MENU_data</span>",
        },          
        ajax: 
        {
            url: "{{ route('jobconnectorparticipants') }}",
        },
        columns: 
        [
            {
                data: 'participant_id',
                name: 'participant_id'
            },
            {
                data: 'participant.name',
                name: 'participant.name'
            },
            {
                data: 'participant.cv_link',
                name: 'participant.cv_link'
            },
            {
                data: 'jobconnector.name',
                name: 'jobconnector.name'
            },
            {
                data: 'date',
                name: 'date'
            },
            {
                data: 'application_status',
                name: 'application_status'
            },
            {
                data: 'created_by',
                name: 'created_by'
            },
            {
                data: 'lastedited_by',
                name: 'lastedited_by'
            },
            {
                data: 'Edit',
                name: 'Edit'
            },
            {
                data: 'Hapus',
                name: 'Hapus'
            }
        ]
    });
});
@endsection