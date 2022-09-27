@extends('layouts.app')

@section('content')

<section class="section">

    <div class="section-header">
        <h1>Tugas</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a class="text-info" href="/">Dashboard</a></div>
          <div class="breadcrumb-item"><a class="text-info" href="{{ route('semester_VIII') }}">Semester VIII</a></div>
          <div class="breadcrumb-item">Tugas</div>
        </div>
    </div>
    
    <div class="row">

        @foreach ($semesters as $semester)

            @can('views', $semester)
            
            <a href="{{ route('semester_VIII.tugas.mata_kuliah', $semester->id) }}" class="text-success">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2 card-success">
                    <div class="card-stats">
                        <div class="card-stats-title">{{ $semester->mata_kuliah }}
                        </div>
                    </div>
                    <div class="card-icon shadow-success bg-success">
                        <i class="fas fa-book"></i>
                    </div>

                    <div class="card-wrap">
                        <div class="card-header">
                        <a href="{{ route('semester_VIII.tugas.mata_kuliah', $semester->id) }}"><h4>Total Tugas</h4></a>
                        </div>
                        <div class="card-body">

                            {{ $semester->tugas->count() }}
                                
                        </div>
                    </div>

                    </div>
                </div>
            </a>

            @endcan

        @endforeach

      
    </div>
    
  </section>
@endsection
