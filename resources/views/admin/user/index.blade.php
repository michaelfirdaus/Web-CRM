@extends('layouts.app')

@section('title')User @endsection

@section('header') List Semua User @endsection

@section('breadcrumb')
User
@endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('user.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah User</a>
        </div>
    </div>
    <div class="card">
        <div class="card card-body">
            <table id="table" class="display table-bordered" style="width:100%">
                <thead>
                    <th class="text-center">
                        Nama User
                    </th>
                    <th class="text-center">
                        Username
                    </th>
                    <th class="text-center">
                        User Role
                    </th>
                    <th class="text-center">
                        Ganti Role
                    </th>
                    <th class="text-center">
                        Edit
                    </th>
                    <th class="text-center">
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($users->count() > 0)
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->username }}
                                </td>
                                <td>
                                    @if($user->admin == 1)
                                        Admin
                                    @else
                                        User
                                    @endif
                                </td>
                                <td class="text-center">
                                @if($user->id != Auth::user()->id)
                                    <a href="{{ route('user.changerole', ['id' => $user ->id]) }}" class="btn btn-xs btn-success">
                                        <span class="fas fa-users-cog"></span>
                                    </a>
                                @else
                                    <span class="fas fa-times-circle"></span>
                                @endif

                                </td>
                                <td class="text-center">
                                    <a href="{{ route('user.edit', ['id' => $user ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    @if($user->id != Auth::user()->id)
                                        <a href="" class="btn btn-xs btn-danger"  data-toggle="modal" data-target="#delete">
                                            <span class="fas fa-trash-alt"></span>
                                        </a>
                                    @else
                                        <span class="fas fa-times-circle"></span>
                                    @endif
                                </td>

                                <div class="modal fade" id="delete">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Konfirmasi</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>Yakin Untuk Menghapus User Ini?</p>
                                          <p class="text-bold">PERINGATAN! User yang Sudah Dihapus Tidak Dapat Dikembalikan</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-success" data-dismiss="modal">
                                              <span class="fas fa-times mr-1"></span>
                                            Batalkan
                                          </button>
                                          <a href="{{ route('user.delete', ['id' => $user ->id]) }}" class="btn btn btn-danger">
                                            <span class="fas fa-check mr-1"></span>
                                            Hapus
                                          </a>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="4" class="text-center">Tidak ada program yang tersedia, tambahkan program baru.</th>
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
    $('#table').DataTable( {
    dom: 'lBfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    lengthMenu: [[10, 25, 50, 75, 100, -1], [10, 25, 50, 75, 100, "Semua"]],
    scrollY: "200",
    ordering: true,
    order: [[ 2, 'asc' ]],
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