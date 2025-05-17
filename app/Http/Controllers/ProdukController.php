<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProdukController extends Controller
{
    //
    public function index(): View
    {
        $products = Product::latest()->paginate(10);
        return view ('products.index', compact('products'));
    }

    //CREATE
    public function create(): view 
    {
        return view('products.create');
    }

    //simpan data ke db
    public function store(Request $request): RedirectResponse
    {
        //validasi input
        $request->validate([
            'image'       => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama_produk' => 'required|min:5',
            'deskripsi'   => 'required|min:10',
            'harga'       => 'required|numeric',
            'stock'       => 'required|numeric',
        ]);
        //upload image
        $image = $request->file('image');
        $image->storeAs('products', $image->hashName());
        //input ke db
        Product::create([
            'image'       => $image->hashName(),
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
            'stock'       => $request->stock,
        ]);
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    //detail produk
    public function show(string $id):  View
    {
        //ambil id produk
        $product = Product::findOrFail($id);
        //arahin ke tampilan view
        return view('products.show', compact('product'));
    }

    //edit
    public function edit(string $id): View
    {
        //ambil id produk
        $product = Product::findOrFail($id);
        //arahin ke tampilan view
        return view('products.edit', compact('product'));
    }
    //edit data di db
    public function update(Request $request, $id): RedirectResponse
    {
        //validasi input
        $request->validate([
            'image'       => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'nama_produk' => 'required|min:5',
            'deskripsi'   => 'required|min:10',
            'harga'       => 'required|numeric',
            'stock'       => 'required|numeric',
        ]);
        // get data by id
        $product = Product::findOrFail($id);
        if($request->hasFile('image'))
        {
            //hapus gambar lama
           Storage::delete('products/' .$product->image);
           //ganti yang baru
           //upload image
            $image = $request->file('image');
            $image->storeAs('products', $image->hashName());
            
            //edit sesuai input
            $product->update([
                'image'       => $image->hashName(),
                'nama_produk' => $request->nama_produk,
                'deskripsi'   => $request->deskripsi,
                'harga'       => $request->harga,
                'stock'       => $request->stock
            ]);
        } else{
            $product->update([
                'nama_produk' => $request->nama_produk,
                'deskripsi'   => $request->deskripsi,
                'harga'       => $request->harga,
                'stock'       => $request->stock
            ]);
        }
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Di Edit']);
    }

    //hapus data by id
    public function destroy($id): RedirectResponse
    {
        // get data by id
        $product = Product::findOrFail($id);
        //hapus gambar lama
        Storage::delete('products/' .$product->image);
        //hapus data product
        $product->delete();

        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Di Hapus']);
    }

}