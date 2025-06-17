<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 dark:text-gray-100 leading-tight flex items-center space-x-3">
            <i data-feather="file-text" class="text-blue-600 w-6 h-6"></i>
            <span>{{ __('Observasi') }}</span>
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700"
                style="max-width: 900px; margin: 0 auto;">
                <div class="p-6 flex items-center space-x-4 border-b border-gray-200 dark:border-gray-700">
                    <i data-feather="image" class="text-green-500 w-7 h-7"></i>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Gambar Observasi</h3>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4 p-6">
                    @foreach($observasi->dokumentasi as $doc)
                    <div class="cursor-pointer">
                        <img
                            src="{{ asset('storage/'.$doc->file_path) }}"
                            alt="Foto Observasi"
                            class="rounded-md shadow-md w-full h-32 object-cover hover:scale-105 transition-transform duration-300"
                            onclick="openLightbox('{{ asset('storage/'.$doc->file_path) }}')">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 bg-black bg-opacity-80 hidden items-center justify-center z-50">
        <img id="lightbox-img" src="" class="max-w-full max-h-[90vh] rounded-lg shadow-xl" />
        <button onclick="closeLightbox()" class="absolute top-5 right-5 text-white text-3xl font-bold">&times;</button>
    </div>

    <!-- Feather Icons init script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });

        function openLightbox(url) {
            const lightbox = document.getElementById("lightbox");
            const lightboxImg = document.getElementById("lightbox-img");
            lightboxImg.src = url;
            lightbox.classList.remove("hidden");
            lightbox.classList.add("flex");
        }

        function closeLightbox() {
            const lightbox = document.getElementById("lightbox");
            lightbox.classList.add("hidden");
            lightbox.classList.remove("flex");
        }
    </script>
</x-app-layout>