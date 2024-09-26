@extends('layouts.main')
@section('tittle', 'Profile')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card mt-5">
                <div class="card-header">
                    <h3>Profile Anda</h3>
                </div>
                <div class="card-body">
                    @foreach ($user as $u)
                    <div class="form-group row mb-2">
                        <label for="name" class="col-sm-4 col-form-label faded-label" style="font-style: italic;">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" value="{{ $u->name }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="role" class="col-sm-4 col-form-label faded-label" style="font-style: italic;">Role</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="role" value="{{ $u->role }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="company_name" class="col-sm-4 col-form-label faded-label" style="font-style: italic;">Nama Perusahaan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="company_name" value="{{ $u->company_name }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="address" class="col-sm-4 col-form-label faded-label" style="font-style: italic;">Alamat</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address" value="{{ $u->address }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="contact" class="col-sm-4 col-form-label faded-label" style="font-style: italic;">Kontak</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="contact" value="{{ $u->contact }}" readonly>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="" class="btn btn-secondary" data-toggle="modal" data-target=".akunSet{{ $u->id }}">Ubah Password</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@foreach ($user as $u)
<div class="modal fade akunSet{{ $u->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    @csrf
                    <div class="form-group row text-dark">
                        <label for="current_password" class="col-md-4 col-form-label text-md-right">Password Lama</label>
                        <div class="col-md-6">
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" autocomplete="current-password">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row text-dark">
                        <label for="new_password" class="col-md-4 col-form-label text-md-right">Password Baru</label>
                        <div class="col-md-6">
                            <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" autocomplete="new-password">
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row text-dark">
                        <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">Konfirmasi Password Baru</label>
                        <div class="col-md-6">
                            <input id="new_password_confirmation" type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation" autocomplete="new-password">
                            @error('new_password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-secondary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
