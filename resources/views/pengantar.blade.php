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

<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Navbar -->
    <header class="bg-white shadow sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-green-700">MAN Bontang</h1>

            <button id="menu-toggle" class="md:hidden text-green-700 focus:outline-none">
                <i data-feather="menu" class="w-6 h-6"></i>
            </button>

            <nav id="nav-menu" class="hidden md:flex md:items-center md:space-x-6 text-sm absolute md:static top-16 left-0 w-full md:w-auto bg-white md:bg-transparent shadow md:shadow-none p-4 md:p-0 z-50 flex-col md:flex-row space-y-3 md:space-y-0">
                <a href="/" class="hover:text-green-700">Beranda</a>
                <a href="/pengantar" class="hover:text-green-700">Pengantar</a>
                <a href="/prolog" class="hover:text-green-700">Prolog</a>
                <a href="#latar-belakang" class="hover:text-green-700">Latar Belakang</a>
                <a href="#landasan" class="hover:text-green-700">Landasan</a>
                <a href="#tujuan" class="hover:text-green-700">Tujuan</a>

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
    <!-- Hero Image + Judul Kata Pengantar -->
    <section class="bg-gradient-to-br from-green-50 to-white py-12">
        <div class="container mx-auto text-center">
            <img src="{{ asset('storage/sugiannoor.jpeg') }}" alt="Kepala MAN Bontang"
                class="w-40 h-40 object-cover rounded-full mx-auto shadow-lg border-4 border-white mb-4">
            <h2 class="text-3xl font-bold text-green-700">Prolog</h2>
            <p class="text-gray-600 mt-2 text-sm">Sugiannoor, S. Pd. I., M. Pd. – Kepala MAN Bontang</p>
        </div>
    </section>



    <!-- Konten Kata Pengantar -->
    <section class="py-12 px-6 md:px-20 bg-gray-100">
        <div class="max-w-4xl mx-auto text-justify text-gray-700 space-y-6 leading-relaxed text-base md:text-lg">

            <p>
                Puji syukur ke hadirat Allah SWT atas limpahan rahmat dan karunia-Nya, sehingga Program <strong>Tengok Tetangga</strong> dapat terwujud sebagai bagian dari komitmen MAN Bontang dalam menanamkan nilai-nilai spiritual dan sosial yang bersumber dari ajaran Islam. Shalawat serta salam semoga senantiasa tercurah kepada Nabi Muhammad SAW, suri teladan utama dalam membentuk pribadi yang beriman, berakhlak mulia, dan peduli terhadap sesama.
            </p>

            <blockquote class="italic border-l-4 pl-4 border-green-600 text-gray-700 bg-white p-4 rounded shadow">
                “Barangsiapa yang beriman kepada Allah dan hari akhir, maka hendaklah ia berbuat baik kepada tetangganya.”
                <span class="block text-sm mt-2">— HR. Bukhari dan Muslim</span>
            </blockquote>

            <p>
                Program ini mencerminkan keimanan yang diwujudkan melalui kepedulian sosial. Berdasarkan hadis Nabi, perhatian kepada tetangga menjadi indikator nyata iman kepada Allah dan hari akhir. Program ini menjadi media pembelajaran akhlak, melatih siswa untuk peduli, empatik, dan berakhlak mulia.
            </p>

            <p>
                Lebih dari itu, kegiatan ini memperkuat <em>ukhuwah Islamiyah</em> melalui silaturahmi dan aksi sosial, menjadikan ibadah tidak hanya bersifat ritual, tetapi juga bermakna sosial dan kemanusiaan.
            </p>

            <p>
                Secara sosial, program ini menjadi wujud nyata ajaran Islam dalam membangun masyarakat yang peduli dan saling menolong. Siswa dilatih untuk peka terhadap kondisi sosial, seperti warga kurang mampu, lansia, atau korban musibah — membentuk karakter empatik dan tanggap sosial.
            </p>

            <p>
                Kami mengucapkan terima kasih kepada seluruh pendidik dan tenaga kependidikan atas dukungannya. Semoga pelaksanaan program ini semakin terstruktur, berkelanjutan, dan menjawab tantangan sosial secara nyata.
            </p>

            <p>
                MAN Bontang berkomitmen menjadi pelopor pendidikan Islam yang membumi, progresif, dan adaptif terhadap dinamika sosial kemasyarakatan.
            </p>

            <p class="font-semibold">
                Semoga program ini membawa keberkahan, menjadi inspirasi gerakan kebaikan, dan membentuk generasi yang unggul dalam keimanan, akhlak, dan kepedulian sosial.
            </p>

            <div class="mt-10 text-right">
                <p class="font-semibold">Sugiannoor, S. Pd. I., M. Pd.</p>
                <p class="text-sm text-gray-600">Kepala MAN Bontang</p>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-green-600 text-white text-center py-6 mt-10">
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