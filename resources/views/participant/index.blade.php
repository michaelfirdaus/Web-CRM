@extends('layouts.app')

@section('title')Dashboard Peserta @endsection

@section('header') List Semua Peserta Course-Net @endsection

@section('breadcrumb')
    Dashboard Peserta
@endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2 mt-0 pt-0">
            <a href="{{ route('participant.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Peserta</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="table" class="display table-bordered" style="width:100%">
                <thead>
                    <th class="text-center">
                        Nomor Member
                    </th>
                    <th class="text-center">
                        Nama Peserta
                    </th>
                    <th class="text-center"> 
                        Tempat Lahir
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
                        ID Card Mahasiswa
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
                        Member Berlaku S/d
                    </th>
                    <th class="text-center"> 
                        Lokasi Pendaftaran
                    </th>
                    <th class="text-center"> 
                        Mengetahui CN dari
                    </th>
                    <th class="text-center"> 
                        Profesi
                    </th>
                    <th class="text-center">
                        Detail Nama Perusahaan/Universitas
                    </th>
                    <th class="text-center">
                        Diinput Oleh
                    </th>
                    <th class="text-center">
                        Terakhir di Edit Oleh
                    </th>
                    <th class="text-center">
                        Minat Program
                    </th>
                    <th class="text-center">
                        Referensi
                    </th>
                    <th class="text-center">
                        Edit
                    </th>
                    {{-- <th class="text-center">
                        Hapus
                    </th> --}}
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
                url: "{{ route('participants') }}",
            },
            columns: 
            [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'pob',
                    name: 'pob'
                },
                {
                    data: 'dob',
                    name: 'dob'
                },
                {
                    data: 'phonenumber',
                    name: 'phonenumber'                   
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'student_idcard',
                    name: 'student_idcard'
                },
                {
                    data: 'cv_link',
                    name: 'cv_link'
                },
                {
                    data: 'sp_link',
                    name: 'sp_link'
                },
                {
                    data: 'emergencycontact_name',
                    name: 'emergencycontact_name'
                },
                {
                    data: 'emergencycontact_phone',
                    name: 'emergencycontact_phone'
                },
                {
                    data: 'member_validthru',
                    name: 'member_validthru'
                },
                {
                    data: 'branch',
                    name: 'branch'
                },
                {
                    data: 'knowcn',
                    name: 'knowcn'
                },
                {
                    data: 'profession',
                    name: 'profession'
                },
                {
                    data: 'professiondetail',
                    name: 'professiondetail'
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
                    data: 'Minat Program',
                    name: 'Minat Program'
                },
                {
                    data: 'Referensi',
                    name: 'Referensi'
                },
                {
                    data: 'Edit',
                    name: 'Edit'
                }
            ]
        });
    });
@endsection