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
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
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

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-green-50 to-white py-12">
        <div class="container mx-auto text-center">
            <img src="{{ asset('storage/lena.jpeg') }}" alt="Kepala MAN Bontang"
                class="w-40 h-40 object-cover rounded-full mx-auto shadow-lg border-4 border-white mb-4">
            <h2 class="text-3xl font-bold text-green-700">Prolog</h2>
            <p class="text-gray-600 mt-2 text-sm">Lena Roza, S.Pd., M.Pd. – Waka Humas MAN Bontang</p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 px-6 md:px-10 lg:px-20 bg-gray-100 leading-relaxed tracking-wide">
        <div class="max-w-screen-lg mx-auto text-justify space-y-6 text-gray-700">

            <p>Assalamu’alaikum warahmatullahi wabarakatuh,</p>

            <p>
                Di tengah derasnya arus digital dan kehidupan yang semakin individualis, banyak yang kehilangan arah dan makna
                kehadiran sesama. Remaja terjebak dalam krisis identitas, lansia hidup dalam kesendirian. Dari keresahan
                inilah, MAN Bontang meluncurkan Program “Tengok Tetangga”, sebagai upaya sederhana namun penuh makna untuk
                menumbuhkan empati, gotong royong, dan kepedulian sosial sejak dini.
            </p>

            <div class="space-y-4">
                <blockquote class="italic border-l-4 pl-4 border-green-600 bg-white p-4 rounded shadow">
                    "Berbuat baiklah kepada tetangga yang dekat dan tetangga yang jauh..." (QS. An-Nisa: 36)
                </blockquote>
                <blockquote class="italic border-l-4 pl-4 border-green-600 bg-white p-4 rounded shadow">
                    "Barangsiapa yang beriman kepada Allah dan hari akhir, maka hendaklah ia berbuat baik kepada tetangganya."
                    (HR. Bukhari dan Muslim)
                </blockquote>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-green-700 mt-8 mb-2">👥 Sasaran Program</h4>
                <ul class="list-disc list-inside ml-4">
                    <li>Pelaksana: seluruh siswa kelas X, XI, dan XII MAN Bontang</li>
                    <li>Penerima manfaat: warga sekitar tempat tinggal siswa (se-RT) dan warga di lingkungan madrasah.</li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-green-700 mt-8 mb-2">🔄 Alur Kegiatan</h4>
                <ol class="list-decimal list-inside ml-4 space-y-1">
                    <li>Refleksi diri siswa melalui kuesioner kepedulian sosial</li>
                    <li>Kunjungan humanis ke tetangga sekitar: menyapa, mendengar, dan membantu</li>
                    <li>Tindak lanjut aksi nyata — moril dan/atau materiel — di bawah bimbingan guru pendamping</li>
                </ol>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-green-700 mt-8 mb-2">🤝 Kolaborasi Strategis</h4>
                <p>
                    Program ini juga menjadi bentuk kontribusi nyata madrasah terhadap Program 100 Hari Wali Kota dan Wakil Wali
                    Kota Bontang, serta menjembatani kerja sama dengan Dinas Sosial dan Dinas Kesehatan.
                </p>
            </div>

            <div>
                <h4 class="text-lg font-semibold text-green-700 mt-8 mb-2">🎯 Output yang Diharapkan</h4>
                <ul class="list-disc list-inside ml-4 space-y-1">
                    <li>Siswa peduli terhadap lingkungan sosial</li>
                    <li>Hubungan harmonis madrasah, keluarga, dan masyarakat</li>
                    <li>Gerakan empati berkelanjutan</li>
                    <li>Portfolio karakter siswa terdokumentasi</li>
                    <li>Kepercayaan publik terhadap madrasah meningkat</li>
                    <li>Kolaborasi madrasah dan pemerintah dalam penanganan sosial</li>
                </ul>
            </div>

            <p class="italic text-green-700 border-l-4 border-green-300 pl-4">🌿 “Kepedulian tak selalu butuh harta, cukup
                sepasang mata yang melihat dan hati yang peduli.” — Lena Roza</p>

            <p>Wassalamu’alaikum warahmatullahi wabarakatuh.</p>
            <p class="text-sm text-gray-500">📍 Bontang, 19 Juni 2025</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-green-700 text-white text-center py-6 mt-10">
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