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
                    <input type="text" id="name" name="name" class="form-control" placeholder="Contoh: Michael" value="{{ old('name') }}">
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="pob">Tempat Lahir <span class="text-danger">*</span></label>
                    <input type="text" id="pob" name="pob" class="form-control" placeholder="Contoh: Jakarta" value="{{ old('pob') }}">
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
                    <input type="tel" id="phonenumber" name="phonenumber" class="form-control" placeholder="Contoh: 628111011011" value="{{ old('phonenumber') }}">
                    @if( $errors->has('phonenumber') )
                        <div class="text-danger">{{ $errors->first('phonenumber') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="address">Alamat <span class="text-danger">*</span></label>
                    <input type="text" id="address" name="address" class="form-control" placeholder="Contoh: Villa Permata Berlian, Jalan Sukses 1 Blok E1-9, Jakarta 12345" value="{{ old('address') }}">
                    @if( $errors->has('address') )
                        <div class="text-danger">{{ $errors->first('address') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">E-mail <span class="text-danger">*</span></label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Contoh: michael@course-net.com" value="{{ old('email') }}">
                    @if( $errors->has('email') )
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="student_idcard">ID Card Mahasiswa</label>
                    <input type="text" id="student_idcard" name="student_idcard" class="form-control" placeholder="Contoh: BN001234973253" value="{{ old('student_idcard') }}">
                </div>

                <div class="form-group">
                    <label for="cv_link">Link CV</label>
                    <input type="url" id="cv_link" name="cv_link" class="form-control" placeholder="Contoh: https://github.com/michaelfirdaus" value="{{ old('cv_link') }}">
                </div>

                <div class="form-group">
                    <label for="sp_link">Link SP</label>
                    <input type="url" id="sp_link" name="sp_link" class="form-control" placeholder="Contoh: https://www.linkedin.com/in/michaelfirdaus/" value="{{ old('sp_link') }}">
                </div>

                <div class="form-group">
                    <label for="emergencycontact_name">Nama Kontak Darurat <span class="text-danger">*</span></label>
                    <input type="tel" id="emergencycontact_name" name="emergencycontact_name" class="form-control" placeholder="Contoh: Budiman Aksara" value="{{ old('emergencycontact_name') }}">
                    @if( $errors->has('emergencycontact_name') )
                        <div class="text-danger">{{ $errors->first('emergencycontact_name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="emergencycontact_phone">Nomor Kontak Darurat <span class="text-danger">*</span></label>
                    <input type="text" id="emergencycontact_phone" name="emergencycontact_phone" placeholder="Contoh: 628111011011" class="form-control" value="{{ old('emergencycontact_phone') }}">
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
                    <input type="text" id="profession_detail" name="profession_detail" class="form-control" placeholder="Contoh: BINUS University" value="{{ old('profession_detail') }}">
                    @if( $errors->has('profession_detail') )
                        <div class="text-danger">{{ $errors->first('profession_detail') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#theModal">Tambahkan Peserta Baru</button>
                    </div>
                </div>

                <div class="modal fade" role="dialog" id="theModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Konfirmasi</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p class="text-bold text-danger">PASTIKAN Data yang Diinput Sudah BENAR!</p>
                                <strong>Nama: </strong><span id="1"></span><br>
                                <strong>Tempat Lahir: </strong><span id="2"></span><br>
                                <strong>Tanggal Lahir: </strong><span id="3"></span><br>
                                <strong>Nomor Telepon: </strong><span id="4"></span><br>
                                <strong>Alamat: </strong><span id="5"></span><br>
                                <strong>E-mail: </strong><span id="6"></span><br>
                                <strong>ID Card Mahasiswa: </strong><span id="7"></span><br>
                                <strong>Link CV: </strong><span id="8"></span><br>
                                <strong>Link SP: </strong><span id="9"></span><br>
                                <strong>Nama Kontak Darurat: </strong><span id="10"></span><br>
                                <strong>Nomor Kontak Darurat: </strong><span id="11"></span><br>
                                <strong>Member Berlaku S/d: </strong><span id="12"></span><br>
                                <strong>Lokasi Pendaftaran: </strong><span id="13"></span><br>
                                <strong>Mengetahui CN dari: </strong><span id="14"></span><br>
                                <strong>Profesi: </strong><span id="15"></span><br>
                                <strong>Detail Nama Perusahaan/Universitas: </strong><span id="16"></span>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-info" data-dismiss="modal">
                                    <span class="fas fa-pencil-alt mr-1"></span>
                                  Edit Lagi
                                </button>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">
                                        <span class='fas fa-check mr-1'></span>Ya, Sudah Benar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
@endsection

@section('scripts')

var value13, value14, value15;

$('.memberreference').hide();

$('#branch_id').change(function() {
    var branch_id =  $(this).val();
    {{-- console.log(branch_id); --}}
    var a = $(this).parent();
    var op ="";

    $.ajax({
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('participant.fetchbranch') }}",
        data: {'id': branch_id},
        dataType: 'json',
        success: function(data){
            console.log(data);
            {{-- console.log("Its Change !"), --}}
           value13 = data;
        },
        error:function(){

        }
    });
});

$('#knowcn_id').change(function() {
    if($(this).val() == 1 ) $('.memberreference').show();
    else $('.memberreference').hide();

    var knowcn_id =  $(this).val();
    {{-- console.log(knowcn_id); --}}
    var a = $(this).parent();
    var op ="";

    $.ajax({
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('participant.fetchknowcn') }}",
        data: {'id': knowcn_id},
        dataType: 'json',
        success: function(data){
            {{-- console.log(data); --}}
            console.log("Its Change !"),
            value14 = data;
        },
        error:function(){

        }
    });
    
});

$('#memberreference_id').change(function() {
    if($('#knowcn_id').val() == 1){
        console.log($('#memberreference_id').val());
        value14 = $('#memberreference_id').val();
    }
});


$('#profession_id').change(function() {
    var profession_id =  $(this).val();
    {{-- console.log(branch_id); --}}
    var a = $(this).parent();
    var op ="";

    $.ajax({
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ route('participant.fetchprofession') }}",
        data: {'id': profession_id},
        dataType: 'json',
        success: function(data){
            console.log(data);
            {{-- console.log("Its Change !"), --}}
           value15 = data;
        },
        error:function(){

        }
    });
});

$(function() {
    $("button").on("click", function() {
        var value1 = $("#name").val();
        var value2 = $("#pob").val();
        var value3 = $("#dob").val();
        var value4 = $("#phonenumber").val();
        var value5 = $("#address").val();
        var value6 = $("#email").val();
        var value7 = $("#student_idcard").val();
        var value8 = $("#cv_link").val();
        var value9 = $("#sp_link").val();
        var value10 = $("#emergencycontact_name").val();
        var value11 = $("#emergencycontact_phone").val();
        var value12 = $("#member_validthru").val();
        var value16 = $("#profession_detail").val();
        $("#1").text(value1);
        $("#2").text(value2);
        $("#3").text(value3);
        $("#4").text(value4);
        $("#5").text(value5);
        $("#6").text(value6);
        $("#7").text(value7);
        $("#8").text(value8);
        $("#9").text(value9);
        $("#10").text(value10);
        $("#11").text(value11);
        $("#12").text(value12);
        $("#13").text(value13);
        $("#14").text(value14);
        $("#15").text(value15);
        $("#16").text(value16);

    });
});

@endsection