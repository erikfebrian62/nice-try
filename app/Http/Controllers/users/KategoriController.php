<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorie;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Categorie::orderBy('kategori', 'asc')->paginate(1);
        return view('users.kategori.index', [ 'title' => 'Categori'], compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.kategori.create', [ 'title' => 'Categori']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'kategori' => 'required|unique:categories,kategori,except,id'
        ]);
        
        $data = [
            'kategori' => $request->kategori
        ];

        Categorie::create($data);

        return redirect()->route('kategori.index')->with('cbt', 'Categori berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Categorie::findOrFail($id);
        return view('users.kategori.edit', ['title' => 'Categori'], compact('data'));
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
        $data = Categorie::findOrFail($id);

        $request->validate([
            'kategori' => 'required|unique:categories,kategori,'
        ]);

        $data->kategori = $request->kategori;
        $data->save();

        return redirect()->route('kategori.index')->with('cbu', 'Categori berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Categorie::findOrFail($id);

        $data->delete();
        
        return back()->with('cbh', 'Categori berhasil dihapus.');
    }
}
