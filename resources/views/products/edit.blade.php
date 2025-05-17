@extends('layout_admin.layout')
@section('topbar-title', 'Menu Admin')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Upload Gambar Product -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Upload Gambar Product</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Deskripsi Product -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Deskripsi Product</label>
                                <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5" placeholder="Masukkan Deskripsi">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                                @error('deskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Nama Produk -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Produk</label>
                                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" value="{{ old('nama_produk', $product->nama_produk) }}">
                                @error('nama_produk')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Harga -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Harga</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga', $product->harga) }}">
                                @error('harga')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Stock -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Stock</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock', $product->stock) }}">
                                @error('stock')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Tombol Submit dan Cancel -->
                            <button type="submit" class="btn btn-md btn-primary me-3">Save</button>
                            <button type="button" onclick="history.back()" class="btn btn-md btn-danger me-3">Cancel</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk CKEditor -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
@endsection
