@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Semester VII</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a class="text-info" href="/">Dashboard</a></div>
        <div class="breadcrumb-item">Semester VII</div>
      </div>
    </div>

    @include('alert')

    <div class="section-body">

        <div class="d-flex justify-content-between">

            <div class="">
                <a href="{{ route('semester_VII.create') }}" class="btn mr-2 mb-2 btn-info">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>

            <div class="dropdown">
                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-book"></i> Menu
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('semester_VII.materi') }}">Materi</a>
                    <a class="dropdown-item" href="{{ route('semester_VII.tugas') }}">Tugas</a>
                    <a class="dropdown-item" href="{{ route('semester_VII.uts') }}">UTS</a>
                    <a class="dropdown-item" href="{{ route('semester_VII.uas') }}">UAS</a>
                </div>
            </div>
    </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                    <table class="mb-0 table table-hover" id="dataTables">
                        <thead>
                        <tr style="text-align: center;">
                            <th scope="col">No.</th>
                            <th  style="text-align: left" scope="col">Mata Kuliah</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        
                        
                        <tbody>
                            
                            @if(!$semesters->count())
                                <tr>
                                    <td colspan="6" class="text-center">Mata Kuliah No Field!!</td>
                                </tr>
                            @else 

                            <?php $no = 1 ?>

                            @foreach($semesters as $semester)

                            @can('views', $semester)

                                <tr style="text-align: center;">
                                    <td>{{ $no++ }}</td>
                                    <td align="left">{{ $semester->mata_kuliah }}</td>
                                    <td>{{ $semester->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $semester->semester }}</td>
                                    <td>{{ $semester->keterangan }}</td>
                                    
                                    <td>
                                        <a href="/semester_VII/{{ $semester->id }}" class="btn btn-success  mb-2">
                                            <i class="fas fa-edit"></i> Update
                                        </a>      
                                        
                                        <button class="btn btn-danger btn-trash mb-2" data-id="{{ $semester->id }}" type="button" data-toggle="modal" data-target="#deleteModal">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>

                                    </td>
                                </tr>

                            @endcan

                            @endforeach
                            
                            @endif


                        </tbody>
                    </table>
                    </div>

                    </div>
                </div>

            </div>
        </div>
  </div>
</section>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Yakin Ingin Menghapus Data??</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>


        <div class="modal-body">
            <div class="text-dark">
                Semua Materi, Tugas, UTS, UAS akan hilang!!
            </div>
        </div>
        
        <div class="modal-body">
            <form id="form-delete" method="post" action="{{ route('semester_VII.delete') }}">
                @csrf
                @method('delete')
                <input type="hidden" name="id" id="input-id">
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-danger btn-delete" type="button">Ya, Hapus</button>
        </div>
</div>
</div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        $(function() {
            $('.btn-trash').click(function() {
                id = $(this).attr('data-id');
                $('#input-id').val(id);
                $('deleteModal').modal('show');
            });
            $('.btn-delete').click(function() {
                $('#form-delete').submit();
            });
        });
    </script>
@endsection