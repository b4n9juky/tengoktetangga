<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dokumentasi Observasi') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 dark:text-gray-200 p-6 rounded-2xl shadow-lg">

                <form action="{{ route('observasi.imageUpload',$observasi->id) }}" method="POST" enctype="multipart/form-data"
                    class="bg-white dark:bg-gray-900 shadow-lg rounded-lg p-8 w-full max-w-md mx-auto">
                    @csrf
                    <input type="hidden" name="observasikunjungan_id" value="{{$observasi->id}}">
                    <h2 class="text-2xl font-bold mb-6 text-center">Upload Foto</h2>

                    @if(session('success'))
                    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                        @if(session('url'))
                        <div class="mt-2">
                            <img src="{{ session('url') }}" alt="Uploaded" class="rounded shadow-md">
                        </div>
                        @endif
                    </div>
                    @endif

                    @error('photo')
                    <div class="text-red-500 mb-4 text-sm">{{ $message }}</div>
                    @enderror

                    <div
                        id="drop-area"
                        class="flex flex-col items-center justify-center border-2 border-dashed border-gray-400 dark:border-gray-600 rounded-lg p-6 cursor-pointer transition hover:border-blue-500 bg-gray-50 dark:bg-gray-700">
                        <svg class="w-12 h-12 text-gray-400 dark:text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16V4m0 0l4 4m-4-4L3 8m13 0a4 4 0 014 4v4a4 4 0 01-4 4H5a4 4 0 01-4-4v-4a4 4 0 014-4h2" />
                        </svg>
                        <p class="text-gray-500 dark:text-gray-300">Klik atau seret foto ke sini</p>
                        <input id="fileInput" type="file" name="photo" accept="image/*" class="hidden" />
                    </div>

                    <div id="preview" class="mt-4 hidden">
                        <p class="text-sm mb-1 dark:text-gray-300">Preview:</p>
                        <img id="previewImage" class="w-full h-auto rounded shadow" alt="Preview Foto" />
                    </div>

                    <button
                        type="submit"
                        class="mt-6 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                        Upload Foto
                    </button>
                </form>

            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <h2 class="text-xl font-bold mb-4">Foto Observasi: {{ $observasi->nama }}</h2>

            @if($photos->count())
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($photos as $photo)
                <div class="cursor-pointer">
                    <img src="{{ asset($photo->file_path) }}" alt="Foto"
                        class="rounded shadow hover:scale-105 transition duration-300"
                        onclick="openLightbox('{{ asset($photo->file_path) }}')">
                </div>
                @endforeach
            </div>
            @else
            <p class="text-gray-500">Belum ada foto diunggah.</p>
            @endif
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 bg-black bg-opacity-75 hidden items-center justify-center z-50">
        <img id="lightbox-img" src="" class="max-w-full max-h-[90vh] rounded-lg shadow-xl" />
        <button onclick="closeLightbox()" class="absolute top-5 right-5 text-white text-3xl font-bold">&times;</button>
    </div>

    <script>
        const dropArea = document.getElementById("drop-area");
        const fileInput = document.getElementById("fileInput");
        const preview = document.getElementById("preview");
        const previewImage = document.getElementById("previewImage");

        dropArea.addEventListener("click", () => fileInput.click());

        dropArea.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropArea.classList.add("border-blue-500");
        });

        dropArea.addEventListener("dragleave", () => {
            dropArea.classList.remove("border-blue-500");
        });

        dropArea.addEventListener("drop", (e) => {
            e.preventDefault();
            dropArea.classList.remove("border-blue-500");
            const files = e.dataTransfer.files;
            if (files.length) {
                fileInput.files = files;
                previewFile(files[0]);
            }
        });

        fileInput.addEventListener("change", () => {
            if (fileInput.files.length) {
                previewFile(fileInput.files[0]);
            }
        });

        function previewFile(file) {
            if (!file.type.startsWith("image/")) {
                alert("Hanya file gambar yang diperbolehkan.");
                return;
            }
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImage.src = e.target.result;
                preview.classList.remove("hidden");
            };
            reader.readAsDataURL(file);
        }

        // Lightbox Functions
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