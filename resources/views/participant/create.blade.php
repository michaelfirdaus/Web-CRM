@extends('layouts.app')

@section('content')

    @include('includes.errors')


    <div class="card">
        <div class="card-header">
            Tambah Peserta Baru
        </div>

        <div class="card-body">
            <form action="{{ route('participant.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Peserta</label>
                    <input type="text" name="name" value="{{ $participant->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="pob">Tempat Lahir</label>
                    <input type="text" name="pob" value="{{ $participant->pob }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="dob">Tanggal Lahir</label>
                    <input type="text" name="dob" value="{{ $participant->dob }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="phonenumber">Nomor Telepon</label>
                    <input type="tel" name="phonenumber" value="{{ $participant->phonenumber }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" name="address" value="{{ $participant->address }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" value="{{ $participant->email }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="student_idcard">ID Card Mahasiswa</label>
                    <input type="text" name="student_idcard" value="{{ $participant->student_idcard }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="cv_link">Link CV</label>
                    <input type="url" name="cv_link" value="{{ $participant->cv_link }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="sp_link">Link SP</label>
                    <input type="url" name="address" value="{{ $participant->sp_link }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="text">Nama Kontak Darurat</label>
                    <input type="text" name="text" value="{{ $participant->emergencycontact_name }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="emergencycontact_phone">Nomor Kontak Darurat</label>
                    <input type="text" name="emergencycontact_phone" value="{{ $participant->student_idcard }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="member_validthru">Member Berlaku s/d</label>
                    <input type="date" id="member_validthru" name="member_validthru">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Jadwal Kelas</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection