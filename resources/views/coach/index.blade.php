@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card card-header">
            <th><strong>List Semua Coach</strong></th>
        </div>
        <div class="card card-body">

            <table class="table table-hover">
                <thead>
                    <th>
                        Nama Coach
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($coaches->count() > 0)
                        @foreach ($coaches as $coach)
                            <tr>
                                <td>
                                    {{ $coach->name }}
                                </td>
                                <td>
                                    <a href="{{ route('coach.edit', ['id' => $coach ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('coach.delete', ['id' => $coach ->id]) }}" class="btn btn-xs btn-danger">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">Tidak ada coach yang tersedia, tambahkan coach terlebih dahulu.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection