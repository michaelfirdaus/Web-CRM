@extends('layouts.app')

@section('header') List Semua Profesi @endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-hover table-responsive">
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