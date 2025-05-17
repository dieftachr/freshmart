@extends('layout_admin/layout')
@section('topbar-title', 'Menu Admin')

@section('content')
    <div class="card border-0 shadow-sm rounded">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Daftar Produk</h4>
                <a href="{{ route('products.create') }}" class="btn btn-md btn-success">+ Add Products</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle" id="nomor">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th style="width: 20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td class="text-center"></td>
                            <td class="text-center">
                                <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 100px; height: 100px; object-fit: cover;">
                            </td>
                            <td>{{ $product->nama_produk }}</td>
                            <td>{{ 'Rp. ' . number_format($product->harga, 2, ',', '.') }}</td>
                            <td>{{ $product->stock }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah anda yakin?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-dark">Detail</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-danger">Data Kosong.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <script>
                    const table = document.getElementById("nomor");
                    const rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

                    for (let i = 0; i < rows.length; i++) {
                        rows[i].getElementsByTagName("td")[0].textContent = i + 1;
                    }
                </script>
            </div>

            @if ($products->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->onEachSide(1)->links('layout_admin.pagination') }}
                </div>
            @endif
        </div>
    </div>

    {{-- pagination --}}
    <style>
        .pagination .page-link {
            color: #0d6efd;
            border-radius: 8px;
            margin: 0 3px;
        }

        .pagination .page-link:hover {
            background-color: #e9ecef;
        }

        .pagination .active .page-link {
            background-color: #0d6efd;
            color: white;
            border-color: #0d6efd;
        }
    </style>
@endsection
