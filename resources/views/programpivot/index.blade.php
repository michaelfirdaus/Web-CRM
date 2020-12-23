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
                        Edit
                    </th>
                    <th>
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($programpivots->count() > 0)
                        @foreach ($programpivots as $programpivot)
                            <tr>
                                <td>
                                    {{ $programpivot->program_id }}
                                </td>
                                <td>
                                    {{ $programpivot->coach->name }}
                                </td>
                                <td>
                                    {{ $programpivot->date }}
                                </td>
                                <td>
                                    <a href="{{ route('programpivot.edit', ['id' => $programpivot ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('programpivot.delete', ['id' => $programpivot ->id]) }}" class="btn btn-xs btn-danger">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
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