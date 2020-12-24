@extends('layouts.app')

@section('content')

    @include('includes.errors')


    <div class="card">
        <div class="card-header">
            Tambah Job Connector untuk Peserta
        </div>

        <div class="card-body">
            <form action="{{ route('jobconnectorparticipant.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="participant_id">Nama Peserta</label>
                    <select name="participant_id" id="participant_id" class="form-control">
                        @foreach($participants as $participant)
                            <option value="{{ $participant->id }}"> {{ $participant->name }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="jobconnector_id">Perusahaan Rekanan</label>
                    <select name="jobconnector_id" id="jobconnector" class="form-control">
                        @foreach($jobconnectors as $jobconnector)
                            <option value="{{ $jobconnector->id }}"> {{ $jobconnector->company_name }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date">Tanggal Batch</label>
                    <input type="date" id="date" name="date">
                </div>

                <div class="form-group">
                    <label for="application_status">Status</label>
                    <select name="application_status" id="application_status" class="form-control">
                        <option value="1"> Sedang dalam Proses </option>
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