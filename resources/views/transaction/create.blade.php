@extends('layouts.app')

@section('header') Tambah Transaksi Baru @endsection

@section('content')

    <div class="card mb-5">
        <div class="card-header text-danger text-bold">Informasi Penting</div>
        <div class="card-body">
            <ul>
                <li>Batch Program yang muncul adalah paling lambat 7 hari sebelum hari ini dan yang akan datang.</li>
                <li class="text-bold">Jika peserta melakukan transaksi lebih dari 7 hari setelah kelas dimulai, maka peserta diikutsertakan ke batch selanjutnya.</li>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('transaction.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="participant">Nama Peserta <span class="text-danger">*</span></label>
                    <select name="participant" id="participant" class="form-control select2" style="width: auto;">
                    <option value="" selected disabled hidden> - Pilih Peserta - </option>
                    @foreach($participants as $participant)
                        @if( old('participant') )
                            <option selected value="{{ $participant->id }}"> {{$participant->id}} - {{ $participant->name }} </option>
                        @else
                            <option value="{{ $participant->id }}"> {{$participant->id}} - {{ $participant->name }} </option> 
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
                    <option value="" selected disabled hidden> - Pilih Sales - </option>
                    @foreach($salespersons as $salesperson)
                        @if( old('sales') )
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
                    <label for="program">Pilih Batch Program <span class="text-danger">*</span></label>
                    <select name="program" id="program" class="form-control select2" style="width: auto;">
                    <option value="" selected disabled hidden> - Pilih Batch Program - </option>
                    @foreach($programs as $p)
                        @if( old('program') )
                            <option selected value="{{ $p->id }}"> Batch {{$p->date}} | {{ $p->programname->name }} | {{ $p->branch->name }} </option>
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
                    <input type="text" name="price" placeholder="Contoh: 5000000" class="form-control currency" value="{{ old('price') }}">
                    @if( $errors->has('price') )
                        <div class="text-danger">{{ $errors->first('price') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="firsttrans">DP Pertama <span class="text-danger">*</span></label>
                    <input type="text" name="firsttrans" placeholder="Contoh: 2500000" class="form-control currency" value="{{ old('firsttrans') }}">
                    @if( $errors->has('firsttrans') )
                        <div class="text-danger">{{ $errors->first('firsttrans') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="secondtrans">DP Kedua</label>
                    <input type="text" name="secondtrans" placeholder="Contoh: 2500000" class="form-control currency" value="{{ old('secondtrans') }}">
                </div>

                <div class="form-group">
                    <label for="cashback">Cashback</label>
                    <input type="text" name="cashback" placeholder="Contoh: 500000" class="form-control currency" value="{{ old('cashback') }}">
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
                    <select name="recoaching" id="recoaching" class="form-control" style="width: 100px;">
                      <option value="1"> Ya </option>
                      <option selected value="0"> Tidak </option>
                    </select>
                    @if( $errors->has('recoaching') )
                        <div class="text-danger">{{ $errors->first('recoaching') }}</div>
                    @endif
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

  