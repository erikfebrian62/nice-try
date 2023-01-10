<?php

namespace App\Http\Controllers\users;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')) {
            $product = Product::where('nama_barang', 'LIKE', '%' .$request->search. '%')
            ->orWhere('kategori', 'LIKE', '%' .$request->search. '%')
            ->orWhere('harga_modal', 'LIKE', '%' .$request->search. '%')->paginate(15)->appends($request->all());
        }else{
            $product = Product::orderBy('nama_barang', 'asc')->paginate(15);
        }
        return view('users.produk.index', ['title' => 'Kelola-Produk'], compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.produk.create',['title' => 'Tambah-data']);
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
            'user_id' => 'required',
            'nama_barang' => 'required|min:3|max:255',
            'kategori' => 'required|min:3|max:255',
            'stok' => 'required',
            'harga_modal' => 'required'
        ]);

       
        Product::create([
            'user_id' => $request->user_id,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga_modal' => $request->harga_modal
        ]);

        return redirect(route('produk.index'))->with('success','Data berhasil ditambah');
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
        $product = Product::findOrFail($id);
        return view('users.produk.edit', [ 'title' => 'Edit-data'], compact('product'));
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
        $request->validate([
            'user_id' => 'required',
            'nama_barang' => 'required|min:3|max:255',
            'kategori' => 'required|min:3|max:255',
            'stok' => 'required',
            'harga_modal' => 'required'
        ]);

       
        Product::create([
            'user_id' => $request->user_id,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga_modal' => $request->harga_modal
        ]);

        return redirect(route('produk.index'))->with('success','Data berhasil dirubah ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();
    }
}
