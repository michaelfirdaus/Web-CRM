@extends('layouts.app')

@section('header') Perbaharui Job Connector Peserta {{ $currentparticipant->name }} @endsection

@section('content')

    <div class="card"> 
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('jobconnectorparticipant.update', ['id' => $jobconnectorparticipant->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="participant">Nama Peserta <span class="text-danger">*</span></label>
                    <select name="participant" id="participant" class="form-control select2" style="width: 300px;">
                    <option value="" selected disabled hidden> - Pilih Peserta - </option>
                    @foreach($participants as $participant)
                        @if($jobconnectorparticipant->participant_id == $participant->id)
                            <option value="{{ $participant->id }}" selected> {{ $participant->id}} - {{ $participant->name }} </option>
                        @else
                            <option value="{{ $participant->id }}"> {{ $participant->id}} - {{ $participant->name }} </option>
                        @endif
                    @endforeach
                    </select>
                    @if( $errors->has('participant') )
                        <div class="text-danger">{{ $errors->first('participant') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="jobconnector">Perusahaan Rekanan <span class="text-danger">*</span></label>
                    <select name="jobconnector" id="jobconnector" class="form-control select2" style="width: 300px;">
                    <option value="" selected disabled hidden> - Pilih Perusahaan Rekanan - </option>
                    @foreach($jobconnectors as $jobconnector)
                        @if($jobconnectorparticipant->jobconnector_id == $jobconnector->id)
                            <option value="{{ $jobconnector->id }}" selected> {{ $jobconnector->company_name }} - {{ $jobconnector->location }} </option>
                        @else
                            <option value="{{ $jobconnector->id }}"> {{ $jobconnector->company_name }} - {{ $jobconnector->location }} </option>
                        @endif
                    @endforeach
                    </select>
                    @if( $errors->has('jobconnector') )
                        <div class="text-danger">{{ $errors->first('jobconnector') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="date">Tanggal Batch <span class="text-danger">*</span></label>
                    <input type="date" id="date" name="date" value="{{ $jobconnectorparticipant->date }}">
                    @if( $errors->has('date') )
                        <div class="text-danger">{{ $errors->first('date') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="application_status">Status <span class="text-danger">*</span></label>
                    <select name="application_status" id="application_status" class="form-control select2" style="width: 300px;">
                        @if($jobconnectorparticipant->application_status == 1)
                        <option value="1" selected> Sedang dalam Proses </option>
                        <option value="2"> Ditolak </option>
                        <option value="3"> Diterima </option>
                        <option value="4"> Dibatalkan </option>
                        <option value="5"> Lainnya </option>
                        @elseif($jobconnectorparticipant->application_status == 2)
                            <option value="1"> Sedang dalam Proses </option>
                            <option value="2" selected> Ditolak </option>
                            <option value="3"> Diterima </option>
                            <option value="4"> Dibatalkan </option>
                            <option value="5"> Lainnya </option>
                        @elseif($jobconnectorparticipant->application_status == 3)
                            <option value="1"> Sedang dalam Proses </option>
                            <option value="2"> Ditolak </option>
                            <option value="3" selected> Diterima </option>
                            <option value="4"> Dibatalkan </option>
                            <option value="5"> Lainnya </option>
                        @elseif($jobconnectorparticipant->application_status == 4)
                            <option value="1"> Sedang dalam Proses </option>
                            <option value="2"> Ditolak </option>
                            <option value="3"> Diterima </option>
                            <option value="4" selected> Dibatalkan </option>
                            <option value="5"> Lainnya </option>
                        @elseif($jobconnectorparticipant->application_status == 5)
                            <option value="1"> Sedang dalam Proses </option>
                            <option value="2"> Ditolak </option>
                            <option value="3"> Diterima </option>
                            <option value="4"> Dibatalkan </option>
                            <option value="5" selected> Lainnya </option>
                        @endif
                    </select>
                    @if( $errors->has('application_status') )
                        <div class="text-danger">{{ $errors->first('application_status') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Job Connector Peserta</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection