@extends('layouts.app')

@section('header') Perbaharui Peserta {{ $participant->name }} @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('participant.update', ['id' => $participant->id]) }}" method="post" enctype="multipart/form-data">
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
                    <input type="date" id="dob" name="dob" value="{{ $participant->dob }}">
                </div>

                <div class="form-group">
                    <label for="phonenumber">Nomor Telepon</label>
                    <input type="tel" name="phonenumber" value="{{ $participant->phonenumber }}" placeholder="Cth : 628111011011" class="form-control">
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
                    <input type="url" name="sp_link" value="{{ $participant->sp_link }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="emergencycontact_name">Nama Kontak Darurat</label>
                    <input type="text" name="emergencycontact_name" value="{{ $participant->emergencycontact_name }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="emergencycontact_phone">Nomor Kontak Darurat</label>
                    <input type="tel" name="emergencycontact_phone" value="{{ $participant->emergencycontact_phone }}" placeholder="Cth : 628111011011" class="form-control">
                </div>

                <div class="form-group">
                    <label for="member_validthru">Member Berlaku s/d</label>
                    <input type="date" id="member_validthru" name="member_validthru">
                </div>

                <div class="form-group">
                    <label for="branch_id">Lokasi Pendaftaran</label>
                    <select name="branch_id" id="branch_id" class="form-control">
                    @foreach($branches as $branch)
                            @if($branch->id == $participant->branch_id)
                                <option selected value="{{ $branch->id }}"> {{ $branch->name }} </option>
                            @else
                                <option value="{{ $branch->id }}"> {{ $branch->name }} </option>
                            @endif 
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="program_id">Minat Program</label>
                    <select name="program_id" id="program_id" class="form-control">
                    @foreach($programs as $program)
                            @if($program->id == $participant->program_id)
                                <option selected value="{{ $program->id }}"> {{ $program->name }} </option>
                            @else
                                <option value="{{ $program->id }}"> {{ $program->name }} </option>
                            @endif 
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="knowcn_id">Mengetahui CN dari</label>
                    <select name="knowcn_id" id="knowcn_id" class="form-control">
                    @foreach($knowcns as $knowcn)
                            @if($knowcn->id == $participant->knowcn_id)
                                <option selected value="{{ $knowcn->id }}"> {{ $knowcn->name }} </option>
                            @else
                                <option value="{{ $knowcn->id }}"> {{ $knowcn->name }} </option>
                            @endif 
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="profession_id">Profesi</label>
                    <select name="profession_id" id="profession_id" class="form-control">
                    @foreach($professions as $profession)
                            @if($profession->id == $participant->profession_id)
                                <option selected value="{{ $profession->id }}"> {{ $profession->name }} </option>
                            @else
                                <option value="{{ $profession->id }}"> {{ $program->name }} </option>
                            @endif 
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Peserta</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection