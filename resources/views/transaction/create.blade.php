@extends('layouts.app')

@section('header') Tambah Transaksi Baru @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('transaction.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="participant">Nama Peserta</label>
                    <select name="participant" id="participant" class="form-control">
                    <option value="" selected disabled hidden> - Pilih Peserta - </option>
                    @foreach($participants as $participant)
                        <option value="{{ $participant->id }}"> {{ $participant->id }} - {{ $participant->name }} </option> 
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="sales">Nama Sales</label>
                    <select name="sales" id="sales" class="form-control">
                    <option value="" selected disabled hidden> - Pilih Sales - </option>
                    @foreach($salespersons as $salesperson)
                        <option value="{{ $salesperson->id }}"> {{ $salesperson->name }} </option> 
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="program">Nama Program</label>
                    <select name="program" id="program" class="form-control">
                    <option value="" selected disabled hidden> - Pilih Program - </option>
                    @foreach($coachprograms as $cp)
                        <option value="{{ $cp->id }}"> {{ $cp->program_id }} - {{$cp->program->name}} </option> 
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="text" name="price" placeholder="Cth : 500000" class="form-control" value={{ old('price') }}>
                </div>

                <div class="form-group">
                    <label for="firsttrans">DP Pertama</label>
                    <input type="text" name="firsttrans" placeholder="Cth : 500000" class="form-control" value={{ old('firsttrans') }}>
                </div>

                <div class="form-group">
                    <label for="secondtrans">DP Kedua</label>
                    <input type="text" name="secondtrans" placeholder="Cth : 500000" class="form-control" value={{ old('secondtrans') }}>
                </div>

                <div class="form-group">
                    <label for="cashback">Cashback</label>
                    <input type="text" name="cashback" placeholder="Cth : 500000" class="form-control" value={{ old('cashback') }}>
                </div>

                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="text" name="rating" placeholder="Cth : 5" class="form-control" value={{ old('rating') }}>
                </div>

                <div class="form-group">
                    <label for="rating_text">Ulasan</label>
                    <input type="text" name="rating_text" class="form-control" value={{ old('rating_text') }}>
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
                    <input type="text" name="note" class="form-control" value={{ old('note') }}>
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