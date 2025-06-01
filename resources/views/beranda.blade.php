<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Program Tengok Tetangga - MAN Bontang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>



</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Navbar -->
    <header class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-green-600">MAN Bontang</h1>
            <nav class="hidden md:flex space-x-6 items-center text-sm">
                <a href="#latar-belakang" class="hover:text-green-600 transition">Latar Belakang</a>
                <a href="#landasan" class="hover:text-green-600 transition">Landasan</a>
                <a href="#tujuan" class="hover:text-green-600 transition">Tujuan</a>
                <a href="/login" class="flex items-center gap-1 bg-green-600 text-white px-3 py-1.5 rounded hover:bg-green-700 transition">
                    <i data-feather="log-in" class="w-4 h-4"></i> Login
                </a>
                <a href="/register" class="flex items-center gap-1 border border-green-600 text-green-600 px-3 py-1.5 rounded hover:bg-green-600 hover:text-white transition">
                    <i data-feather="user-plus" class="w-4 h-4"></i> Register
                </a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="text-white py-64 text-center relative" style="background-image: linear-gradient(rgba(22, 101, 52, 0.7), rgba(22, 101, 52, 0.7)), url('{{ asset('storage/bg.jpeg') }}'); background-size: cover; background-position: center;">


        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg">Program "Tengok Tetangga"</h2>
            <p class="text-lg md:text-xl mb-6 drop-shadow-md">Menguatkan nilai sosial dan karakter Islami melalui aksi nyata di lingkungan sekitar.</p>
            <div class="flex justify-center gap-4">
                <a href="/login" class="bg-white text-green-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition flex items-center gap-2 shadow">
                    <i data-feather="log-in" class="w-5 h-5"></i> Masuk
                </a>
                <a href="/register" class="bg-green-700 px-6 py-2 rounded-lg font-semibold hover:bg-green-800 transition flex items-center gap-2 shadow">
                    <i data-feather="user-plus" class="w-5 h-5"></i> Daftar
                </a>
            </div>
        </div>
    </section>

    <!-- Latar Belakang -->
    <section id="latar-belakang" class="py-12 px-6 md:px-20 bg-white">
        <h3 class="text-2xl font-bold text-green-600 mb-4">A. Latar Belakang</h3>
        <p class="mb-4">Madrasah sebagai institusi pendidikan Islam memiliki tanggung jawab tidak hanya dalam aspek akademik, namun juga dalam membentuk karakter peserta didik yang berakhlak mulia, berjiwa sosial, dan cinta damai.</p>
        <p class="mb-4">Program "Tengok Tetangga" menjadi media pembelajaran kontekstual berbasis aksi sosial, yang juga mendukung semangat 100 Hari Kerja Wali Kota dan Wakil Wali Kota Bontang.</p>
    </section>

    <!-- Landasan -->
    <section id="landasan" class="bg-gray-100 py-12 px-6 md:px-20">
        <h3 class="text-2xl font-bold text-green-600 mb-6">B. Landasan Hukum dan Dasar Pemikiran</h3>
        <div class="mb-6">
            <h4 class="text-lg font-semibold mb-2">1. Landasan Hukum</h4>
            <ul class="list-disc list-inside text-gray-700 ml-4">
                <li>UU No. 20 Tahun 2003 tentang Sistem Pendidikan Nasional</li>
                <li>Permenag RI No. 90 Tahun 2013 tentang Penyelenggaraan Pendidikan Madrasah</li>
                <li>Keputusan Dirjen Pendis Kemenag RI tentang Implementasi Moderasi Beragama</li>
            </ul>
        </div>
        <div>
            <h4 class="text-lg font-semibold mb-2">2. Dasar Pemikiran</h4>
            <p class="mb-2">Berdasarkan Surah An-Nisa ayat 36–37:</p>
            <blockquote class="italic border-l-4 pl-4 border-green-600 text-gray-700 bg-white p-4 rounded shadow">
                "Sembahlah Allah dan janganlah kamu mempersekutukan-Nya dengan sesuatu apa pun..."
            </blockquote>
            <p class="mt-4">Program ini hadir untuk menghidupkan kembali nilai-nilai sosial seperti empati, gotong royong, dan kepedulian terhadap sesama.</p>
        </div>
    </section>

    <!-- Tujuan -->
    <section id="tujuan" class="py-12 px-6 md:px-20 bg-white">
        <h3 class="text-2xl font-bold text-green-600 mb-4">C. Tujuan Program</h3>
        <ul class="list-decimal list-inside ml-4 space-y-2 text-gray-700">
            <li>Menumbuhkan kesadaran siswa terhadap pentingnya memperhatikan kondisi tetangga.</li>
            <li>Mendorong pengamalan nilai tolong-menolong sebagai ajaran Islam dan Pancasila.</li>
            <li>Menjalin silaturahmi dan menciptakan suasana harmonis di tengah masyarakat.</li>
            <li>Membiasakan siswa untuk berempati, rendah hati, dan dermawan.</li>
            <li>Menjadi wadah pembelajaran sosial langsung bagi siswa madrasah.</li>
        </ul>
    </section>

    <!-- Footer -->
    <footer class="bg-green-600 text-white text-center py-6 mt-8">
        <p>&copy; 2025 MAN Bontang. Semua Hak Dilindungi.</p>
    </footer>

    <script>
        feather.replace();
    </script>
</body>

</html>