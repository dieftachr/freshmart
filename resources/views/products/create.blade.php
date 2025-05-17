@extends('layout_admin/layout')
@section('topbar-title', 'Menu Admin')

@section('content')
<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card-border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Upload Gambar Product</label>
                                <input type="file" name="image" id="" class="form-control @error('image') is-invalid @enderror">
                                <!-- tampilkan pesan error -->
                                @error('image')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Deskripsi Product</label>
                                <textarea name="deskripsi" id="" class="form-control @error('deskripsi') is-invalid @enderror" rows="5" placeholder="Masukan Deskripsi">{{ old('deskripsi') }}</textarea>
                                <!--pesan error-->
                                @error('deskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Produk</label>
                                <input type="text" class="form-control  @error('nama_produk') is-invalid @enderror" name="nama_produk" value="{{ old('nama_produk') }}" id="">
                                <!--pesan error-->
                                @error('nama_produk')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Harga</label>
                                <input type="number" class="form-control  @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" id="">
                                <!--pesan error-->
                                @error('harga')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Stock</label>
                                <input type="number" class="form-control  @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" id="">
                                <!--pesan error-->
                                @error('stock')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary me-3">Save</button>
                            <button type="reset" class="btn btn-md btn-danger me-3" onclick="history.back()" >Cancel</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</script>
<!-- Script untuk CKEditor -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('deskripsi');
    </script>
</body>
@endsection