<?php

namespace App\Http\Controllers;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Support\Facades\Storage;

class artikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::latest()->paginate(5);
        return view('artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validate form
         $this->validate($request, [
            'judul' => 'required|min:2',
            'deskripsi' => 'required|min:2',
            'tanggal' => 'required|min:2',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $artikel = new Artikel();
        $artikel->judul = $request->judul;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->tanggal = $request->tanggal;

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/artikel', $image->hashName());
        $artikel->image = $image->hashName();
        $artikel->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required|min:2',
            'deskripsi' => 'required|min:2',
            'tanggal' => 'required|min:2',
        ]);

        $artikel = artikel::findOrFail($id);
        $artikel->judul = $request->judul;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->tanggal = $request->tanggal;

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/artikel', $image->hashName());
        //delete old image
        Storage::delete('public/artikel/' . $artikel->image);

        $artikel->image = $image->hashName();
        $artikel->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = artikel::findOrFail($id);
        Storage::delete('public/artikel/' . $artikel->image);
        $artikel->delete();
        return redirect()->route('artikel.index');
    }
}
