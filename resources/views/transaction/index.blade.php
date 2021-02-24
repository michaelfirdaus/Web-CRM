@extends('layouts.app')

@section('title')Transaksi @endsection

@section('header') List Semua Transaksi CRM @endsection

@section('breadcrumb')
Transaksi
@endsection

@section('content')

    <div class="card">
        <div class="card-header text-danger text-bold">Informasi Penting</div>
        <div class="card-body">
            <ul>
                <li>Apabila ikon pada kolom Nilai <span class="fas fa-plus"></span>, maka nilai peserta belum diinput.</li>
                <li>Apabila ikon pada kolom Nilai <span class="fas fa-address-book"></span>, maka nilai peserta sudah diinput.</li>
                <li class="text-bold">Transaksi dapat dibuat apabila jadwal kelas yang tersedia paling lambat 7 hari sebelum dari tanggal hari ini.</li> 
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('transaction.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Transaksi</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="table" class="table-bordered" style="width:100%">
                <thead>
                    <th class="text-center">
                        Tgl Transaksi
                    </th>
                    <th class="text-center">
                        Nomor Member
                    </th>
                    <th class="text-center">
                        Nama Peserta
                    </th>
                    <th class="text-center">
                        Nama Sales
                    </th>
                    <th class="text-center">
                        Nama Program
                    </th>
                    <th class="text-center">
                        Tanggal Batch
                    </th>
                    <th class="text-center">
                        Lokasi Kelas
                    </th>
                    <th class="text-center">
                        Harga
                    </th>
                    <th class="text-center">
                        Rating
                    </th>
                    <th class="text-center">
                        Ulasan
                    </th>
                    <th class="text-center">
                        Jumlah Recoaching
                    </th>
                    <th class="text-center">
                        Recoaching?
                    </th>
                    <th class="text-center">
                        Catatan
                    </th>
                    <th class="text-center">
                        Diinput Oleh
                    </th>
                    <th class="text-center">
                        Terakhir di Edit Oleh
                    </th>
                    <th class="text-center">
                        Nilai
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
                url: "{{ route('transactions') }}",
            },
            columns: 
            [
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'participant.id',
                    name: 'participant.id'
                },
                {
                    data: 'participant.name',
                    name: 'participant.name'
                },
                {
                    data: 'salesperson.name',
                    name: 'salesperson.name'
                },
                {
                    data: 'program.programname.name',
                    name: 'program.programname.name'
                },
                {
                    data: 'program.date',
                    name: 'program.date'
                },
                {
                    data: 'program.branch.name',
                    name: 'program.branch.name'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'rating',
                    name: 'rating'
                },
                {
                    data: 'rating_text',
                    name: 'rating_text'
                },
                {
                    data: 'recoaching_count',
                    name: 'recoaching_count'
                },
                {
                    data: 'recoaching',
                    name: 'recoaching'
                },
                {
                    data: 'note',
                    name: 'note'
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
                    data: 'Nilai',
                    name: 'Nilai'
                },
                {
                    data: 'Edit',
                    name: 'Edit'
                },
                {
                    data: 'Hapus',
                    name: 'Hapus'
                },
            ]
        });
    });
@endsection