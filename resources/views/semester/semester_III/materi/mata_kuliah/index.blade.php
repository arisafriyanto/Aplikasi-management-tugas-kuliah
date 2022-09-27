@extends('layouts.app')

@section('content')

<section class="section">

    <div class="section-header">
        <h1>Materi {{ $mata_kuliah->mata_kuliah }}</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a class="text-info" href="/">Dashboard</a></div>
          <div class="breadcrumb-item"><a class="text-info" href="{{ route('semester_III') }}">Semester III</a></div>
          <div class="breadcrumb-item"><a class="text-info" href="{{ route('semester_III.materi') }}">Materi</a></div>
        </div>
    </div>

    @include('alert')
    
    <div class="row">

        @foreach ($mata_kuliah->materis as $m)
                        
    <a href="/semester_III/materi/{{$mata_kuliah->id}}/show/{{$m->id}}" class="text-success">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2 card-success">
            <div class="card-stats">
                <div class="card-stats-title">{{ $m->materi }}
                </div>

            </div>
            <div class="card-icon shadow-success bg-success">
                <i class="fas fa-book"></i>
            </div>

            
            <div class="card-wrap">
                <div class="card-header">
                <a href="/semester_III/materi/{{$mata_kuliah->id}}/show/{{$m->id}}"><h4>Date : {{ $m->created_at->format('d M Y') }}</h4></a>
                </div>
                <div style="font-size: 13px; color: gray;">
                    {{ Str::limit($m->keterangan_materi, 33) }}
                </div>
            </div>

            </div>
        </div>
    </a>
    @endforeach
      
    </div>
    
    <div class="">
        <a href="{{ route('semester_III.materi.mata_kuliah.create', $mata_kuliah->id) }}" class="btn mr-2 mb-2 btn-info">
            <i class="fas fa-plus"></i> Tambah Materi
        </a>
    </div>

  </section>
@endsection
