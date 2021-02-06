@extends('layouts.app')

@section('title')Data Nilai {{ $result->transaction->participant_id}} - {{ $result->transaction->participant->name }} @endsection

@section('header') Data Nilai Peserta <br>{{ $result->transaction->participant_id}} - {{ $result->transaction->participant->name }} @endsection

@section('breadcrumb')
<a href="/transactions" class="mr-1">Transaksi</a>/ 
Data Nilai {{ $result->transaction->participant_id}} - {{ $result->transaction->participant->name }}
@endsection

@section('content')
        @if($result == null)
            <div class="row">
                <strong>Belum Ada Data Nilai.</strong>
                <div class="form-group ml-auto mr-2">
                    <a href="{{ route('resultbyid.create', ['id' => $t->id]) }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambahkan Data Nilai</a>
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-body">
                    Nama Peserta : {{ $result->transaction->participant->name }} <br>
                    Nilai : {{ $result->score }} <br>
                    Grade : {{ $result->grade }} <br>
                    Ukuran Jaket : {{ $result->jacket_size }} <br>
                    Nomor Sertifikat Skill : {{ $result->skillcertificate_number }} <br>
                    Tanggal Pengambilan Sertifikat Skill : {{ $result->skillcertificate_pickdate }} <br>
                    Nomor Sertifikat Kehadiran : {{ $result->attendancecertificate_number }} <br>
                    Tanggal Pengambilan Sertifikat Kehadiran : {{ $result->attendancecertificate_pickdate }} <br>
                    @if($result->photo)
                    Bukti Foto <br>
                    <img src="{{ asset('uploads/photo/'.$result->photo) }}" class="img-responsive m-2" style="object-fit: cover" width="100%" height="100%">
                    @else
                    <div class="text-bold">Bukti Foto Belum di Upload.</div>
                    @endif

                    <div class="text-center">
                        <a href="{{ route('resultbyid.edit', ['id' => $result->id]) }}" class="btn btn-md btn-info">
                            <span class="fas fa-pencil-alt"></span> Edit
                        </a>
                    </div>
                </div>
            </div>
        @endif
@endsection