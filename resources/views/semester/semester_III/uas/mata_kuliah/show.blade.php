@extends('layouts.app')

@section('content')

<section class="section">

    <div class="section-header">
        <h1>Uas {{ $mata_kuliah->mata_kuliah }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a class="text-info" href="/">Dashboard</a></div>
            <div class="breadcrumb-item"><a class="text-info" href="{{ route('semester_III') }}">Semester III</a></div>
            <div class="breadcrumb-item"><a class="text-info" href="{{ route('semester_III.uas') }}">Uas</a></div>
        </div>
    </div>

@include('alert')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-statistic-2 card-success">
                
                <div class="card-stats">
                    <div class="card-stats-title">
                        <h4>{{ $uas->uas }}</h4>
                    </div>
                    
                    <div class="container">
                                <p class="ml-2">
                                    <a href="{{ route('semester_III.uas.mata_kuliah', $mata_kuliah->id) }}" class="text-dark">
                                        {{ $mata_kuliah->mata_kuliah }}
                                    </a> &middot;
                                    {{ $uas->created_at->format('d M Y') }}  
                                </p>

                        @if($uas->file_uas)
                            <div class="embed-responsive embed-responsive-4by3">
                                <iframe class="embed-responsive-item" src="{{ asset("/laraview/#../storage/$uas->file_uas") }}" allowfullscreen></iframe>
                            </div>

                            <div class="d-flex justify-content-center mt-1">
                                <a href="/semester_III/uas/{{$mata_kuliah->id}}/download/{{$uas->id}}" class="btn btn-success btn-sm">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        @else
                            <div class="ml-2">
                                Tidak Ada File Uas!
                            </div>
                        @endif

                    </div>
                </div>

                <div class="card-wrap">
                    <div style="font-size: 13px; color: gray;" class="card-body mb-2">
                        {{ $uas->keterangan_uas }}
                    </div>

                    <div class="card-footer">
                        
                        <button type="button" class="btn btn-danger btn-sm mr-1" data-toggle="modal" data-target="#deleteUas">
                            <i class="fas fa-trash"></i> Delete
                        </button>


                        <a href="/semester_III/uas/{{$mata_kuliah->id}}/update/{{$uas->id}}" class="btn btn-info btn-sm mr-1"><i class="fas fa-edit"></i> Update</a>


                        <a href="/semester_III/uas/{{$mata_kuliah->id}}/answer/{{$uas->id}}" class="btn btn-warning btn-sm mr-1"><i class="fas fa-upload"></i> Answer</a>

                    </div>

                </div>

            </div>
        </div>
    </div>

</section>

    <!-- Modal -->
<div class="modal fade" id="deleteUas" tabindex="-1" aria-labelledby="deleteUasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUasLabel">Yakin Ingin Menghapus Data??</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="text-dark">
                    Uas : {{ $uas->uas }}
                </div>

                <div class="mt-1">
                    Keterangan :  {{ \Str::limit($uas->keterangan_uas, 50) }}
                </div>
            </div>

            <form action="/semester_III/uas/{{$mata_kuliah->id}}/delete/{{$uas->id}}" method="post"> 
                @method('delete')
                @csrf
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Ya, Hapus!</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Tidak!!</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
