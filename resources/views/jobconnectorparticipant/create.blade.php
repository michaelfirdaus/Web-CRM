@extends('layouts.app')

@section('header') Tambah Job Connector untuk Peserta @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('jobconnectorparticipant.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="participant_id">Nama Peserta</label>
                    <select name="participant_id" id="participant_id" class="form-control">
                    {{-- <option value="" selected disabled hidden> - Pilih Peserta - </option> --}}
                    @foreach($participants as $participant)
                        <option value="{{ $participant->id }}"> {{ $participant->name }} </option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="jobconnector_id">Perusahaan Rekanan</label>
                    <select name="jobconnector_id" id="jobconnector" class="form-control">
                    {{-- <option value="" selected disabled hidden> - Pilih Perusahaan Rekanan - </option> --}}
                    @foreach($jobconnectors as $jobconnector)
                        <option value="{{ $jobconnector->id }}"> {{ $jobconnector->company_name }} </option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date">Tanggal Batch</label>
                    <input type="date" id="date" name="date" {{ old('date') }}>
                </div>

                <div class="form-group">
                    <label for="application_status">Status</label>
                    <select name="application_status" id="application_status" class="form-control">
                        <option value="1" selected> Sedang dalam Proses </option>
                        <option value="2"> Ditolak </option>
                        <option value="3"> Diterima </option>
                        <option value="4"> Dibatalkan </option>
                        <option value="5"> Lainnya </option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Job Connector untuk Peserta</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    $(document).ready(function(e){
  
        $('#participant_id').select3({ width: 260, placeholder: ' - Pilih Peserta - ', zIndex: 100 });  
        $('#jobconnector').select3({ width: 320, placeholder: ' - Pilih Perusahaan Rekanan - ', zIndex: 100 });  
        $('#application_status').select3({ width: 260, zIndex: 100});
  
    });
@endsection