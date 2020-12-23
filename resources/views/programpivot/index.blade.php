@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card card-header">
            <th><strong>List Semua Jadwal Kelas</strong></th>
        </div>
        <div class="card card-body">

            <table class="table table-hover">
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
                                        {{ $program->branch->branch_name }}
                                    </td>
                                    <td>
                                        <a href="{{ route('programpivot.edit', $coach->pivot->id) }}" class="btn btn-xs btn-info">
                                            <span class="fas fa-pencil-alt"></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('programpivot.delete', ['id' => $coach->pivot ->id]) }}" class="btn btn-xs btn-danger">
                                            <span class="fas fa-trash-alt"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">Tidak ada jadwal kelas yang tersedia, tambahkan jadwal kelas baru.</th>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection