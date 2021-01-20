@extends('layouts.app')

@section('header') List Semua Coach Course-Net @endsection

@section('content')

    <div class="row">
        <div class="form-group ml-auto mr-2">
            <a href="{{ route('coach.create') }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Coach</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-hover table-bordered">
                <thead>
                    <th class="text-center">
                        Nama Coach
                    </th>
                    <th class="text-center">
                        E-mail
                    </th>
                    <th class="text-center">
                        Nomor Telepon
                    </th>
                    <th class="text-center">
                        Tanggal Lahir
                    </th>
                    <th class="text-center">
                        Alamat
                    </th>
                    <th class="text-center">
                        Status Coach
                    </th>
                    <th class="text-center">
                        Edit
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
                                    {{ $coach->email }}
                                </td>
                                <td class="text-center">
                                    {{ $coach->phonenumber }}
                                </td>
                                <td class="text-center">
                                    {{ $coach->dob }}
                                </td>
                                <td>
                                    {{ $coach->address }}
                                </td>
                                <td class="text-center">
                                    @if($coach->status == 1)
                                        Aktif
                                    @else
                                        Tidak Aktif
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('coach.edit', ['id' => $coach ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
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