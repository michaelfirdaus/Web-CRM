@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card card-header">
            <th><strong>List Semua Program</strong></th>
        </div>
        <div class="card card-body">

            <table class="table table-hover">
                <thead>
                    <th>
                        Nama Program
                    </th>
                    <th> 
                        Lokasi Cabang
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($programs->count() > 0)
                        @foreach ($programs as $program)
                            <tr>
                                <td>
                                    {{ $program->name }}
                                </td>
                                <td>
                                    {{ $program->branch->branch_name }}
                                </td>
                                <td>
                                    <a href="{{ route('program.edit', ['id' => $program ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('program.delete', ['id' => $program ->id]) }}" class="btn btn-xs btn-danger">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">Tidak ada program yang tersedia, tambahkan program baru.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection