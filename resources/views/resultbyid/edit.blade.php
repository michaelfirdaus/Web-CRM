@extends('layouts.app')

@section('header') Perbaharui Data Nilai Peserta {{ $result->transaction->participant->name }} @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('resultbyid.update', ['id' => $result->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="score">Nilai Ujian</label>
                    <input type="text" name="score" value="{{ $result->score }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="grade">Grade Ujian</label>
                    <input type="text" name="grade" value="{{ $result->grade }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="jacket_size">Ukuran Jaket</label>
                    <input type="text" name="jacket_size" value="{{ $result->jacket_size }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="skillcertificate_number">Nomor Sertifikat Skill</label>
                    <input type="text" name="skillcertificate_number" value="{{ $result->skillcertificate_number }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="skillcertificate_pickdate">Tanggal Pengambilan Sertifikat Skill</label>
                    <input type="date" name="skillcertificate_pickdate" value="{{ $result->skillcertificate_pickdate }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="attendancecertificate_number">Nomor Sertifikat Kehadiran</label>
                    <input type="text" name="attendancecertificate_number" value="{{ $result->attendancecertificate_number }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="attendancecertificate_pickdate">Tanggal Pengambilan Sertifikat Kehadiran</label>
                    <input type="date" name="attendancecertificate_pickdate" value="{{ $result->attendancecertificate_pickdate }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="photo">Bukti Foto (Apabila perlu diupdate, foto sebelumnya akan terhapus!)</label>
                    <input type="file" name="photo" placeholder="" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection