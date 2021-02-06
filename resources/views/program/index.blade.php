@extends('layouts.app')

@section('title')Batch Program @endsection

@section('header') List Semua Batch Program @endsection

@section('breadcrumb')
    Batch Program
@endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('program.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Batch Program</a>
        </div>
    </div>
    <div class="card">
        <div class="card card-body">
            <table id="table" class="display table-bordered" style="width:100%">
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
                        Lokasi Cabang
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
                </thead>
        
                <tbody>
                    {{-- @if($programs->count() > 0)
                        @foreach ($programs as $program)
                            <tr>
                                <td>
                                    {{ $program->programname->name }}
                                </td>
                                <td>
                                    {{ $program->programcategory->name }}
                                </td>
                                <td>
                                    {{ $program->date }}
                                </td>
                                <td>
                                    {{ $program->branch->name }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('program.edit', ['id' => $program ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="4" class="text-center">Tidak ada program yang tersedia, tambahkan program baru.</th>
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
                url: "{{ route('programs') }}",
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
                }
            ]
        });
    });
@endsection