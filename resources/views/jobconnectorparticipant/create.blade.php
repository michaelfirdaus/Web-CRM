@extends('layouts.app')

@section('header') Tambah Job Connector untuk Peserta @endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('jobconnectorparticipant.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="participant">Nama Peserta <span class="text-danger">*</span></label>
                    <select name="participant" id="participant" class="form-control select2" style="width: 300px;">
                    <option value="" selected disabled hidden> - Pilih Peserta - </option>
                    @foreach($participants as $participant)
                        @if( old('participant') )
                            <option selected value="{{ $participant->id }}"> {{ $participant->id }} - {{ $participant->name }} </option>
                        @else
                            <option value="{{ $participant->id }}"> {{ $participant->id }} - {{ $participant->name }} </option>
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
                        @if( old('jobconnector') )
                            <option selected value="{{ $jobconnector->id }}"> {{ $jobconnector->name }} - {{ $jobconnector->location }} </option>
                        @else
                            <option value="{{ $jobconnector->id }}"> {{ $jobconnector->name }} - {{ $jobconnector->location }} </option>
                        @endif
                    @endforeach
                    </select>
                    @if( $errors->has('jobconnector') )
                        <div class="text-danger">{{ $errors->first('jobconnector') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="date">Tanggal Apply <span class="text-danger">*</span></label>
                    <input type="date" id="date" name="date" value="{{ old('date') }}">
                    @if( $errors->has('date') )
                        <div class="text-danger">{{ $errors->first('date') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="application_status">Status <span class="text-danger">*</span></label>
                    <select name="application_status" id="application_status" class="form-control select2" style="width: 300px;">
                        <option value="1" selected> Sedang dalam Proses </option>
                        <option value="2"> Ditolak </option>
                        <option value="3"> Diterima </option>
                        <option value="4"> Dibatalkan </option>
                        <option value="5"> Lainnya </option>
                    </select>
                    @if( $errors->has('application_status') )
                        <div class="text-danger">{{ $errors->first('application_status') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Job Connector Untuk Peserta</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection