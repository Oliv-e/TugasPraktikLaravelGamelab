@section('title', 'Artikel')
@extends('layout.master')
@section('content')
    <div class="d-flex flex-column pb-4 align-items-center justify-content-center">
        <h1>Daftar Artikel Gamelab</h1>
        <a href="#">Gamelab Indonesia</a>
    </div>
    <form action="{{ route('artikel.create')}}" class="my-2">
        <button type="submit" class="btn btn-primary">Buat Artikel Baru</button>
    </form>
    {{-- Table --}}
    <table class="table table-bordered">
        <thead class="bg-primary text-white">
            <tr>
                <th class="text-center">Gambar</th>
                <th class="text-center">Judul</th>
                <th class="text-center">Deskripsi</th>
                <th class="text-center w-25">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collection as $item)
            <tr>
                <td class="text-center align-middle" style="width: 200px">
                    <img src="{{ asset('storage/artikels/'. $item->gambar) }}" class="img-fluid rounded" alt="Gambar Artikel">
                </td>
                <td class="text-center align-middle">{{ $item->judul }}</td>
                <td class="text-center align-middle">{!! $item->deskripsi !!}</td>
                <td class="text-center align-middle">
                    <form action="{{ route('artikel.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm bi bi-trash color-white"></button>
                    </form>
                    <a href="{{ route('artikel.edit', $item->id) }}" class="btn btn-warning btn-sm mx-1 bi bi-pencil-square text-white"></a>
                    <a href="{{ route('artikel.show', $item->id) }}" class="btn btn-secondary btn-sm bi bi-display text-white"></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        console.log("aowkaowk");
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
@endsection