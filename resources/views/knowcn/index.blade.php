@extends('layouts.app')

@section('header') List Semua Kanal Course-Net @endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-hover table-responsive">
                <thead>
                    <th>
                        Nama Kanal
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($knowcns->count() > 0)
                        @foreach ($knowcns as $knowcn)
                            <tr>
                                <td>
                                    {{ $knowcn->name }}
                                </td>
                                <td>
                                    <a href="{{ route('knowcn.edit', ['id' => $knowcn ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('knowcn.delete', ['id' => $knowcn ->id]) }}" class="btn btn-xs btn-danger">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">Tidak ada kanal yang tersedia, tambahkan kanal terlebih dahulu.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection