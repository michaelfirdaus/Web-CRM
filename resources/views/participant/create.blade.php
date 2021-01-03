@extends('layouts.app')

@section('header') Tambah Peserta Baru @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('participant.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Peserta</label>
                    <input type="text" name="name" class="form-control" value={{ old('name') }}>
                </div>

                <div class="form-group">
                    <label for="pob">Tempat Lahir</label>
                    <input type="text" name="pob" class="form-control" value={{ old('pob') }}>
                </div>

                <div class="form-group">
                    <label for="dob">Tanggal Lahir</label>
                    <input type="date" id="dob" name="dob" value={{ old('dob') }}>
                </div>

                <div class="form-group">
                    <label for="phonenumber">Nomor Telepon</label>
                    <input type="tel" name="phonenumber" class="form-control" placeholder="Cth : 628111011011" value={{ old('phonenumber') }}>
                </div>

                <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" name="address" class="form-control" value={{ old('address') }}>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" value={{ old('email') }}>
                </div>

                <div class="form-group">
                    <label for="student_idcard">ID Card Mahasiswa</label>
                    <input type="text" name="student_idcard" class="form-control" value={{ old('student_idcard') }}>
                </div>

                <div class="form-group">
                    <label for="cv_link">Link CV</label>
                    <input type="url" name="cv_link" class="form-control" value={{ old('cv_link') }}>
                </div>

                <div class="form-group">
                    <label for="sp_link">Link SP</label>
                    <input type="url" name="sp_link" class="form-control" value={{ old('sp_link') }}>
                </div>

                <div class="form-group">
                    <label for="emergencycontact_name">Nama Kontak Darurat</label>
                    <input type="tel" name="emergencycontact_name" class="form-control" value={{ old('emergencycontact_name') }}>
                </div>

                <div class="form-group">
                    <label for="emergencycontact_phone">Nomor Kontak Darurat</label>
                    <input type="text" name="emergencycontact_phone" placeholder="Cth : 628111011011" class="form-control" value={{ old('emergencycontact_phone') }}>
                </div>

                <div class="form-group">
                    <label for="member_validthru">Member Berlaku s/d</label>
                    <input type="date" id="member_validthru" name="member_validthru" value={{ old('member_validthru') }}>
                </div>

                <div class="form-group">
                    <label for="branch_id">Lokasi Pendaftaran</label>
                    <select name="branch_id" id="branch_id" class="form-control">
                        <option value="" selected disabled hidden> - Pilih Lokasi Pendaftaran - </option>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}"> {{ $branch->name }} - {{$branch->code}} </option> 
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="program_id">Minat Program</label>
                    <select name="program_id" id="program_id" class="form-control">
                    <option value="" selected disabled hidden> - Pilih Minat Program - </option>
                    @foreach($programs as $program)
                        <option value="{{ $program->id }}"> {{ $program->name }} </option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="knowcn_id">Mengetahui CN dari</label>
                    <select name="knowcn_id" id="knowcn_id" class="form-control">
                    <option value="" selected disabled hidden> - Pilih Kanal CN - </option>
                    @foreach($knowcns as $knowcn)
                        <option value="{{ $knowcn->id }}"> {{ $knowcn->name }} </option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="profession_id">Profesi</label>
                    <select name="profession_id" id="profession_id" class="form-control">
                    <option value="" selected disabled hidden> - Pilih Profesi - </option>
                    @foreach($professions as $profession)
                        <option value="{{ $profession->id }}"> {{ $profession->name }} </option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Peserta Baru</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection