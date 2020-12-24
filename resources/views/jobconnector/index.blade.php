@extends('layouts.app')

@section('header') List Semua Perusahaan @endsection

@section('content')

    <div class="card">
        <div class="card card-body">

            <table id="table" class="table table-hover table-responsive">
                <thead>
                    <th>
                        Nama Perusahaan
                    </th>
                    <th>
                        Lokasi Perusahaan
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Hapus
                    </th>
                </thead>
        
                <tbody>
                    @if($jobconnectors->count() > 0)
                        @foreach ($jobconnectors as $jobconnector)
                            <tr>
                                <td>
                                    {{ $jobconnector->company_name }}
                                </td>
                                <td>
                                    {{ $jobconnector->location }}
                                </td>
                                <td>
                                    <a href="{{ route('jobconnector.edit', ['id' => $jobconnector ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('jobconnector.delete', ['id' => $jobconnector ->id]) }}" class="btn btn-xs btn-danger">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">Tidak ada perusahaan yang tersedia, tambahkan perusahaan penerima loker terlebih dahulu.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection