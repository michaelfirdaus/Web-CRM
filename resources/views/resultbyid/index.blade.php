@extends('layouts.app')

@section('header') Data Nilai Peserta {{ $transaction->participant->name }} @endsection

@section('content')


    @if($results->count() == 0)

        <div class="row">
            <strong>Belum Ada Data Nilai.</strong>
            <div class="form-group ml-auto mr-2">
                <a href="{{ route('resultbyid.create', ['id' => $transaction->id]) }}" class="btn btn-success"><i class="nav-icon fas fa-plus mr-2"></i>Tambahkan Data Nilai</a>
            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                @foreach($results as $result)
                    Nama Peserta : {{ $transaction->participant->name }} <br>
                    Nilai : {{ $result->score }} <br>
                    Grade : {{ $result->grade }} <br>
                    Ukuran Jaket : {{ $result->jacket_size }} <br>
                    Nomor Sertifikat Skill : {{ $result->skillcertificate_number }} <br>
                    Tanggal Pengambilan Sertifikat Skill : {{ $result->skillcertificate_pickdate }} <br>
                    Nomor Sertifikat Kehadiran : {{ $result->attendancecertificate_number }} <br>
                    Tanggal Pengambilan Sertifikat Kehadiran : {{ $result->attendancecertificate_pickdate }} <br>
                    @if($result->photo)
                    Bukti Foto <br>
                    <img src="{{ asset('uploads/photo/'.$result->photo) }}" class="img-responsive m-2" style="object-fit: cover" width="100%" height="100%">
                    @else
                    <div class="text-bold">Bukti Foto Belum di Upload.</div>
                    @endif

                    <div class="text-center">
                        <a href="{{ route('resultbyid.edit', ['id' => $result->id]) }}" class="btn btn-md btn-info">
                            <span class="fas fa-pencil-alt"></span> Edit
                        </a>

                        <a href="" class="btn btn-md btn-danger"  data-toggle="modal" data-target="#modal-default">
                            <span class="fas fa-trash-alt"></span> Hapus
                        </a>

                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Konfirmasi</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Yakin Untuk Menghapus Item Ini?</p>
                                  <p class="text-bold">PERINGATAN! Data yang Sudah Dihapus Tidak Dapat Dikembalikan</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <button type="button" class="btn btn-success" data-dismiss="modal">
                                      <span class="fas fa-times mr-1"></span>
                                    Batalkan
                                  </button>
                                  <a href="{{ route('resultbyid.delete', ['id' => $result->id]) }}" class="btn btn btn-danger">
                                    <span class="fas fa-check mr-1"></span>
                                    Hapus
                                  </a>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection