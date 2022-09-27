@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Users</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a class="text-info" href="/">Dashboard</a></div>
        <div class="breadcrumb-item">Users</div>
      </div>
    </div>

    @include('alert')

    <div class="section-body">

        <div class="d-flex justify-content-between">

            <div class="">
                <a href="{{ route('users.create') }}" class="btn mr-2 mb-2 btn-info">
                    <i class="fas fa-user-plus"></i> Tambah
                </a>
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
                            <th style="text-align: left" scope="col">Nama</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Level</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        
                        
                        <tbody> 

                            <?php $no = 1 ?>

                            @foreach($users as $user)

                                <tr style="text-align: center;">
                                    <td>{{ $no++ }}</td>
                                    <td align="left">{{ $user->name }}</td>
                                    <td>{{ $user->created_at->format('d M, Y') }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    @if($user->id == $user->hasRole('admin'))
                                    <td>admin</td>
                                    @else
                                    <td>user</td>
                                    @endif
                                    
                                    <td>
                                        <a href="/users/{{ $user->id }}" class="btn btn-success  mb-2">
                                            <i class="fas fa-user-edit"></i> Update
                                        </a>      
                                        
                                        <button class="btn btn-danger btn-trash mb-2" data-id="{{ $user->id }}" type="button" data-toggle="modal" data-target="#deleteModal">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>

                                    </td>
                                </tr>

                            @endforeach

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
                Jika User Dihapus!<br>
                Semua Materi, Tugas, UTS, UAS akan hilang!!
            </div>
        </div>
        
        <div class="modal-body">
            <form id="form-delete" method="post" action="{{ route('users.delete') }}">
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