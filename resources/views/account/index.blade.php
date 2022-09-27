@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Account</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a class="text-info" href="/">Dashboard</a></div>
            <div class="breadcrumb-item">Account</div>
        </div>
    </div>

    @include('alert')
              

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="/img/avatar/avatar-3.png" class="rounded-circle profile-widget-picture"  data-toggle="tooltip" title="{{ $account->name }}">
                    </div>
                    <div class="profile-widget-description pb-0">
                        <div class="profile-widget-name">
                            {{ $account->name }}
                            <div class="text-muted d-inline font-weight-normal">
                                <div class="slash"></div>
                                @if(auth()->user()->hasRole('admin'))
                                    Admin
                                @else
                                    Mahasiswa
                                @endif
                            </div>
                        </div>

                        <p>
                            Selamat datang, {{ $account->name }} di aplikasi manajemen tugas ini. Aplikasi manajemen tugas adalah aplikasi yang berguna untuk mempermudah mahasiswa dalam mengelola tugasnya dimasa pandemi covid-19 ini dan seuluruh data disimpan di server cloud.
                        </p>
                    </div>
                    <div class="card-footer text-center pt-0">
                        <div class="font-weight-bold mb-2 text-small">~Semangat Kuliah!~</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-lg-7">
            <div class="card">
                <form method="POST" action="{{ route('account.edit', $account->id) }}" novalidate>
                    @csrf
                    @method('PATCH')
                    <div class="card-header">
                        <h4 class="text-info"><i class="fas fa-user-edit"></i> Update Account</h4>
                    </div>
    
                    <div class="card-body">
    
                        <div class="row">
    
                            <div class="form-group col-12 col-md-12 col-lg-12">
                                <label>Name</label>

                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $account->name }}" required="" autofocus>
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    
                            </div>
    
                            <div class="form-group col-12 col-md-12 col-lg-12">
                                <label>Username</label>
    
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') ?? $account->username }}" required="" autofocus>
                                
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    
                            </div>
    
                            <div class="form-group col-12 col-md-12 col-lg-12">
                                <label>E-mail Address</label>
    
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $account->email }}" required="" autofocus>
                                
                                @error('email')
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
                        <button type="submit" class="btn btn-info"><i class="fas fa-paper-plane"></i> Save</button>
                    </div>
                </form>
            </div>
            </div>

        </div>
    </div>
</section>

@endsection