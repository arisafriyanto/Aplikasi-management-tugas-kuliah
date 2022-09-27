@extends('layouts.app')

@section('content')
    
<section class="section">
    <div class="section-header">
      <h1>Update Materi {{ $mata_kuliah->mata_kuliah }}</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a class="text-info" href="/">Dashboard</a></div>
        <div class="breadcrumb-item"><a class="text-info" href="{{ route('semester_IV') }}">Semester IV</a></div>
        <div class="breadcrumb-item"><a class="text-info" href="{{ route('semester_IV.materi') }}">Materi</a></div>
        <div class="breadcrumb-item">Update</div>
      </div>
    </div>

    <div class="section-body">                
        <div class="card">
            
            <div class="card-header">
                <h4 class="text-info"><i class="fas fa-edit"></i> Update Materi</h4>
            </div>

            <form method="POST" action="/semester_IV/materi/{{$mata_kuliah->id}}/edit/{{$materis->id}}" novalidate enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="card-body">

                    <div class="row">

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>Materi</label>

                            <input type="text" class="form-control @error('materi') is-invalid @enderror" name="materi" value="{{ old('materi') ?? $materis->materi }}" required="" autofocus>
                            
                            @error('materi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>File Materi</label>

                            <input type="file" class="form-control @error('file_materi') is-invalid @enderror" name="file_materi" value="{{ old('file_materi') }}" required="" autofocus>
                            
                            @error('file_materi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>Keterangan Materi</label>

                            <textarea name="keterangan_materi" class="form-control @error('keterangan_materi') is-invalid @enderror" required="">{{ old('keterangan_materi') ?? $materis->keterangan_materi }}</textarea>
                            
                            @error('keterangan_materi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                    </div>
                </div>

                <div class="card-footer text-left">
                    <a href="/semester_IV/materi/{{ $mata_kuliah->id }}/show/{{ $materis->id }}" class="btn btn-warning"><i class="fas fa-backward"></i> Back</a>
                    <button type="submit" class="btn btn-info"><i class="fas fa-paper-plane"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
