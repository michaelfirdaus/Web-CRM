@extends('layouts.app')

@section('header') List Semua Jadwal Kelas @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('coachprogram.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Jadwal Kelas</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-hover table-bordered">
                <thead>
                    <th class="text-center">
                        Nama Program
                    </th>
                    <th class="text-center"> 
                        Nama Coach
                    </th>
                    <th class="text-center"> 
                        Tanggal Batch
                    </th>
                    <th class="text-center"> 
                        Lokasi Kelas
                    </th>
                    <th class="text-center">
                        Edit
                    </th>
                    <th class="text-center">
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
                                    <td class="text-center">
                                        <a href="{{ route('coachprogram.edit', ['id'=> $coach->pivot->id]) }}" class="btn btn-xs btn-info">
                                            <span class="fas fa-pencil-alt"></span>
                                        </a>
                                    </td>
                                    <td class="text-center">
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