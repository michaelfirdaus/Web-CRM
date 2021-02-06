@extends('layouts.app')

@section('title')Edit Data Nilai {{ $result->transaction->participant_id}} - {{ $result->transaction->participant->name }} @endsection

@section('header') Perbaharui Data Nilai Peserta <br>{{ $result->transaction->participant_id}} - {{ $result->transaction->participant->name }} @endsection

@section('breadcrumb')
<a href="/transactions" class="mr-1">Transaksi</a>/ 
<a href="/resultbyid/{{$result->transaction->id}}" class="ml-1 mr-1">
Data Nilai {{ $result->transaction->participant_id}} - {{ $result->transaction->participant->name }}</a>/ 
Edit
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('resultbyid.update', ['id' => $result->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="score">Nilai Ujian</label>
                    <input type="text" name="score" value="{{ $result->score }}" class="form-control">
                    @if( $errors->has('score') )
                        <div class="text-danger">{{ $errors->first('score') }}</div>
                    @endif
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
                    <label for="photo"><div class="text-danger">Bukti Foto (Apabila perlu diupdate, foto sebelumnya akan terhapus!)</div></label>
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