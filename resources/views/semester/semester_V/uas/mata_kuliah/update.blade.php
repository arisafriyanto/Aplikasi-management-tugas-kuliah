@extends('layouts.app')

@section('content')
    
<section class="section">
    <div class="section-header">
      <h1>Update Uas {{ $mata_kuliah->mata_kuliah }}</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a class="text-info" href="/">Dashboard</a></div>
        <div class="breadcrumb-item"><a class="text-info" href="{{ route('semester_V') }}">Semester V</a></div>
        <div class="breadcrumb-item"><a class="text-info" href="{{ route('semester_V.uas') }}">Uas</a></div>
        <div class="breadcrumb-item">Update</div>
      </div>
    </div>

    <div class="section-body">                
        <div class="card">
            
            <div class="card-header">
                <h4 class="text-info"><i class="fas fa-edit"></i> Update Uas</h4>
            </div>

            <form method="POST" action="/semester_V/uas/{{$mata_kuliah->id}}/edit/{{$uas->id}}" novalidate enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="card-body">

                    <div class="row">

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>Uas</label>

                            <input type="text" class="form-control @error('uas') is-invalid @enderror" name="uas" value="{{ old('uas') ?? $uas->uas }}" required="" autofocus>
                            
                            @error('uas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>Tanggal Awal</label>

                            <input type="date" class="form-control @error('tanggal_awal') is-invalid @enderror" name="tanggal_awal" value="{{ old('tanggal_awal') ?? $uas->tanggal_awal }}" required="" autofocus>
                            
                            @error('tanggal_awal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>Tanggal Akhir</label>

                            <input type="date" class="form-control @error('tanggal_akhir') is-invalid @enderror" name="tanggal_akhir" value="{{ old('tanggal_akhir') ?? $uas->tanggal_akhir }}" required="" autofocus>
                            
                            @error('tanggal_akhir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>File uas</label>

                            <input type="file" class="form-control @error('file_uas') is-invalid @enderror" name="file_uas" value="{{ old('file_uas') }}" autofocus>

                            @error('file_uas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>Keterangan uas</label>

                            <textarea name="keterangan_uas" class="form-control @error('keterangan_uas') is-invalid @enderror" required="">{{ old('keterangan_uas') ?? $uas->keterangan_uas }}</textarea>
                            
                            @error('keterangan_uas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                    </div>
                </div>

                <div class="card-footer text-left">
                    <a href="/semester_V/uas/{{ $mata_kuliah->id }}/show/{{ $uas->id }}" class="btn btn-warning"><i class="fas fa-backward"></i> Back</a>
                    <button type="submit" class="btn btn-info"><i class="fas fa-paper-plane"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
