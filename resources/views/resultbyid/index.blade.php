@extends('layouts.app')

@section('header') Data Nilai Peserta {{ $transaction->participant->name }} @endsection

@section('content')


    @if($results->count() == 0)

        <div class="row">
            <strong>Belum Ada Data Nilai.</strong>
            <div class="form-group ml-auto mr-2">
                <a href="{{ route('resultbyid.create', ['id' => $transaction->id]) }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambahkan Data Nilai</a>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                @foreach($results as $result)
                    Nama Peserta : {{ $transaction->participant->name }} <br>
                    Nilai : {{ $result->score }} <br>
                    Grade : {{ $result->grade }} <br>
                    Ukuran Jaket : {{ $result->jacket_size }} <br>
                    Nomor Sertifikat Skill : {{ $result->skillcertificate_number }} <br>
                    Tanggal Pengambilan Sertifikat Skill : {{ $result->skillcertificate_pickdate }} <br>
                    Nomor Sertifikat Kehadiran : {{ $result->attendancecertificate_number }} <br>
                    Tanggal Pengambilan Sertifikat Kehadiran : {{ $result->attendancecertificate_pickdate }} <br>
                    Bukti Foto <br>
                    <img src="{{ asset('uploads/photo/'.$result->photo) }}">

                    <div class="text-center">
                        <a href="{{ route('resultbyid.edit', ['id' => $result->id]) }}" class="btn btn-md btn-info">
                            <span class="fas fa-pencil-alt"></span> Edit
                        </a>
                        <a href="{{ route('resultbyid.delete', ['id' => $result->id]) }}" class="btn btn-md btn-danger">
                            <span class="fas fa-trash-alt"></span> Hapus
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection