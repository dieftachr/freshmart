<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Market - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding-top: 50px;   /* Ruang untuk header */
            background-color: #f8f9fa;
        }
        .header {
            background: #006600;
            color: white;
            height: 50px;
            line-height: 50px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            padding: 0 20px;
        }
        .sidebar {
            background: #669966;
            min-height: calc(100vh - 50px); /* tinggi layar dikurangi header */
            position: fixed;
            padding: 20px;
            color: white;
            width: 250px;
        }
        .sidebar a {
            color: white;
            display: block;
            margin: 10px 0;
            text-decoration: none;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .content-wrapper {
            display: flex;
        }
        .content {
            padding: 20px;
            margin-left: 250px; /* beri ruang sebesar sidebar */
            flex-grow: 1;
        }
        .footer {
            background: #006600;
            color: white;
            padding: 10px 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 250px; /* mulai dari setelah sidebar */
            width: calc(100% - 250px); /* sisakan ruang sidebar */
            height: 50px;
        }

    </style>
</head>
<body>
    <div class="header">
        <strong>Fresh Market</strong>
    </div>

    <div class="content-wrapper">
        <div class="sidebar">
            <h5>Menu Admin</h5>
            <a href="#">Dashboard</a>
            <a href="{{ route('products.index') }}">Products</a>
            <a href="#">Akun Pekerja</a>
            <a href="#">Pelanggan</a>
            <a href="#">Riwayat Pemesanan</a>
            <a href="#">Log out</a>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>

    <div class="footer">
        <p>Fresh Market | All Rights Reserved</p>
    </div>
</body>
</html>
