@extends('layouts.app')

@section('header') Tambah Transaksi Baru @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('transaction.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="participant">Nama Peserta <span class="text-danger">*</span></label>
                    <select name="participant" id="participant" class="form-control select2" style="width: 300px;">
                    <option value="" selected disabled hidden> - Pilih Peserta - </option>
                    @foreach($participants as $participant)
                        <option value="{{ $participant->id }}"> {{ $participant->id }} - {{ $participant->name }} </option> 
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="sales">Nama Sales <span class="text-danger">*</span></label>
                    <select name="sales" id="sales" class="form-control select2" style="width: 300px;">
                    <option value="" selected disabled hidden> - Pilih Sales - </option>
                    @foreach($salespersons as $salesperson)
                        <option value="{{ $salesperson->id }}"> {{ $salesperson->name }} </option> 
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="program">Nama Program <span class="text-danger">*</span></label>
                    <select name="program" id="program" class="form-control select2" style="width: 300px;">
                    <option value="" selected disabled hidden> - Pilih Program - </option>
                    @foreach($coachprograms as $cp)
                        <option value="{{ $cp->id }}"> {{ $cp->date }} - {{ $cp->program->name }} </option> 
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Harga <span class="text-danger">*</span></label>
                    <input type="text" name="price" placeholder="Contoh: 5000000" class="form-control" value="{{ old('price') }}">
                </div>

                <div class="form-group">
                    <label for="firsttrans">DP Pertama <span class="text-danger">*</span></label>
                    <input type="text" name="firsttrans" placeholder="Contoh: 2500000" class="form-control" value="{{ old('firsttrans') }}">
                </div>

                <div class="form-group">
                    <label for="secondtrans">DP Kedua</label>
                    <input type="text" name="secondtrans" placeholder="Contoh: 2500000" class="form-control" value="{{ old('secondtrans') }}">
                </div>

                <div class="form-group">
                    <label for="cashback">Cashback</label>
                    <input type="text" name="cashback" placeholder="Contoh: 500000" class="form-control" value="{{ old('cashback') }}">
                </div>

                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="text" name="rating" placeholder="Contoh: 5" class="form-control" value="{{ old('rating') }}">
                </div>

                <div class="form-group">
                    <label for="rating_text">Ulasan</label>
                    <input type="text" name="rating_text" class="form-control" placeholder="Contoh: Coachnya sangat berpengalaman" value="{{ old('rating_text') }}">
                </div>

                <div class="form-group">
                    <label for="recoaching">Recoaching? <span class="text-danger">*</span></label>
                    <select name="recoaching" id="recoaching" class="form-control">
                      <option value="1"> Ya </option>
                      <option selected value="0"> Tidak </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="note">Catatan</label>
                    <input type="text" name="note" class="form-control" placeholder="Contoh: Peserta minta dikirimkan harga program CCNA terbaru." value="{{ old('note') }}">
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
