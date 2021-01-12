@extends('layouts.app')

@section('header') List Semua Jadwal Kelas @endsection

@section('content')

    <div class="card">
        <div class="card-header text-danger text-bold">Informasi Penting</div>
        <div class="card-body">
            <ul>
                <li>Data yang ada di halaman ini diambil dari menu <a href="{{ route('programs') }}">Batch Program</a>.
                <li>Apabila kolom Nama Coach berisi <span class="text-bold text-danger">'Belum Ada Coach!'</span>, maka coach belum dipilih untuk kelas tersebut.</li>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table id="table" class="table table-hover table-bordered">
                <thead>
                    <th class="text-center">
                        Nama Program
                    </th>
                    <th class="text-center">
                        Kategori Program
                    </th>
                    <th class="text-center"> 
                        Nama Coach
                    </th>
                    <th class="text-center"> 
                        Tanggal Batch
                    </th>
                    <th class="text-center"> 
                        Lokasi Kelas
                    </th>
                    <th class="text-center"> 
                        Lihat Detail Kelas
                    </th>
                    <th class="text-center">
                        Edit
                    </th>
                </thead>
        
                <tbody>
                    @if($programs->count() > 0)
                        @foreach ($programs as $p)
                                <tr>
                                    <td>
                                        {{ $p->programname->name }}
                                    </td>
                                    <td>
                                        {{ $p->programcategory->name }}
                                    </td>
                                    <td>
                                        @php
                                        $c = $p->coaches->count();
                                        $a = 0;
                                        @endphp
                                        @if($c == 1)
                                            @foreach($p->coaches as $coach)
                                                {{ $coach->name }}
                                            @endforeach
                                        @elseif($p->coaches->count() > 1)
                                            @foreach($p->coaches as $coach)
                                                @if(++$a == $c)
                                                    {{ $coach->name }}
                                                @else
                                                    {{ $coach->name }},
                                                @endif 
                                            @endforeach
                                        @else
                                            <div class="text-bold text-danger">'Belum Ada Coach!'</div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $p->date }}
                                    </td>
                                    <td class="text-center">
                                        {{ $p->branch->name }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('coachprogram.detail', ['id'=> $p->id]) }}" class="btn btn-xs btn-success">
                                            <span class="far fa-eye"></span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('coachprogram.edit', ['id'=> $p->id]) }}" class="btn btn-xs btn-info">
                                            <span class="fas fa-pencil-alt"></span>
                                        </a>
                                    </td>
                                </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="6" class="text-center">Tidak ada jadwal kelas yang tersedia, tambahkan jadwal kelas baru.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection