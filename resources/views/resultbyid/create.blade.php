@extends('layouts.app')

@section('title')Input Data Nilai {{$transaction->participant_id}} - {{ $transaction->participant->name }}  @endsection

@section('header') Input Data Nilai Peserta<br>{{$transaction->participant_id}} - {{ $transaction->participant->name }} @endsection

@section('breadcrumb')
<a href="/transactions" class="mr-1">Transaksi</a>/ 
Input Nilai {{$transaction->participant_id}} - {{ $transaction->participant->name }}
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('resultbyid.store', ['id' => $currenttransaction]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="score">Nilai Ujian <span class="text-danger">*</span></label>
                    <input type="text" name="score" class="form-control" placeholder="Contoh: 100" value={{ old('score') }}>
                    @if( $errors->has('score') )
                        <div class="text-danger">{{ $errors->first('score') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="jacket_size">Ukuran Jaket</label>
                    <input type="text" name="jacket_size" placeholder="Contoh: XL" class="form-control" value={{ old('jacket_size') }}>
                </div>

                <div class="form-group">
                    <label for="skillcertificate_number">Nomor Sertifikat Skill</label>
                    <input type="text" name="skillcertificate_number" placeholder="Contoh: 2021/CCNA/01-2222" class="form-control" value={{ old('skillcertificate_number') }}>
                </div>

                <div class="form-group">
                    <label for="skillcertificate_pickdate">Tanggal Pengambilan Sertifikat Skill</label>
                    <input type="date" name="skillcertificate_pickdate" placeholder="" class="form-control" value={{ old('skillcertificate_pickdate') }}>
                </div>
                 

                <div class="form-group">
                    <label for="attendancecertificate_number">Nomor Sertifikat Kehadiran</label>
                    <input type="text" name="attendancecertificate_number" placeholder="Contoh: 2021/CCNA/01-2222" class="form-control" value={{ old('attendancecertificate_number') }}>
                </div>

                <div class="form-group">
                    <label for="attendancecertificate_pickdate">Tanggal Pengambilan Sertifikat Kehadiran</label>
                    <input type="date" name="attendancecertificate_pickdate" placeholder="" class="form-control" value={{ old('attendancecertificate_pickdate') }}>
                </div>

                <div class="form-group">
                    <label for="photo">Bukti Foto</label><br>
                    <input type="file" name="photo" placeholder="">
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