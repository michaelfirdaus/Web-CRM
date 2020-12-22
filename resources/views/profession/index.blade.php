@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card card-header">
            <th><strong>List Semua Profesi</strong></th>
        </div>
        <div class="card card-body">

            <table class="table table-hover">
                <thead>
                    <th>
                        Nama Profesi
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($professions->count() > 0)
                        @foreach ($professions as $profession)
                            <tr>
                                <td>
                                    {{ $profession->name }}
                                </td>
                                <td>
                                    <a href="{{ route('profession.edit', ['id' => $profession ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('profession.delete', ['id' => $profession ->id]) }}" class="btn btn-xs btn-danger">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">Tidak ada profesi yang tersedia, tambahkan profesi baru.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection