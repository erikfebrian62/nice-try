<?php

namespace App\Http\Controllers\users;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('users.produk.index', [ 'title' => 'kelola-produk']);
    }
    
    public function read(Request $request)
    {
        $data = Product::where('user_id', Auth::user()->id)->get();
        return view('users.produk.read', [ 'title' => 'kelola-produk'], compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.produk.create', [ 'title' => 'kelola produk']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = [
            'user_id' => $request->user_id,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga_modal' => $request->harga_modal
        ];

        Product::create($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::findOrFail($id);
        return view('users.produk.edit', [ 'title' => 'kelola-produk'], compact('data'));
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
        $data = Product::findOrFail($id);

        $data->user_id = $request->user_id;
        $data->nama_barang = $request->nama_barang;
        $data->kategori = $request->kategori;
        $data->stok = $request->stok;
        $data->harga_modal = $request->harga_modal;
        
        $data->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
    }
}
