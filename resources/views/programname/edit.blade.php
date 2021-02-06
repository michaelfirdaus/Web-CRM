@extends('layouts.app')

@section('title')Edit Program {{$programname->name}} @endsection

@section('header') Perbaharui Nama Program <br>{{$programname->name}} @endsection

@section('breadcrumb')
<a href="/programnames" class="mr-1">Program</a>/ 
Edit Program {{$programname->name}}
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <p class="text-danger text-bold">* : Data diperlukan.</p>
            <form action="{{ route('programname.update', ['id' => $programname->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nama Program <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Contoh: CCNA" value="{{ $programname->name }}" class="form-control">
                    @if( $errors->has('name') )
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="price">Harga Program <span class="text-danger">*</span></label>
                    <input type="text" name="price" placeholder="Contoh: 5000000" class="form-control currency" value="{{ $programname->program_price }}">
                    @if( $errors->has('price') )
                        <div class="text-danger">{{ $errors->first('price') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="status">Status Program <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control select2" style="width: auto;">
                        @if($programname->status == 1)
                            <option value="1" selected> Aktif </option>
                            <option value="0"> Tidak Aktif </option>
                        @else
                            <option value="1"> Aktif </option>
                            <option value="0" selected> Tidak Aktif </option>
                        @endif
                    </select>
                    @if( $errors->has('status') )
                        <div class="text-danger">{{ $errors->first('status') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Perbaharui Program</button>
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