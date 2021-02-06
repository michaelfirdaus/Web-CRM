@extends('layouts.app')

@section('title')Edit Peserta {{$participant->id}} - {{$participant->name}} @endsection

@section('header') Perbaharui Peserta <br>{{$participant->id}} - {{ $participant->name }} @endsection

@section('breadcrumb')
<a href="/participants" class="mr-1">Dashboard Peserta</a>/
Edit {{$participant->id}} - {{ $participant->name }}
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('participant.update', ['id' => $participant->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Peserta <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ $participant->name }}" placeholder="Contoh: Michael" class="form-control">
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="pob">Tempat Lahir <span class="text-danger">*</span></label>
                    <input type="text" name="pob" value="{{ $participant->pob }}" placeholder="Contoh: Jakarta" class="form-control">
                    @if( $errors->has('pob') )
                        <div class="text-danger">{{ $errors->first('pob') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="dob">Tanggal Lahir <span class="text-danger">*</span></label>
                    <input type="date" id="dob" name="dob" value="{{ $participant->dob }}">
                    @if( $errors->has('dob') )
                        <div class="text-danger">{{ $errors->first('dob') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="phonenumber">Nomor Telepon <span class="text-danger">*</span></label>
                    <input type="tel" name="phonenumber" value="{{ $participant->phonenumber }}" placeholder="Contoh: 628111011011" class="form-control">
                    @if( $errors->has('phonenumber') )
                        <div class="text-danger">{{ $errors->first('phonenumber') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="address">Alamat <span class="text-danger">*</span></label>
                    <input type="text" name="address" value="{{ $participant->address }}" placeholder="Contoh: Villa Permata Berlian, Jalan Sukses 1 Blok E1-9, Jakarta 12345" class="form-control">
                    @if( $errors->has('address') )
                        <div class="text-danger">{{ $errors->first('address') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">E-mail <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ $participant->email }}" placeholder="Contoh: michael@course-net.com" class="form-control">
                    @if( $errors->has('emaik') )
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
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
                    @if( $errors->has('emergencycontact_name') )
                        <div class="text-danger">{{ $errors->first('emergencycontact_name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="emergencycontact_phone">Nomor Kontak Darurat <span class="text-danger">*</span></label>
                    <input type="tel" name="emergencycontact_phone" value="{{ $participant->emergencycontact_phone }}" placeholder="Contoh: 628111011011" class="form-control">
                    @if( $errors->has('emergencycontact_phone') )
                        <div class="text-danger">{{ $errors->first('emergencycontact_phone') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="member_validthru">Member Berlaku s/d</label>
                    <input type="date" id="member_validthru" name="member_validthru" value="{{ $participant->dob }}" class="ml-2">
                </div>

                <div class="form-group">
                    <label for="branch_id">Lokasi Pendaftaran <span class="text-danger">*</span></label>
                    <select name="branch_id" id="branch_id" class="form-control select2" style="width: auto;">
                    @foreach($branches as $branch)
                            @if($branch->id == $participant->branch_id)
                                <option selected value="{{ $branch->id }}"> {{ $branch->code }} - {{ $branch->name }} </option>
                            @else
                                <option value="{{ $branch->id }}"> {{ $branch->code }} - {{ $branch->name }} </option>
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
                    @foreach($knowcns as $knowcn)
                            @if($knowcn->id == $participant->knowcn_id)
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
                    <label for="memberreference_id">Jika mengetahui Course-Net dari teman alumni Course-Net, sebutkan :</label>
                    <select name="memberreference_id" id="memberreference_id" class="form-control select2" style="width: auto;">
                        @if($participant->memberreference_id == null)
                            <option value="" selected disabled hidden> - Pilih Member/Peserta - </option>
                            @foreach($allparticipant as $p)
                                <option value="{{ $p->id }}"> {{ $p->id }} - {{ $p->name }} </option>
                            @endforeach    
                        @else
                            @foreach($allparticipant as $p)
                                @if( $participant->memberreference_id == $p->id )
                                    <option selected value="{{ $p->id }}"> {{ $p->id }} - {{ $p->name }} </option>
                                @else
                                    <option value="{{ $p->id }}"> {{ $p->id }} - {{ $p->name }} </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                    @if( $errors->has('memberreference_id') )
                        <div class="text-danger">{{ $errors->first('memberreference_id') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="profession_id">Profesi <span class="text-danger">*</span></label>
                    
                    <select name="profession_id" id="profession_id" class="form-control select2" style="width: auto;">
                    @foreach($professions as $profession)
                            @if($profession->id == $participant->profession_id)
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
                    <input type="text" name="profession_detail" class="form-control" placeholder="Contoh: BINUS University" value="{{ $participant->profession_detail }}">
                    @if( $errors->has('profession_detail') )
                        <div class="text-danger">{{ $errors->first('profession_detail') }}</div>
                    @endif
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

@section('scripts')
$('.memberreference').hide();

$('#knowcn_id').change(function() {
    if($(this).val() == 1 ) $('.memberreference').show();
    else $('.memberreference').hide();
});
@endsection