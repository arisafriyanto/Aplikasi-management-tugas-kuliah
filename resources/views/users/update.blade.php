@extends('layouts.app')

@section('content')
    
<section class="section">
    <div class="section-header">
      <h1>Update Users</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a class="text-info" href="/">Dashboard</a></div>
        <div class="breadcrumb-item"><a class="text-info" href="{{ route('users') }}">Users</a></div>
        <div class="breadcrumb-item">Update</div>
      </div>
    </div>

    <div class="section-body">                
        <div class="card">
            <form method="POST" action="{{ route('users.edit', $users->id) }}" novalidate>
                @csrf
                @method('PATCH')
                <div class="card-header">
                    <h4 class="text-info"><i class="fas fa-user-edit"></i> Update Users</h4>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>Name</label>

                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $users->name }}" required="" autofocus>
                            
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>Username</label>

                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') ?? $users->username }}" required="" autofocus>
                            
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-6">
                            <label>E-mail Address</label>

                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $users->email }}" required="" autofocus>
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-6">
                            <label>Hak Akses</label>

                            <select name="hak_akses" id="" class="form-control @error('hak_akses') is-invalid @enderror">
                                @if($users->id == $users->hasRole('admin'))
                                    <option value="admin">Admin</option>
                                @else
                                    <option value="user">User</option>
                                @endif
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            
                            @error('hak_akses')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-12">
                            <label>Old Password</label>

                            <input type="password" class="form-control @error('old-password') is-invalid @enderror" name="old-password" value="{{ old('old-password') }}" required="" autofocus>
                            
                            @error('old-password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-6">
                            <label>New Password</label>

                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required="" autofocus>
                            
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                        <div class="form-group col-12 col-md-12 col-lg-6">
                            <label>Confirm-Password</label>

                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" required="" autofocus>
                            
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>

                    </div>
                </div>

                <div class="card-footer text-left">
                    <a href="/users" class="btn btn-warning"><i class="fas fa-backward"></i> Back</a>
                    <button type="submit" class="btn btn-info"><i class="fas fa-paper-plane"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
