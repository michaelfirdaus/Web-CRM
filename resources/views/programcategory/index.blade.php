@extends('layouts.app')

@section('title')Kategori Program @endsection

@section('header') List Semua Kategori Program @endsection

@section('breadcrumb')
Kategori Program
@endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('programcategory.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Kategori Program</a>
        </div>
    </div>
    <div class="card">
        <div class="card card-body">
            <table id="table" class="display table-bordered" style="width:100%">
                <thead>
                    <th class="text-center">
                        Nama Kategori Program
                    </th>
                    <th class="text-center">
                        Status Kategori Program
                    </th>
                    <th class="text-center">
                        Edit
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
            order: [[ 0, 'desc' ]],
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
                url: "{{ route('programcategories') }}",
            },
            columns: 
            [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'Edit',
                    name: 'Edit'
                }
            ]
        });
    });
@endsection