@extends('layouts.app')

@section('header') Perbaharui Transaksi Peserta {{ $transaction->name }} @endsection

@section('content')

@include('includes.errors')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('transaction.update', ['id' => $transaction->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="participant">Nama Peserta</label>
                    <select name="participant" id="participant" class="form-control">
                    @foreach($participants as $participant)
                        @if($participant->id == $transaction->participant_id)
                            <option selected value="{{ $participant->id }}"> {{ $participant->id }} - {{ $participant->name }} </option> 
                        @else
                            <option value="{{ $participant->id }}"> {{ $participant->id }} - {{ $participant->name }} </option>
                        @endif    
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="sales">Nama Sales</label>
                    <select name="sales" id="sales" class="form-control">
                    @foreach($salespersons as $salesperson)
                        @if($salesperson->id == $transaction->salesperson_id)
                            <option selected value="{{ $salesperson->id }}"> {{ $salesperson->name }} </option> 
                        @else
                            <option value="{{ $salesperson->id }}"> {{ $salesperson->name }} </option>
                        @endif    
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="program">Nama Program</label>
                    <select name="program" id="program" class="form-control">
                    @foreach($coachprograms as $cp)
                        @if($cp->id == $transaction->coach_program_id)
                            <option selected value="{{ $cp->id }}"> {{$cp->id}} - {{ $cp->program->name }} </option> 
                        @else
                            <option value="{{ $cp->id }}"> {{ $cp->program_id }} </option> 
                        @endif
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="text" name="price" value="{{ $transaction->price }}" placeholder="Cth : 628111011011" class="form-control">
                </div>

                <div class="form-group">
                    <label for="firsttrans">DP Pertama</label>
                    <input type="text" name="firsttrans" value="{{ $transaction->firsttrans }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="secondtrans">DP Kedua</label>
                    <input type="text" name="secondtrans" value="{{ $transaction->secondtrans }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="cashback">Cashback</label>
                    <input type="text" name="cashback" value="{{ $transaction->cashback }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="text" name="rating" value="{{ $transaction->rating }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="rating_text">Ulasan</label>
                    <input type="text" name="rating_text" value="{{ $transaction->rating_text }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="recoaching">Recoaching?</label>
                    <select name="recoaching" id="recoaching" class="form-control">
                        @if($transaction->recoaching == 0)
                            <option selected value="0"> Tidak </option>
                        @else
                            <option value="0"> Tidak </option>
                        @endif 
                        @if($transaction->recoaching == 1)
                            <option selected value="1"> Ya </option>
                        @else
                            <option value="1"> Ya </option>
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="note">Catatan</label>
                    <input type="text" name="note" value="{{ $transaction->note }}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Transaksi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection