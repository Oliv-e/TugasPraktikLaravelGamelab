@section('title', 'Buat Artikel')
@extends('layout.master')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="/artikel" class="btn btn-primary">Kembali</a>
                    <h3 class="card-title">Edit Artikel</h3>
                    <form action="{{ route('artikel.update', $is_artikel->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="gambar" class="font-weight-bold">GAMBAR</label>
                            <input type="file" name="gambar" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="judul" class="font-weight-bold">JUDUL</label>
                            <input type="text" name="judul" value="{{$is_artikel->judul}}" class="form-control @error('judul') is-invalid @enderror">
                            @error('gambar')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi" class="font-weight-bold">DESKRIPSI</label>
                            <textarea name="deskripsi" rows="5" placeholder="Masukkan Deskripsi Artikel" class="form-control @error('deskripsi') is-invalid @enderror">{{$is_artikel->deskripsi}}</textarea>
                            @error('deskripsi')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('deskripsi');  
    </script>
@endsection