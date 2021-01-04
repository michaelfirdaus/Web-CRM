@extends('layouts.app')

@section('header') Perbaharui Job Connector Peserta {{ $currentparticipant->name }} @endsection

@section('content')

@include('includes.errors')

    <div class="card"> 
        <div class="card-body">
            <form action="{{ route('jobconnectorparticipant.update', ['id' => $jobconnectorparticipant->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="participant">Nama Peserta</label>
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
                </div>

                <div class="form-group">
                    <label for="jobconnector">Perusahaan Rekanan</label>
                    <select name="jobconnector" id="jobconnector" class="form-control select2" style="width: 300px;">
                    <option value="" selected disabled hidden> - Pilih Perusahaan Rekanan - </option>
                    @foreach($jobconnectors as $jobconnector)
                        @if($jobconnectorparticipant->jobconnector_id == $jobconnector->id)
                            <option value="{{ $jobconnector->id }}" selected> {{ $jobconnector->company_name }} </option>
                        @else
                            <option value="{{ $jobconnector->id }}" selected> {{ $jobconnector->company_name }} </option>
                        @endif
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date">Tanggal Batch</label>
                    <input type="date" id="date" name="date" value="{{ $jobconnectorparticipant->date }}">
                </div>

                <div class="form-group">
                    <label for="application_status">Status</label>
                    <select name="application_status" id="application_status" class="form-control select2" style="width: 300px;">
                        @if($jobconnectorparticipant->application_status == 1)
                        <option value="1" selected> Sedang dalam Proses </option>
                        <option value="2"> Ditolak </option>
                        <option value="3"> Diterima </option>
                        <option value="4"> Dibatalkan </option>
                        <option value="5"> Lainnya </option>
                            @if($jobconnectorparticipant->application_status == 2)
                            <option value="1" selected> Sedang dalam Proses </option>
                            <option value="2"> Ditolak </option>
                            <option value="3"> Diterima </option>
                            <option value="4"> Dibatalkan </option>
                            <option value="5"> Lainnya </option>
                                @if($jobconnectorparticipant->application_status == 3)
                                <option value="1" selected> Sedang dalam Proses </option>
                                <option value="2"> Ditolak </option>
                                <option value="3"> Diterima </option>
                                <option value="4"> Dibatalkan </option>
                                <option value="5"> Lainnya </option>
                                    @if($jobconnectorparticipant->application_status == 4)
                                    <option value="1" selected> Sedang dalam Proses </option>
                                    <option value="2"> Ditolak </option>
                                    <option value="3"> Diterima </option>
                                    <option value="4"> Dibatalkan </option>
                                    <option value="5"> Lainnya </option>
                                        @if($jobconnectorparticipant->application_status == 5)
                                        <option value="1" selected> Sedang dalam Proses </option>
                                        <option value="2"> Ditolak </option>
                                        <option value="3"> Diterima </option>
                                        <option value="4"> Dibatalkan </option>
                                        <option value="5"> Lainnya </option>
                                        @endif
                                    @endif
                                @endif
                            @endif
                        @endif

                        {{-- @if($jobconnectorparticipant->application_status == 2)
                        <option value="2" selected> Ditolak </option>
                        @else
                        <option value="1" selected> Sedang dalam Proses </option>
                        <option value="3"> Diterima </option>
                        <option value="4"> Dibatalkan </option>
                        <option value="5"> Lainnya </option>
                        @endif

                        @if($jobconnectorparticipant->application_status == 3)
                        <option value="3" selected> Diterima </option>
                        @else
                        <option value="1"> Sedang dalam Proses </option>
                        <option value="2"> Ditolak </option>
                        <option value="4"> Dibatalkan </option>
                        <option value="5"> Lainnya </option>
                        @endif

                        @if($jobconnectorparticipant->application_status == 4)
                        <option value="4" selected> Dibatalkan </option>
                        @else
                        <option value="1" selected> Sedang dalam Proses </option>
                        <option value="2"> Ditolak </option>
                        <option value="3"> Diterima </option>
                        <option value="5"> Lainnya </option>
                        @endif

                        @if($jobconnectorparticipant->application_status == 1)
                        <option value="5" selected> Lainnya </option>
                        @else
                        <option value="1"> Sedang dalam Proses </option>
                        <option value="2"> Ditolak </option>
                        <option value="3"> Diterima </option>
                        <option value="4"> Dibatalkan </option>
                        @endif --}}

                    </select>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Job Connector Untuk Peserta</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection