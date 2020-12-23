@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card card-header">
            <th><strong>List Semua Cabang</strong></th>
        </div>
        <div class="card card-body">

            <table class="table table-hover">
                <thead>
                    <th>
                        Nama Cabang
                    </th>
                    <th>
                        Kode Cabang
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($branches->count() > 0)
                        @foreach ($branches as $branch)
                            <tr>
                                <td>
                                    {{ $branch->branch_name }}
                                </td>
                                <td>
                                    {{ $branch->branch_code }}
                                </td>
                                <td>
                                    <a href="{{ route('branch.edit', ['id' => $branch ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('branch.delete', ['id' => $branch ->id]) }}" class="btn btn-xs btn-danger">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">Tidak ada cabang, tambahkan cabang terlebih dahulu.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection