@extends('layouts.app')

@section('header') Perbaharui Transaksi Peserta <br>{{ $transaction->participant->id }} - {{ $transaction->participant->name }} @endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('transaction.update', ['id' => $transaction->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="participant">Nama Peserta <span class="text-danger">*</span></label>
                    <select name="participant" id="participant" class="form-control select2" style="width: auto;">
                    @foreach($participants as $participant)
                        @if($participant->id == $transaction->participant_id)
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
                    <label for="sales">Nama Sales <span class="text-danger">*</span></label>
                    <select name="sales" id="sales" class="form-control select2" style="width: auto;">
                        @foreach($salespersons as $salesperson)
                            @if($salesperson->id == $transaction->salesperson_id)
                                <option selected value="{{ $salesperson->id }}"> {{ $salesperson->name }} </option> 
                            @else
                                <option value="{{ $salesperson->id }}"> {{ $salesperson->name }} </option>
                            @endif    
                        @endforeach
                    </select>
                    @if( $errors->has('sales') )
                        <div class="text-danger">{{ $errors->first('sales') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="program">Nama Program <span class="text-danger">*</span></label>
                    <select name="program" id="program" class="form-control select2" style="width: auto;">
                        @foreach($programs as $p)
                            @if($p->id == $transaction->program->id)
                                <option selected value="{{ $p->id }}"> Batch {{$p->date}} | {{ $p->programname->name }} | {{ $p->branch->name}} </option> 
                            @else
                                <option value="{{ $p->id }}"> Batch {{$p->date}} | {{ $p->programname->name }} | {{ $p->branch->name }} </option> 
                            @endif
                        @endforeach
                    </select>
                    @if( $errors->has('program') )
                        <div class="text-danger">{{ $errors->first('program') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="price">Harga <span class="text-danger">*</span></label>
                    <input type="text" name="price" value="{{ $transaction->price }}" placeholder="Contoh: 5000000" class="form-control currency">
                    @if( $errors->has('price') )
                        <div class="text-danger">{{ $errors->first('price') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="firsttrans">DP Pertama <span class="text-danger">*</span></label>
                    <input type="text" name="firsttrans" value="{{ $transaction->firsttrans }}" placeholder="Contoh: 2500000" class="form-control currency">
                    @if( $errors->has('firsttrans') )
                        <div class="text-danger">{{ $errors->first('firsttrans') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="secondtrans">DP Kedua</label>
                    <input type="text" name="secondtrans" value="{{ $transaction->secondtrans }}" placeholder="Contoh: 2500000" class="form-control currency">
                </div>

                <div class="form-group">
                    <label for="cashback">Cashback</label>
                    <input type="text" name="cashback" value="{{ $transaction->cashback }}" placeholder="Contoh: 50000" class="form-control currency">
                </div>

                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="text" name="rating" value="{{ $transaction->rating }}" placeholder="Contoh: 5" class="form-control">
                </div>

                <div class="form-group">
                    <label for="rating_text">Ulasan</label>
                    <input type="text" name="rating_text" value="{{ $transaction->rating_text }}" placeholder="Contoh: Coachnya sangat berpengalaman" class="form-control">
                </div>

                <div class="form-group">
                    <label for="recoaching">Recoaching? <span class="text-danger">*</span></label>
                    <select name="recoaching" id="recoaching" class="form-control select2" style="width: 100px;">
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
                    @if( $errors->has('recoaching') )
                        <div class="text-danger">{{ $errors->first('recoaching') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="note">Catatan</label>
                    <input type="text" name="note" value="{{ $transaction->note }}" placeholder="Contoh: Peserta minta dikirimkan harga program CCNA terbaru." class="form-control">
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

@section('scripts')

$('.currency').keyup(function(event) {

    // skip for arrow keys
    if(event.which >= 37 && event.which <= 40) return;
  
    // format number
    $(this).val(function(index, value) {
      return value
      .replace(/\D/g, "")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
      ;
    });
});

@endsection