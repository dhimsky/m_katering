@extends('layouts.main')
@section('tittle', 'Menu')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Menu Katering</h4>
            </div>
            <div class="card-body">
                {{-- <form action="{{ route('merchant.menu') }}" method="GET">
                <div class="row mb-3">
                        <div class="col-md-3 mb-2">
                            <select id="menu" name="menu" class="form-control">
                                <option selected disabled value="" style="font-style: italic;">Semua Lokasi</option>
                                @foreach ($angkatan as $ta)
                                <option value="{{ $ta->id_angkatan }}">{{ $ta->tahun_angkatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-2">
                            <select id="prodi_id" name="prodi_id" class="form-control">
                                <option selected disabled value="" style="font-style: italic;">Semua Prodi</option>
                                @foreach ($prodi as $pr)
                                <option value="{{ $pr->id_prodi }}">{{ $pr->nama_prodi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button id="btnFilter" class="btn btn-whatsapp"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form> --}}
                
                <div class="table-responsive">
                    <table id="example" class="display text-dark" style="min-width: 845px">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>GAMBAR</th>
                                <th>NAMA MENU</th>
                                <th>HARGA</th>
                                <th>TIPE</th>
                                <th>LOKASI</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody class="table-bordered">
                            @foreach ($menu as $m)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($m->image)
                                    <a data-toggle="modal" data-target="#fotoMhs{{ $m->id }}">
                                        <img src="{{ asset('storage/images/' . $m->image) }}" alt="Foto Menu" class="img-fluid img-3x4 rounded" style="max-width: 50px;">
                                    </a>
                                    @else
                                    Foto tidak tersedia
                                    @endif
                                </td>                            
                                <td>{{ $m->name }}</td>
                                <td>{{ $m->price }}</td>
                                <td>{{ $m->type->name }}</td>
                                <td>{{ $m->location->name }}</td>
                                <td>
                                    @if (Auth::user()->role == 'merchant')
                                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editData{{ $m->id }}" title="Edit data">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('merchant.menu.destroy', $m->id) }}" method="POST" style="display: inline;" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="fa fa-trash btn btn-danger delete-confirm" title="Hapus data" onclick="confirmDelete(event, this)">
                                                Hapus
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </div>
                </table>
            </div>
        </div>
    </div>
</div>

@if (Auth::user()->role == 'merchant')
<button class="fa fa-plus wa_btn whatsapp" data-toggle="modal" data-target="#tambahMenu" title="Tambah mahasiswa"></button>
@endif

<div class="modal fade" id="tambahMenu">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Menu Makanan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('merchant.menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-2 ml-2 mr-2">
                        <div class="col-md-9">
                            <div class="form-group row mb-2">
                                <div class="col-sm-4 d-flex align-items-center">
                                    <label for="name" class="col-form-label faded-label required-label" >Nama</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan nama menu" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <div class="col-sm-4 d-flex align-items-center">
                                    <label for="price" class=" col-form-label faded-label required-label" >Harga</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Masukan harga menu" value="{{ old('price') }}">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="type_id" class="col-sm-4 col-form-label faded-label required-label" >Tipe</label>
                                <div class="col-sm-8">
                                    <select class="form-control @error('type_id') is-invalid @enderror" id="type_id" name="type_id" for="type_id">
                                        <option selected disabled value="" style="font-style: italic;">Pilih Tipe Makanan</option>
                                        @foreach ($type as $t)
                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                        @endforeach
                                    </select>          
                                    @error('type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="location_id" class="col-sm-4 col-form-label faded-label required-label" >Lokasi</label>
                                <div class="col-sm-8">
                                    <select class="form-control @error('location_id') is-invalid @enderror" id="location_id" name="location_id" for="location_id">
                                        <option selected disabled value="" style="font-style: italic;">Pilih Lokasi</option>
                                        @foreach ($location as $l)
                                        <option value="{{ $l->id }}">{{ $l->name }}</option>
                                        @endforeach
                                    </select>          
                                    @error('location_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <div class="col-sm-4 d-flex align-items-center">
                                    <label for="description" class="col-form-label faded-label required-label" >Deskripsi</label>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Masukan Deskripsi" value="{{ old('description') }}">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-2 ml-2 mr-2">
                        <div class="col-sm-6">
                            <div class="custom-file" onclick="triggerInputFile()">
                                <label class="custom-file-label" for="input_image" id="label_image">
                                        <p class="text-muted" id="uploaded-foto-label" style="display: none;"></p>
                                        <p class="text-muted" id="upload-foto-label">Pilih Gambar</p>
                                </label>
                                <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" accept=".jpg, .jpeg, .png" id="input_image" onchange="updateLabel(this)">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  
@endsection