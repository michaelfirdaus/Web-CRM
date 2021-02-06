@extends('layouts.app')

@section('title')Tambah Peserta @endsection

@section('header') Tambah Peserta @endsection

@section('breadcrumb')
<a href="/participants" class="mr-1">Dashboard Peserta</a>/
Tambah Peserta
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('participant.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Peserta <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: Michael" value="{{ old('name') }}">
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="pob">Tempat Lahir <span class="text-danger">*</span></label>
                    <input type="text" name="pob" class="form-control" placeholder="Contoh: Jakarta" value="{{ old('pob') }}">
                    @if( $errors->has('pob') )
                        <div class="text-danger">{{ $errors->first('pob') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="dob" class="mr-2">Tanggal Lahir <span class="text-danger">*</span></label>
                    <input type="date" id="dob" name="dob" value="{{ old('dob') }}" class="ml-2">
                    @if( $errors->has('dob') )
                        <div class="text-danger">{{ $errors->first('dob') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="phonenumber">Nomor Telepon <span class="text-danger">*</span></label>
                    <input type="tel" name="phonenumber" class="form-control" placeholder="Contoh: 628111011011" value="{{ old('phonenumber') }}">
                    @if( $errors->has('phonenumber') )
                        <div class="text-danger">{{ $errors->first('phonenumber') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="address">Alamat <span class="text-danger">*</span></label>
                    <input type="text" name="address" class="form-control" placeholder="Contoh: Villa Permata Berlian, Jalan Sukses 1 Blok E1-9, Jakarta 12345" value="{{ old('address') }}">
                    @if( $errors->has('address') )
                        <div class="text-danger">{{ $errors->first('address') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">E-mail <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" placeholder="Contoh: michael@course-net.com" value="{{ old('email') }}">
                    @if( $errors->has('email') )
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="student_idcard">ID Card Mahasiswa</label>
                    <input type="text" name="student_idcard" class="form-control" placeholder="Contoh: BN001234973253" value="{{ old('student_idcard') }}">
                </div>

                <div class="form-group">
                    <label for="cv_link">Link CV</label>
                    <input type="url" name="cv_link" class="form-control" placeholder="Contoh: https://github.com/michaelfirdaus" value="{{ old('cv_link') }}">
                </div>

                <div class="form-group">
                    <label for="sp_link">Link SP</label>
                    <input type="url" name="sp_link" class="form-control" placeholder="Contoh: https://www.linkedin.com/in/michaelfirdaus/" value="{{ old('sp_link') }}">
                </div>

                <div class="form-group">
                    <label for="emergencycontact_name">Nama Kontak Darurat <span class="text-danger">*</span></label>
                    <input type="tel" name="emergencycontact_name" class="form-control" placeholder="Contoh: Budiman Aksara" value="{{ old('emergencycontact_name') }}">
                    @if( $errors->has('emergencycontact_name') )
                        <div class="text-danger">{{ $errors->first('emergencycontact_name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="emergencycontact_phone">Nomor Kontak Darurat <span class="text-danger">*</span></label>
                    <input type="text" name="emergencycontact_phone" placeholder="Contoh: 628111011011" class="form-control" value="{{ old('emergencycontact_phone') }}">
                    @if( $errors->has('emergencycontact_phone') )
                        <div class="text-danger">{{ $errors->first('emergencycontact_phone') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="member_validthru">Member Berlaku s/d </label>
                    <input type="date" id="member_validthru" name="member_validthru" value="{{ old('member_validthru') }}" class="ml-2">
                </div>

                <div class="form-group">
                    <label for="branch_id">Lokasi Pendaftaran <span class="text-danger">*</span></label>
                    <select name="branch_id" id="branch_id" class="form-control select2" style="width: auto;">
                    <option value="" selected disabled hidden> - Pilih Lokasi Pendaftaran - </option>
                    @foreach($branches as $branch)
                        @if( old('branch_id') )
                            <option selected value="{{ $branch->id }}"> {{$branch->code}} - {{ $branch->name }} </option>
                        @else
                            <option value="{{ $branch->id }}"> {{$branch->code}} - {{ $branch->name }} </option> 
                        @endif
                    @endforeach
                    </select>
                    @if( $errors->has('branch_id') )
                        <div class="text-danger">{{ $errors->first('branch_id') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="knowcn_id">Mengetahui Course-Net dari <span class="text-danger">*</span></label>
                    <select name="knowcn_id" id="knowcn_id" class="form-control select2" style="width: auto;">
                    <option value="" selected disabled hidden> - Pilih Kanal CN - </option>
                    @foreach($knowcns as $knowcn)
                        @if( old('knowcn_id') )
                            <option selected value="{{ $knowcn->id }}"> {{ $knowcn->name }} </option>
                        @else
                            <option value="{{ $knowcn->id }}"> {{ $knowcn->name }} </option>
                        @endif
                    @endforeach
                    </select>
                    @if( $errors->has('knowcn_id') )
                        <div class="text-danger">{{ $errors->first('knowcn_id') }}</div>
                    @endif
                </div>

                <div class="form-group memberreference">
                    <label for="memberreference_id">Jika mengetahui Course-Net dari alumni Course-Net, sebutkan : <span class="text-danger">*</span></label>
                    <select name="memberreference_id" id="memberreference_id" class="form-control select2" style="width: auto;">
                    <option value="" selected disabled hidden> - Pilih Member/Peserta - </option>
                    @foreach($participants as $participant)
                        @if( old('memberreference_id') )
                            <option selected value="{{ $participant->id }}"> {{ $participant->id }} - {{ $participant->name }} </option>
                        @else
                            <option value="{{ $participant->id }}"> {{ $participant->id }} - {{ $participant->name }} </option>
                        @endif
                    @endforeach
                    </select>
                    @if( $errors->has('memberreference_id') )
                        <div class="text-danger">{{ $errors->first('memberreference_id') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="profession_id">Profesi <span class="text-danger">*</span></label>
                    <select name="profession_id" id="profession_id" class="form-control select2" style="width: auto;">
                    <option value="" selected disabled hidden> - Pilih Profesi - </option>
                    @foreach($professions as $profession)
                        @if( old('profession_id') )
                            <option selected value="{{ $profession->id }}"> {{ $profession->name }} </option>
                        @else
                            <option value="{{ $profession->id }}"> {{ $profession->name }} </option>
                        @endif
                    @endforeach
                    </select>
                    @if( $errors->has('profession_id') )
                        <div class="text-danger">{{ $errors->first('profession_id') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="profession_detail">Detail Nama Perusahaan/Universitas (Jika ada)</label>
                    <input type="text" name="profession_detail" class="form-control" placeholder="Contoh: BINUS University" value="{{ old('profession_detail') }}">
                    @if( $errors->has('profession_detail') )
                        <div class="text-danger">{{ $errors->first('profession_detail') }}</div>
                    @endif
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

@section('scripts')
$('.memberreference').hide();

$('#knowcn_id').change(function() {
    if($(this).val() == 1 ) $('.memberreference').show();
    else $('.memberreference').hide();
});
@endsection