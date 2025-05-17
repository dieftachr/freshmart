@extends('layout_admin.layout')
@section('topbar-title', 'Menu Admin')

@section('content')

<body style="background: #f9f9f9;">
    <div class="container mt-5 mb-5">
        <div class="row">
            <!-- Kolom Gambar Produk -->
            <div class="col-md-6 col-lg-5 mb-4 mb-md-0">
                <div class="card border-0 shadow-sm rounded h-100">
                    <img src="{{ asset('/storage/products/'.$product->image) }}" alt="{{ $product->nama_produk }}" class="card-img-top rounded" style="object-fit: cover; height: 100%; max-height: 310px;">
                </div>
            </div>

            <!-- Kolom Detail Produk -->
            <div class="col-md-6 col-lg-7">
                <div class="card border-0 shadow-sm rounded h-100 d-flex flex-column justify-content-between">
                    <div class="card-body">
                        <h2 class="card-title">{{ $product->nama_produk }}</h2>
                        <p class="h4 text-success">{{ "Rp. " . number_format($product->harga, 2, ',', '.') }}</p>
                        <hr />
                        
                        <div class="description mb-3">
                            <h5>Deskripsi</h5>
                            <p>{!! $product->deskripsi !!}</p>
                        </div>

                        <div class="stock-info mb-4">
                            <p><strong>Stock:</strong> {{ $product->stock }} tersedia</p>
                        </div>
                    </div>

                    <!-- Tombol Edit dan Back -->
                    <div class="row p-3 pt-0">
                        <div class="col-6 pe-2">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary w-100 py-2">Edit</a>
                        </div>
                        <div class="col-6 ps-2">
                            <button onclick="history.back()" class="btn btn-danger w-100 py-2">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
