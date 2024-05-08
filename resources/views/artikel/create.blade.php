@section('title', 'Buat Artikel')
@extends('layout.master')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="/artikel" class="btn btn-primary">Kembali</a>
                        <h3 class="card-title">Buat Artikel Baru</h3>
                        <form action="{{ route('artikel.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label for="gambar" class="font-weight-bold">GAMBAR</label>
                                <input type="file" name="gambar" value="{{ old('gambar')}}" class="form-control @error('gambar') is-invalid @enderror">
                                @error('gambar')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="judul" class="font-weight-bold">JUDUL</label>
                                <input type="text" name="judul" value="{{ old('judul')}}" class="form-control @error('judul') is-invalid @enderror">
                                @error('gambar')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi" class="font-weight-bold">DESKRIPSI</label>
                                <textarea name="deskripsi" rows="5" placeholder="Masukkan Deskripsi Artikel" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi')}}</textarea>
                                @error('deskripsi')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection