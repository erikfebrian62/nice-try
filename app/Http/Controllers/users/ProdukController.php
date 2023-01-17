<?php

namespace App\Http\Controllers\users;

use App\Models\User;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $data = Product::where('user_id', Auth::user()->id)
        ->orderby('tanggal', 'desc')
        ->paginate(5);

        return view('users.produk.read', [ 'title' => 'kelola-produk'], compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categori = Categorie::all();
        return view('users.produk.create', [ 'title' => 'kelola produk'], compact('categori'));
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
            'tanggal' => $request->tanggal,
            'user_id' => $request->user_id,
            'kategori_id' => $request->kategori_id,
            'modal' => $request->modal,
            'barang' => $request->barang,
            'jumlah' => $request->jumlah,
            'harga_jual' => $request->harga_jual,
            'laba' => $request->laba,
        ];

        Product::create($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function generatePdf()
    {
        $data = Product::where('user_id', Auth::user()->id)-> paginate(10);

        $pdf = app('dompdf.wrapper');
        
        $pdf->loadView('users.laporan.days',compact('data'));
        
        return $pdf->download('listProduk.pdf');
        
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
        $categori = Categorie::all();
        return view('users.produk.edit', [ 'title' => 'kelola-produk'], compact('product', 'categori'));
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

        $data->tanggal = $request->tanggal;
        $data->user_id = $request->user_id;
        $data->kategori_id = $request->kategori_id;
        $data->modal = $request->modal;
        $data->barang = $request->barang;
        $data->jumlah = $request->jumlah;
        $data->harga_jual = $request->harga_jual;
        $data->laba = $request->laba;
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

    public function search(Request $request) 
    {

        $data = Product::where('tanggal', 'LIKE', '%'.$request->search_string.'%')
        ->orWhere('modal', 'LIKE', '%'.$request->search_string.'%')
        ->orWhere('barang', 'LIKE', '%'.$request->search_string.'%')
        ->orWhere('jumlah', 'LIKE', '%'.$request->search_string.'%')
        ->orWhere('harga_jual', 'LIKE', '%'.$request->search_string.'%')
        ->orWhere('laba', 'LIKE', '%'.$request->search_string.'%')
        ->orderBy('tanggal', 'desc')
        ->paginate(5);
        
        if($data->count() >= 1){
            return view('users.produk.read', ['title' => 'kelola-produk'], compact('data'))->render();
        }else{
            return response()->json([
                'status' => 'Nothing_found'
            ]);
        }

    }
}
