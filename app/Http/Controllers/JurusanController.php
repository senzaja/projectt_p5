<?php

namespace App\Http\Controllers;
use App\Models\Jurusan;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage as FacadesStorage;
// use Illuminate\Support\Facades\Storage;

class jurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::latest()->paginate(5);
        return view('jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurusan.create');
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
            'nama_jurusan' => 'required|min:2',
        ]);

        $jurusan = new jurusan();
        $jurusan->nama_jurusan = $request->nama_jurusan;

        // // upload image
        // $image = $request->file('image');
        // $image->storeAs('public/jurusan', $image->hashName());
        // $jurusan->image = $image->hashName();
         $jurusan->save();
        return redirect()->route('jurusan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.show', compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
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
            'nama_jurusan' => 'required|min:2',
        ]);

        $jurusan = jurusan::findOrFail($id);
        $jurusan->nama_jurusan = $request->nama_jurusan;

        // upload image
        // $image = $request->file('image');
        // $image->storeAs('public/jurusan', $image->hashName());
        // //delete old image
        // Storage::delete('public/jurusan/' . $jurusan->image);

        // $jurusan->image = $image->hashName();
         $jurusan->save();
         return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusan = jurusan::findOrFail($id);
        $jurusan->delete();
        return redirect()->route('jurusan.index');
    }
}
