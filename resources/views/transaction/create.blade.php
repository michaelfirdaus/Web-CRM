@extends('layouts.app')

@section('header') Tambah Transaksi Baru @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('transaction.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="score">Nilai</label>
                    <input type="text" name="score" placeholder="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="grade">Grade</label>
                    <input type="text" name="grade" placeholder="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="jacket_size">Ukuran Jaket</label>
                    <input type="text" name="jacket_size" placeholder="Cth : 500000" class="form-control">
                </div>

                <div class="form-group">
                    <label for="skillcertificate_number">Nomor Sertifikat Skill</label>
                    <input type="text" name="cashback" placeholder="Cth : 500000" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Rating</label>
                    <input type="text" name="rating" placeholder="Cth : 5" class="form-control">
                </div>

                <div class="form-group">
                    <label for="rating_text">Ulasan</label>
                    <input type="text" name="rating_text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="recoaching">Recoaching?</label>
                    <select name="recoaching" id="recoaching" class="form-control">
                      <option value="1"> Ya </option>
                      <option selected value="0"> Tidak </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="note">Catatan</label>
                    <input type="text" name="note" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Tambahkan Transaksi Baru</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection