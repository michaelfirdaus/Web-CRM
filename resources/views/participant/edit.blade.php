@extends('layouts.app')

@section('header') Perbaharui Peserta {{ $participant->name }} @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('participant.update', ['id' => $participant->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Peserta <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ $participant->name }}" placeholder="Contoh: Michael" class="form-control">
                </div>

                <div class="form-group">
                    <label for="pob">Tempat Lahir <span class="text-danger">*</span></label>
                    <input type="text" name="pob" value="{{ $participant->pob }}" placeholder="Contoh: Jakarta" class="form-control">
                </div>

                <div class="form-group">
                    <label for="dob">Tanggal Lahir <span class="text-danger">*</span></label>
                    <input type="date" id="dob" name="dob" value="{{ $participant->dob }}">
                </div>

                <div class="form-group">
                    <label for="phonenumber">Nomor Telepon <span class="text-danger">*</span></label>
                    <input type="tel" name="phonenumber" value="{{ $participant->phonenumber }}" placeholder="Contoh: 628111011011" class="form-control">
                </div>

                <div class="form-group">
                    <label for="address">Alamat <span class="text-danger">*</span></label>
                    <input type="text" name="address" value="{{ $participant->address }}" placeholder="Contoh: Villa Permata Berlian, Jalan Sukses 1 Blok E1-9, Jakarta 12345" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">E-mail <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ $participant->email }}" placeholder="Contoh: michael@course-net.com" class="form-control">
                </div>

                <div class="form-group">
                    <label for="student_idcard">ID Card Mahasiswa</label>
                    <input type="text" name="student_idcard" value="{{ $participant->student_idcard }}" placeholder="Contoh: BN001234973253" class="form-control">
                </div>

                <div class="form-group">
                    <label for="cv_link">Link CV</label>
                    <input type="url" name="cv_link" value="{{ $participant->cv_link }}" placeholder="Contoh: https://github.com/michaelfirdaus" class="form-control">
                </div>

                <div class="form-group">
                    <label for="sp_link">Link SP</label>
                    <input type="url" name="sp_link" value="{{ $participant->sp_link }}" placeholder="Contoh: https://www.linkedin.com/in/michaelfirdaus/" class="form-control">
                </div>

                <div class="form-group">
                    <label for="emergencycontact_name">Nama Kontak Darurat <span class="text-danger">*</span></label>
                    <input type="text" name="emergencycontact_name" value="{{ $participant->emergencycontact_name }}" placeholder="Contoh: Budiman Aksara" class="form-control">
                </div>

                <div class="form-group">
                    <label for="emergencycontact_phone">Nomor Kontak Darurat <span class="text-danger">*</span></label>
                    <input type="tel" name="emergencycontact_phone" value="{{ $participant->emergencycontact_phone }}" placeholder="Contoh: 628111011011" class="form-control">
                </div>

                <div class="form-group">
                    <label for="member_validthru">Member Berlaku s/d</label>
                    <input type="date" id="member_validthru" name="member_validthru">
                </div>

                <div class="form-group">
                    <label for="branch_id">Lokasi Pendaftaran <span class="text-danger">*</span></label>
                    <select name="branch_id" id="branch_id" class="form-control select2" style="width: 300px;">
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
                    <label for="knowcn_id">Mengetahui CN dari <span class="text-danger">*</span></label>
                    <select name="knowcn_id" id="knowcn_id" class="form-control select2" style="width: 300px;">
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
                    <select name="profession_id" id="profession_id" class="form-control select2" style="width: 300px;">
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