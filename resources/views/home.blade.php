@extends('layouts.app')

@section('content')

<section class="section">
      
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="row">

      @if(auth()->user()->hasRole('admin'))

          <a href="/" class="text-dark">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2 card-success">
                <div class="card-stats">
                  <div class="card-stats-title">Dashboard
                  </div>
                </div>
                <div class="card-icon shadow-success bg-success">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <a href="/"><h4>Detail</h4></a>
                  </div>
                  <div class="card-body">
                    {{-- {{ $semester_I->count() }} --}}
                  </div>
                </div>
              </div>
            </div>
          </a>


          <a href="/users" class="text-dark">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2 card-info">
                <div class="card-stats">
                  <div class="card-stats-title">Users
                  </div>
                </div>
                <div class="card-icon shadow-info bg-info">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <a href="/users"><h4>Detail</h4></a>
                  </div>
                  <div class="card-body">
                    {{-- {{ $semester_I->count() }} --}}
                  </div>
                </div>
              </div>
            </div>
          </a>

          <a href="/account/{{ auth()->user()->id }}" class="text-dark">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2 card-danger">
                <div class="card-stats">
                  <div class="card-stats-title">Account
                  </div>
                </div>
                <div class="card-icon shadow-danger bg-danger">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <a href="/account/{{ auth()->user()->id }}"><h4>Detail</h4></a>
                  </div>
                  <div class="card-body">
                    {{-- {{ $semester_I->count() }} --}}
                  </div>
                </div>
              </div>
            </div>
          </a>

      @else

      <a href="{{ route('semester_I') }}" class="text-dark">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-statistic-2 card-success">
            <div class="card-stats">
              <div class="card-stats-title">Semester I
              </div>
            </div>
            <div class="card-icon shadow-success bg-success">
              <i class="fas fa-archive"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <a href="{{ route('semester_I') }}"><h4>Total Data</h4></a>
              </div>
              <div class="card-body">
                {{ $semester_I->count() }}
              </div>
            </div>
          </div>
        </div>
      </a>

      <a href="{{ route('semester_II') }}" class="text-dark">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-statistic-2 card-info">
            <div class="card-stats">
              <div class="card-stats-title">Semester II
              </div>
            </div>
            <div class="card-icon shadow-info bg-info">
              <i class="fas fa-archive"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <a href="{{ route('semester_II') }}"><h4>Total Data</h4></a>
              </div>
              <div class="card-body">
                {{ $semester_II->count() }}
              </div>
            </div>
          </div>
        </div>
      </a>

      <a href="{{ route('semester_III') }}" class="text-dark">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-statistic-2 card-danger">
            <div class="card-stats">
              <div class="card-stats-title">Semester III
              </div>
            </div>
            <div class="card-icon shadow-danger bg-danger">
              <i class="fas fa-archive"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <a href="{{ route('semester_III') }}"><h4>Total Data</h4></a>
              </div>
              <div class="card-body">
                {{ $semester_III->count() }}
              </div>
            </div>
          </div>
        </div>
      </a>
      
      <a href="{{ route('semester_IV') }}" class="text-dark">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-statistic-2 card-success">
            <div class="card-stats">
              <div class="card-stats-title">Semester IV
              </div>
            </div>
            <div class="card-icon shadow-success bg-success">
              <i class="fas fa-archive"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <a href="{{ route('semester_IV') }}"><h4>Total Data</h4></a>
              </div>
              <div class="card-body">
                {{ $semester_IV->count() }}
              </div>
            </div>
          </div>
        </div>
      </a>

      <a href="{{ route('semester_V') }}" class="text-dark">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-statistic-2 card-info">
            <div class="card-stats">
              <div class="card-stats-title">Semester V
              </div>
            </div>
            <div class="card-icon shadow-info bg-info">
              <i class="fas fa-archive"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <a href="{{ route('semester_V') }}"><h4>Total Data</h4></a>
              </div>
              <div class="card-body">
                {{ $semester_V->count() }}
              </div>
            </div>
          </div>
        </div>
      </a>

      <a href="{{ route('semester_VI') }}" class="text-dark">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2 card-danger">
          <div class="card-stats">
            <div class="card-stats-title">Semester VI
            </div>
          </div>
          <div class="card-icon shadow-danger bg-danger">
            <i class="fas fa-archive"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <a href="{{ route('semester_VI') }}"><h4>Total Data</h4></a>
            </div>
            <div class="card-body">
              {{ $semester_VI->count() }}
            </div>
          </div>
        </div>
      </div>
      </a>


      <a href="{{ route('semester_VII') }}" class="text-dark">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-statistic-2 card-success">
            <div class="card-stats">
              <div class="card-stats-title">Semester VII
              </div>
            </div>
            <div class="card-icon shadow-success bg-success">
              <i class="fas fa-archive"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <a href="{{ route('semester_VII') }}"><h4>Total Data</h4></a>
              </div>
              <div class="card-body">
                {{ $semester_VII->count() }}
              </div>
            </div>
          </div>
        </div>
      </a>

      <a href="{{ route('semester_VIII') }}" class="text-dark">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-statistic-2 card-info">
            <div class="card-stats">
              <div class="card-stats-title">Semester VIII
              </div>
            </div>
            <div class="card-icon shadow-info bg-info">
              <i class="fas fa-archive"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <a href="{{ route('semester_VIII') }}"><h4>Total Data</h4></a>
              </div>
              <div class="card-body">
                {{ $semester_VIII->count() }}
              </div>
            </div>
          </div>
        </div>
      </a>
      
      @endif







    </div>

  </section>
@endsection