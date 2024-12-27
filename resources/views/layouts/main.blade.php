<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Tugas</title>
    <!-- Menggunakan Bootstrap untuk mempercantik tampilan -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Style untuk memastikan footer berada di bawah */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Membuat halaman memiliki tinggi minimal 100vh */
        }

        .container {
            flex: 1; /* Membuat konten utama mengisi ruang yang tersedia */
            max-width: 100%; /* Memastikan konten mengisi lebar layar */
        }

        /* Style untuk box judul yang lebih lebar */
        .title-box {
            background: radial-gradient(circle, rgba(255, 255, 255, 0.9) 40%, rgba(106, 17, 203, 0.6) 100%);
            color: #000000;
            padding: 50px; /* Menambah padding agar box lebih besar */
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin-bottom: 30px;
            width: 100%; /* Agar box mengisi lebar layar */
            box-sizing: border-box; /* Menjamin padding dan margin dihitung dalam lebar elemen */
        }

        /* Navbar yang lebih lebar */
        nav {
            background-color: #dfd7e7;
            border-radius: 5px;
            padding: 15px 20px; /* Menambah padding agar navbar lebih lebar */
            margin-bottom: 30px;
            width: 100%; /* Agar navbar mengisi lebar layar */
            box-sizing: border-box;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #000000;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.3);
            color: #6a11cb;
        }

        /* Styling untuk footer */
        footer {
            background-color: rgba(123, 52, 199, 0.8);
            color: #ffffff;
            text-align: center;
            padding: 30px;
            margin-top: auto; /* Footer selalu di bawah */
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="title-box">Selamat Datang di Website Sederhana</h1>
        
        <!-- Menampilkan pesan jika ada session success -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Navbar -->
        <header>
            <nav>
                <ul>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/about') }}">Tentang</a></li>
                    <li><a href="{{ url('/contact') }}">Kontak</a></li>
                </ul>
            </nav>
        </header>
        
        <!-- Konten Dinamis -->
        @yield('content')
    </div>
    
    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Website Sederhana. Semua hak dilindungi.</p>
    </footer>

    <!-- Bootstrap JS dan dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
