@extends('layouts.app')

@section('header') List Semua Transaksi Course-Net @endsection

@section('content')

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
                        Nama Peserta
                    </th>
                    <th class="text-center">
                        Nama Sales
                    </th>
                    <th class="text-center">
                        Nama Program
                    </th>
                    <th class="text-center">
                        Harga
                    </th>
                    <th class="text-center">
                        DP Pertama
                    </th>
                    <th class="text-center">
                        DP Kedua
                    </th>
                    <th class="text-center">
                        Cashback
                    </th>
                    <th class="text-center">
                        Rating
                    </th>
                    <th class="text-center">
                        Ulasan
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
                            @foreach($coachprograms as $cp)    
                                <tr>
                                    <td>
                                        {{ $transaction->created_at }}
                                    </td>
                                    <td>
                                        {{ $transaction->participant->name }}
                                    </td>
                                    <td>
                                        {{ $transaction->salesperson->name }}
                                    </td>
                                    <td>
                                        {{ $cp->program->name }}
                                    </td>
                                    <td>
                                        {{ $transaction->price }}
                                    </td>
                                    <td>
                                        {{ $transaction->firsttrans }}
                                    </td>
                                    <td>
                                        {{ $transaction->secondtrans }}
                                    </td>
                                    <td>
                                        {{ $transaction->cashback }}
                                    </td>
                                    <td>
                                        {{ $transaction->rating }}
                                    </td>
                                    <td>
                                        {{ $transaction->rating_text }}
                                    </td>
                                    <td>
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
                                        @if($transaction->result == 0)
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
                                        <a href="{{ route('transaction.delete', ['id' => $transaction->id]) }}" class="btn btn-xs btn-danger">
                                            <span class="fas fa-trash-alt"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    @else
                        <tr>
                            <th colspan="13" class="text-center">Belum ada transaksi.</th>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
    
@endsection