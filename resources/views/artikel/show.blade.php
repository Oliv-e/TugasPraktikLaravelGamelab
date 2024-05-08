@section('title', 'Artikel')
@extends('layout.master')
@section('content')
<a href="/artikel" class="btn btn-primary">Kembali</a>
<div class="d-flex flex-column pb-4 align-items-center justify-content-center">
    <img src="{{asset('storage/artikels/'.$is_artikel->gambar)}}" alt="Gambar Artikel" width="400px">
    <h1 class="text-uppercase fw-bold">{{$is_artikel->judul}}</h1>
</div>
<div class="container p-2">
    <p>{!! $is_artikel->deskripsi !!}</p>
</div>
@endsection