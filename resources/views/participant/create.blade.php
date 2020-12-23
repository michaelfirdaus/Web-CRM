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
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="pob">Tempat Lahir</label>
                    <input type="text" name="pob" class="form-control">
                </div>

                <div class="form-group">
                    <label for="dob">Tanggal Lahir</label>
                    <input type="date" id="dob" name="dob">
                </div>

                <div class="form-group">
                    <label for="phonenumber">Nomor Telepon</label>
                    <input type="tel" name="phonenumber" class="form-control" placeholder="Cth : 628111011011">
                </div>

                <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" name="address" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="student_idcard">ID Card Mahasiswa</label>
                    <input type="text" name="student_idcard" class="form-control">
                </div>

                <div class="form-group">
                    <label for="cv_link">Link CV</label>
                    <input type="url" name="cv_link" class="form-control">
                </div>

                <div class="form-group">
                    <label for="sp_link">Link SP</label>
                    <input type="url" name="address" class="form-control">
                </div>

                <div class="form-group">
                    <label for="text">Nama Kontak Darurat</label>
                    <input type="tel" name="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="emergencycontact_phone">Nomor Kontak Darurat</label>
                    <input type="text" name="emergencycontact_phone" placeholder="Cth : 628111011011" class="form-control">
                </div>

                <div class="form-group">
                    <label for="member_validthru">Member Berlaku s/d</label>
                    <input type="date" id="member_validthru" name="member_validthru">
                </div>

                <div class="form-group">
                    <label for="branch_id">Lokasi Pendaftaran</label>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}"> {{ $branch->branch_name }} </option> 
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="program_id">Minat Program</label>
                    @foreach($programs as $program)
                        <option value="{{ $program->id }}"> {{ $program->name }} </option>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="knowcn_id">Mengetahui CN dari</label>
                    @foreach($knowcns as $knowcn)
                        <option value="{{ $knowcn->id }}"> {{ $knowcn->name }} </option>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="knowcn_id">Profesi</label>
                    @foreach($professions as $profession)
                        <option value="{{ $profession->id }}"> {{ $profession->name }} </option>
                    @endforeach
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