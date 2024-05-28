<?php

namespace App\Http\Controllers;
use App\Models\eskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Support\Facades\Storage;

class eskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eskul = eskul::latest()->paginate(5);
        return view('eskul.index', compact('eskul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eskul.create');
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
            'eskul' => 'required|min:2',
            'deskripsi' => 'required|min:2',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $eskul = new Eskul();
        $eskul->eskul = $request->eskul;
        $eskul->deskripsi = $request->deskripsi;

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/eskul', $image->hashName());
        $eskul->image = $image->hashName();
        $eskul->save();
        return redirect()->route('eskul.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eskul = Eskul::findOrFail($id);
        return view('eskul.show', compact('eskul'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eskul = Eskul::findOrFail($id);
        return view('eskul.edit', compact('eskul'));
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
            'eskul' => 'required|min:2',
            'deskripsi' => 'required|min:2',
        ]);

        $eskul = Eskul::findOrFail($id);
        $eskul->eskul = $request->eskul;
        $eskul->deskripsi = $request->deskripsi;

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/eskul', $image->hashName());
        //delete old image
        Storage::delete('public/eskul/' . $eskul->image);

        $eskul->image = $image->hashName();
        $eskul->save();
        return redirect()->route('eskul.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eskul = Eskul::findOrFail($id);
        Storage::delete('public/eskul/' . $eskul->image);
        $eskul->delete();
        return redirect()->route('eskul.index');
    }
}
