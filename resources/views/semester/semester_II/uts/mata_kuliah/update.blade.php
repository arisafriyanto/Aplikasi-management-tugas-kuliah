@extends('layouts.app')

@section('content')
    
<section class="section">
    <div class="section-header">
      <h1>Update Uts {{ $mata_kuliah->mata_kuliah }}</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a class="text-info" href="/">Dashboard</a></div>
        <div class="breadcrumb-item"><a class="text-info" href="{{ route('semester_II') }}">Semester II</a></div>
        <div class="breadcrumb-item"><a class="text-info" href="{{ route('semester_II.uts') }}">Uts</a></div>
        <div class="breadcrumb-item">Update</div>
      </div>
    </div>

    <div class="section-body">                
        <div class="card">
            
            <div class="card-header">
                <h4 class="text-info"><i class="fas fa-edit"></i> Update Uts</h4>
            </div>

            <form method="POST" action="/semester_II/uts/{{$mata_kuliah->id}}/edit/{{$uts->id}}" novalidate enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="card-body">

                    <div class="row">

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>Uts</label>

                            <input type="text" class="form-control @error('uts') is-invalid @enderror" name="uts" value="{{ old('uts') ?? $uts->uts }}" required="" autofocus>
                            
                            @error('uts')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>Tanggal Awal</label>

                            <input type="date" class="form-control @error('tanggal_awal') is-invalid @enderror" name="tanggal_awal" value="{{ old('tanggal_awal') ?? $uts->tanggal_awal }}" required="" autofocus>
                            
                            @error('tanggal_awal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>Tanggal Akhir</label>

                            <input type="date" class="form-control @error('tanggal_akhir') is-invalid @enderror" name="tanggal_akhir" value="{{ old('tanggal_akhir') ?? $uts->tanggal_akhir }}" required="" autofocus>
                            
                            @error('tanggal_akhir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>File uts</label>

                            <input type="file" class="form-control @error('file_uts') is-invalid @enderror" name="file_uts" value="{{ old('file_uts') }}" autofocus>

                            @error('file_uts')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>Keterangan uts</label>

                            <textarea name="keterangan_uts" class="form-control @error('keterangan_uts') is-invalid @enderror" required="">{{ old('keterangan_uts') ?? $uts->keterangan_uts }}</textarea>
                            
                            @error('keterangan_uts')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                    </div>
                </div>

                <div class="card-footer text-left">
                    <a href="/semester_II/uts/{{ $mata_kuliah->id }}/show/{{ $uts->id }}" class="btn btn-warning"><i class="fas fa-backward"></i> Back</a>
                    <button type="submit" class="btn btn-info"><i class="fas fa-paper-plane"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
