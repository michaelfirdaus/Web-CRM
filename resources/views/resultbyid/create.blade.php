@extends('layouts.app')

@section('header') Tambah Data Nilai Baru @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('resultbyid.store', ['id' => $currenttransaction]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="score">Nilai Ujian</label>
                    <input type="text" name="score" placeholder="" class="form-control" value={{ old('score') }}>
                </div>

                <div class="form-group">
                    <label for="grade">Grade Ujian</label>
                    <input type="text" name="grade" placeholder="" class="form-control" value={{ old('grade') }}>
                </div>

                <div class="form-group">
                    <label for="jacket_size">Ukuran Jaket</label>
                    <input type="text" name="jacket_size" placeholder="" class="form-control" value={{ old('jacket_size') }}>
                </div>

                <div class="form-group">
                    <label for="skillcertificate_number">Nomor Sertifikat Skill</label>
                    <input type="text" name="skillcertificate_number" placeholder="" class="form-control" value={{ old('skillcertificate_number') }}>
                </div>

                <div class="form-group">
                    <label for="skillcertificate_pickdate">Tanggal Pengambilan Sertifikat Skill</label>
                    <input type="date" name="skillcertificate_pickdate" placeholder="" class="form-control" value={{ old('skillcertificate_pickdate') }}>
                </div>

                <div class="form-group">
                    <label for="attendancecertificate_number">Nomor Sertifikat Kehadiran</label>
                    <input type="text" name="attendancecertificate_number" placeholder="" class="form-control" value={{ old('attendancecertificate_number') }}>
                </div>

                <div class="form-group">
                    <label for="attendancecertificate_pickdate">Tanggal Pengambilan Sertifikat Kehadiran</label>
                    <input type="date" name="attendancecertificate_pickdate" placeholder="" class="form-control" value={{ old('attendancecertificate_pickdate') }}>
                </div>

                <div class="form-group">
                    <label for="photo">Bukti Foto</label>
                    <input type="file" name="photo" placeholder="" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection