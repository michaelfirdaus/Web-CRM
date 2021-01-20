@extends('layouts.app')

@section('header') List Semua Transaksi Course-Net @endsection

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
            <a href="{{ route('transaction.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Buat Transaksi</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-hover table-bordered table-responsive">
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
                    @if($transactions->count() > 0)
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>
                                    {{ $transaction->created_at }}
                                </td>
                                <td class="text-center">
                                    {{ $transaction->participant->id }}
                                </td>
                                <td>
                                    {{ $transaction->participant->name }}
                                </td>
                                <td>
                                    {{ $transaction->salesperson->name }}
                                </td>
                                <td>
                                    {{ $transaction->program->programname->name }}
                                </td>
                                <td class="text-center">
                                    {{ $transaction->program->date }}
                                </td>
                                <td class="text-center">
                                    {{ $transaction->program->branch->name }}
                                </td>
                                <td>
                                    @currency( $transaction->price )
                                </td>
                                <td>
                                    {{ $transaction->rating }}
                                </td>
                                <td>
                                    {{ $transaction->rating_text }}
                                </td>
                                <td class="text-center">
                                    {{ $transaction->recoaching_count }}
                                </td>
                                <td class="text-center">
                                    @if($transaction->recoaching == 0)
                                        Tidak
                                    @else
                                        Ya
                                    @endif
                                </td>
                                <td>
                                    {{ $transaction->note }}
                                </td>
                                <td class="text-center">
                                    @if($transaction->result_flag == 0)
                                    <a href="{{ route('resultbyid.create', ['id' => $transaction->id]) }}" class="btn btn-xs btn-success">
                                        <span class="fas fa-plus"></span>
                                    </a>
                                    @else
                                    <a href="{{ route('resultbyid', ['id' => $transaction->id]) }}" class="btn btn-xs btn-success">
                                        <span class="fas fa-address-book"></span>
                                    </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('transaction.edit', ['id' => $transaction->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="" class="btn btn-xs btn-danger"  data-toggle="modal" data-target="#modal-default">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>

                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Konfirmasi</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Yakin Untuk Menghapus Item Ini?</p>
                                            <p class="text-bold">PERINGATAN! Data yang Sudah Dihapus Tidak Dapat Dikembalikan</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">
                                                <span class="fas fa-times mr-1"></span>
                                            Batalkan
                                            </button>
                                            <a href="{{ route('transaction.delete', ['id' => $transaction->id]) }}" class="btn btn btn-danger">
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
                            <th colspan="15" class="text-center">Belum ada transaksi.</th>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
    
@endsection