@extends('layouts.app')

@section('header') List Referensi Peserta {{$currentparticipant->name}} @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('reference.create', ['id' => $currentparticipant->id]) }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Referensi</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-hover table-responsive">
                <thead>
                    <th>
                        Nama Referensi
                    </th>
                    <th> 
                        Nomor Telepon Referensi
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($references->count() > 0)
                        @foreach ($references as $reference)
                            
                            <tr>
                                <td>
                                    {{ $reference->name }}
                                </td>
                                <td>
                                    {{ $reference->phone }}
                                </td>
                                <td>
                                    <a href="{{ route('reference.edit', ['id' => $reference->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('reference.delete', ['id' => $reference->id]) }}" class="btn btn-xs btn-danger">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                            
                        @endforeach
                    @else
                        <tr>
                            <th colspan="6" class="text-center">Belum ada referensi, tambahkan referensi baru.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection