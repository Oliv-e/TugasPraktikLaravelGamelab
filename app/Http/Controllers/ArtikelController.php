<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index(): View {
        $collection = Artikel::latest()->paginate(5);
        return view('artikel.index', compact('collection'));
    }

    public function create(): View {
        return view('artikel.create');
    }

    public function store(Request $request): RedirectResponse {
        $this->validate($request, [
            'gambar'=> 'required|image|mimes:jpeg,jpg,png|max:2048',
            'judul'=> 'required|min:5',
            'deskripsi'=> 'required|min:10'
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/artikels', $gambar->hashName());
        $buat = Artikel::create([
            'gambar'=> $gambar->hashName(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        
        return redirect()->route('artikel.index')->with('success','Artikel Berhasil Dibuat');
    }

    public function show($id): view {
        $is_artikel = Artikel::where('id', $id)->first();
        return view('artikel.show', compact('is_artikel'));
    }

    public function edit($id): View {
        $is_artikel = Artikel::findOrfail($id);
        return view('artikel.edit', compact('is_artikel'));
    }

    public function update(Request $request, $id): RedirectResponse {
        $validated_data = $request->validate([
            'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
            'judul'=> 'required|min:5',
            'deskripsi'=> 'required|min:10'
        ]);

        $artikel = Artikel::findOrFail($id);
        
        if($request->hasFile('gambar')){
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/artikels', $gambar->hashName());

            Storage::delete('public/artikels/'.$artikel->gambar);

            $artikel->update([
                'gambar' => $gambar->hashName(),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            $artikel->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        }
        
        return redirect()->route('artikel.index')->with('success','Artikel Berhasil Diedit');
    }

    public function destroy($id): RedirectResponse {
        $is_artikel = Artikel::where('id', $id)->first();
        $is_artikel->delete();
        return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
