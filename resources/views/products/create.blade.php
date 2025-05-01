<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
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
                            <button type="reset" class="btn btn-md btn-danger me-3">Cancel</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>   
<script>
    CKEDITOR.replace('description');
</script>
</body>
</html>