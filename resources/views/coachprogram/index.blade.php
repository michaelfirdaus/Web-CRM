@extends('layouts.app')

@section('header') Tambah Jadwal Kelas Baru @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('coachprogram.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Jadwal Kelas</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-hover table-bordered table-responsive">
                <thead>
                    <th>
                        Nama Program
                    </th>
                    <th> 
                        Nama Coach
                    </th>
                    <th> 
                        Tanggal Batch
                    </th>
                    <th> 
                        Lokasi Kelas
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($coachprograms->count() > 0)
                        @foreach ($programs as $program)
                            @foreach($program->coaches as $coach)
                                <tr>
                                    <td>
                                        {{ $program->name }}
                                    </td>
                                    <td>
                                        {{ $coach->name }}
                                    </td>
                                    <td>
                                        {{ $coach->pivot->date }}
                                    </td>
                                    <td>
                                        {{ $program->branch->name }}
                                    </td>
                                    <td>
                                        <a href="{{ route('coachprogram.edit', $coach->pivot->id) }}" class="btn btn-xs btn-info">
                                            <span class="fas fa-pencil-alt"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('coachprogram.delete', ['id' => $coach->pivot ->id]) }}" class="btn btn-xs btn-danger">
                                            <span class="fas fa-trash-alt"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    @else
                        <tr>
                            <th colspan="6" class="text-center">Tidak ada jadwal kelas yang tersedia, tambahkan jadwal kelas baru.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection