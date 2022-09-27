@extends('layouts.app')

@section('content')

<section class="section">

    <div class="section-header">
        <h1>Tugas {{ $mata_kuliah->mata_kuliah }}</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a class="text-info" href="/">Dashboard</a></div>
          <div class="breadcrumb-item"><a class="text-info" href="{{ route('semester_V') }}">Semester V</a></div>
          <div class="breadcrumb-item"><a class="text-info" href="{{ route('semester_V.tugas') }}">Tugas</a></div>
        </div>
    </div>

    @include('alert')
    
    <div class="row">

    @foreach ($mata_kuliah->tugas as $task)

    @if($task->status === 'selesai')

    <a href="/semester_V/tugas/{{$mata_kuliah->id}}/show/{{$task->id}}" class="text-success">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2 card-success">
            <div class="card-stats">
                <div class="card-stats-title">{{ $task->tugas }}
                </div>
            </div>

            <div class="ml-4 text-success">
                Selesai
            </div>

            <div class="card-icon shadow-success bg-success">
                <i class="fas fa-book"></i>
            </div>

            
            <div class="card-wrap">
                <div class="card-header">
                <a href="/semester_V/tugas/{{$mata_kuliah->id}}/show/{{$task->id}}">
                    <h4>Keterangan Tugas</h4>
                </a>
                </div>
                <div style="font-size: 13px; color: gray;">
                    {{ Str::limit($task->keterangan_tugas, 33) }}
                </div>
            </div>

            </div>
        </div>
    </a>
    
    @else

    <a href="/semester_V/tugas/{{$mata_kuliah->id}}/show/{{$task->id}}" class="text-danger">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2 card-danger">
            <div class="card-stats">
                <div class="card-stats-title">{{ $task->tugas }}
                </div>
            </div>

            <div class="ml-4" style="color: red;">

                @if(date('d m Y') > date('d m Y', strtotime($task->tanggal_akhir)))

                Tidak Mengerjakan!

                @else

                Deadline : {{ date('d M Y', strtotime($task->tanggal_awal)) }} - {{ date('d M Y', strtotime($task->tanggal_akhir)) }}

                @endif

            </div>

            <div class="card-icon shadow-danger bg-danger">
                <i class="fas fa-book"></i>
            </div>

            
            <div class="card-wrap">
                <div class="card-header">
                <a href="/semester_V/tugas/{{$mata_kuliah->id}}/show/{{$task->id}}">
                    <h4>Keterangan Tugas</h4>
                </a>
                </div>
                <div style="font-size: 13px; color: gray;">
                    {{ Str::limit($task->keterangan_tugas, 33) }}
                </div>
            </div>

            </div>
        </div>
    </a>

    @endif

    @endforeach
      
    </div>
    
    <div class="">
        <a href="{{ route('semester_V.tugas.mata_kuliah.create', $mata_kuliah->id) }}" class="btn mr-2 mb-2 btn-info">
            <i class="fas fa-plus"></i> Tambah Tugas
        </a>
    </div>

  </section>
@endsection
