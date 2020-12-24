@extends('layouts.app')

@section('header') List Semua Coach Course-Net @endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-hover table-responsive">
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