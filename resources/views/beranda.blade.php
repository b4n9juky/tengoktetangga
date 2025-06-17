@php use Illuminate\Support\Facades\Auth; @endphp
@php use App\Enums\UserRole; @endphp

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Program Tengok Tetangga - MAN Bontang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>



</head>

<body class="bg-secondary text-gray-800 font-sans">

    <!-- Navbar -->
    <header class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-primary">MAN Bontang</h1>

            <!-- Hamburger (Mobile) -->
            <button id="menu-toggle" class="md:hidden text-primary focus:outline-none">
                <i data-feather="menu" class="w-6 h-6"></i>
            </button>

            <!-- Nav Links -->
            <nav id="nav-menu" class="hidden md:flex md:items-center md:space-x-6 text-sm absolute md:static top-16 left-0 w-full md:w-auto bg-white md:bg-transparent shadow md:shadow-none p-4 md:p-0 z-50 flex-col md:flex-row space-y-3 md:space-y-0">
                <a href="/" class="block py-2 md:py-0 hover:text-green-700 transition">Beranda</a>
                <a href="/pengantar" class="block py-2 md:py-0 hover:text-green-700 transition">Pengantar</a>
                <a href="#" class="block py-2 md:py-0 hover:text-green-700 transition">Prolog</a>
                <a href="#latar-belakang" class="block py-2 md:py-0 hover:text-green-700 transition">Latar Belakang</a>
                <a href="#landasan" class="block py-2 md:py-0 hover:text-green-700 transition">Landasan</a>
                <a href="#tujuan" class="block py-2 md:py-0 hover:text-green-700 transition">Tujuan</a>


                <div class="flex flex-col md:flex-row gap-2 mt-4 md:mt-0">
                    <a href="/login" class="flex items-center gap-1 bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 transition shadow">
                        <i data-feather="log-in" class="w-4 h-4"></i> Login
                    </a>
                    <a href="/register" class="flex items-center gap-1 border border-green-700 text-green-700 px-4 py-2 rounded hover:bg-green-700 hover:text-white transition shadow">
                        <i data-feather="user-plus" class="w-4 h-4"></i> Register
                    </a>
                </div>
            </nav>
        </div>
    </header>


    <!-- Hero Section -->
    <section class="text-white py-64 text-center relative" style="background-image: linear-gradient(rgba(22, 101, 52, 0.7), rgba(22, 101, 52, 0.7)), url('{{ asset('storage/bg.jpeg') }}'); background-size: cover; background-position: center;">


        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg">Program "Tengok Tetangga"</h2>
            <p class="text-lg md:text-xl mb-6 drop-shadow-md">Menguatkan nilai sosial dan karakter Islami melalui aksi nyata di lingkungan sekitar.</p>
            <div class="flex justify-center gap-4">
                @if (Auth::check() && Auth::user()->role === UserRole::ADMIN)
                <a href="{{ url('/dashboard/admin') }}" class="bg-white text-green-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition flex items-center gap-2 shadow">
                    <i data-feather="log-in" class="w-5 h-5"></i> Dashboard Admin
                </a>
                @elseif(Auth::check() && Auth::user()->role === UserRole::PELAKSANA)
                <a href="{{ url('/dashboard/user') }}" class="bg-white text-green-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition flex items-center gap-2 shadow">
                    <i data-feather="log-in" class="w-5 h-5"></i> Dashboard User
                </a>
                @else
                <a href="/login" class="bg-white text-green-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition flex items-center gap-2 shadow">
                    <i data-feather="log-in" class="w-5 h-5"></i> Masuk
                </a>
                <a href="/register" class="bg-green-700 text-white px-6 py-2 rounded-lg font-semibold hover:bg-green-800 transition flex items-center gap-2 shadow">
                    <i data-feather="user-plus" class="w-5 h-5"></i> Daftar
                </a>
                @endif
            </div>
        </div>
    </section>


    <!-- Kata Pengantar -->
    <section class="py-12 px-6 md:px-20 bg-gray-100">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-8">
            <!-- Gambar -->
            <div class="flex-shrink-0">
                <img
                    src="{{ asset('storage/sugiannoor.jpeg') }}"
                    alt="Kata Pengantar"
                    class="w-[284px] h-[425px] object-cover rounded-lg shadow-md mx-auto md:mx-0" />
            </div>

            <!-- Teks -->
            <div class="md:flex-1">
                <h3 class="text-2xl font-bold text-green-600 mb-4">Kata Pengantar</h3>
                <p class="text-gray-700 mb-4">
                    Puji syukur ke hadirat Allah SWT atas limpahan rahmat dan karunia-Nya, sehingga Program Tengok Tetangga dapat terwujud sebagai bagian dari komitmen MAN Bontang dalam menanamkan nilai-nilai spiritual dan sosial yang bersumber dari ajaran Islam. Shalawat serta salam semoga senantiasa tercurah kepada Nabi Muhammad SAW, suri teladan utama dalam membentuk pribadi yang beriman, berakhlak mulia, dan peduli terhadap sesama.

                </p>
                <p class="text-gray-700 mb-4">
                    Program Tengok Tetangga bukanlah kegiatan biasa. Ia lahir dari kesadaran mendalam akan pentingnya mengamalkan ajaran Rasulullah SAW dalam kehidupan bermasyarakat, sebagaimana ditegaskan dalam sabda beliau:
                <blockquote class="italic border-l-4 pl-4 border-green-600 text-gray-700 bg-white p-4 rounded shadow">

                    ⁠“Barangsiapa yang beriman kepada Allah dan hari akhir, maka hendaklah ia berbuat baik kepada tetangganya.”
                    (HR. Bukhari dan Muslim)
                </blockquote>

                </p>
                <p class="text-gray-700">
                    Terima kasih kepada semua pihak yang telah mendukung terlaksananya program ini. Semoga Allah SWT meridai setiap langkah kecil yang kita lakukan dalam menebar kebaikan.
                </p>
                <!-- Tombol Selanjutnya -->
                <div class="mt-8 text-left">
                    <a href="/pengantar"
                        class="inline-block bg-green-700 text-white px-6 py-2 rounded-lg font-semibold hover:bg-green-800 transition duration-300 shadow">
                        Selanjutnya
                        <i data-feather="arrow-down-right" class="inline w-4 h-4 ml-2"></i>
                    </a>
                </div>
            </div>
        </div>


    </section>
    <!-- Prolog -->
    <section class="py-12 px-6 md:px-20 bg-gray-100">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-8">


            <!-- Teks -->
            <div class="md:flex-1">
                <h3 class="text-2xl font-bold text-green-600 mb-4">Prolog</h3>
                <p class="text-gray-700 mb-4">
                    Di tengah derasnya arus digital dan kehidupan yang semakin individualis, banyak yang kehilangan arah dan makna kehadiran sesama. Remaja terjebak dalam krisis identitas, lansia hidup dalam kesendirian. Dari keresahan inilah, MAN Bontang meluncurkan Program “Tengok Tetangga”, sebagai upaya sederhana namun penuh makna untuk menumbuhkan empati, gotong royong, dan kepedulian sosial sejak dini.
                </p>
                <p class="text-gray-700 mb-4">
                    Program ini bersumber dari pesan Ilahi dan teladan Nabi:
                </p>
                <blockquote class="italic border-l-4 pl-4 border-green-600 text-gray-700 bg-white p-4 rounded shadow">

                    ⁠"Berbuat baiklah kepada tetangga yang dekat dan tetangga yang jauh..."
                    (QS. An-Nisa: 36)

                    "Barangsiapa yang beriman kepada Allah dan hari akhir, maka hendaklah ia berbuat baik kepada tetangganya."
                    (HR. Bukhari dan Muslim)
                </blockquote>


                <div class="mt-8 text-left">
                    <a href="/prolog"
                        class="inline-block bg-green-700 text-white px-6 py-2 rounded-lg font-semibold hover:bg-green-800 transition duration-300 shadow">
                        Selanjutnya
                        <i data-feather="arrow-down-right" class="inline w-4 h-4 ml-2"></i>
                    </a>
                </div>



            </div>



            <!-- Gambar -->
            <div class="flex-shrink-0">
                <img
                    src="{{ asset('storage/lena.jpeg') }}"
                    alt="Kata Pengantar"
                    class="w-[284px] h-[425px] object-cover rounded-lg shadow-md mx-auto md:mx-0" />
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

    <!-- output yang diharapkan -->
    <section id="tujuan" class="py-12 px-6 md:px-20 bg-white">
        <h3 class="text-2xl font-bold text-green-600 mb-4">D. Output yang diharapkan </h3>
        <ul class="list-decimal list-inside ml-4 space-y-2 text-gray-700">
            <li>Terjalinnya hubungan yang harmonis antara siswa, masyarakat, dan madrasah. </li>
            <li>Tumbuhnya rasa empati dan semangat tolong-menolong di kalangan siswa.</li>
            <li>Penguatan nilai-nilai Qurani dan budaya gotong royong dalam kehidupan siswa. </li>
            <li>Terbentuknya karakter siswa yang peduli terhadap lingkungan sosialnya.</li>
        </ul>
    </section>



    <!-- Footer -->
    <footer class="bg-green-600 text-white text-center py-6 mt-8">
        <p>&copy; 2025 MAN Bontang. Semua Hak Dilindungi.</p>
    </footer>


    <script>
        feather.replace();

        document.getElementById('menu-toggle').addEventListener('click', function() {
            const navMenu = document.getElementById('nav-menu');
            navMenu.classList.toggle('hidden');
        });
    </script>

</body>

</html>