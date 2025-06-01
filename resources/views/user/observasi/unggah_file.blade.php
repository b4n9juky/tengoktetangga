<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dokumentasi Observasi') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 dark:text-gray-200 p-6 rounded-2xl shadow-lg">



                <form action="{{ route('observasi.imageUpload', $observasi->id) }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    @csrf
                    <h2 class="text-2xl font-semibold mb-4 flex items-center">
                        <i data-feather="upload" class="mr-2 text-blue-500"></i> Upload Foto Observasi
                    </h2>

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

                    <label for="photo" class="flex flex-col items-center justify-center border-2 border-dashed border-gray-400 rounded-lg p-6 cursor-pointer hover:border-blue-500 transition">
                        <i data-feather="image" class="w-12 h-12 text-gray-400 mb-2"></i>
                        <span class="text-gray-500">Klik atau seret foto ke sini</span>
                        <input id="photo" type="file" name="photo" accept="image/*" class="hidden" />
                    </label>

                    <div id="preview" class="mt-4 hidden">
                        <p class="text-sm mb-1">Preview:</p>
                        <img id="previewImage" class="w-full h-auto rounded shadow" alt="Preview Foto" />
                    </div>

                    <button type="submit" class="mt-6 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition flex items-center justify-center">
                        <i data-feather="upload-cloud" class="mr-2"></i> Upload Foto
                    </button>
                </form>



            </div>


        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 dark:text-gray-200 p-6 rounded-2xl shadow-lg">
                <h2 class="text-xl font-bold mb-4">Foto Dokumentasi: {{ $observasi->nama }}</h2>

                @if($photos->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach ($photos as $photo)
                    <div class="bg-white dark:bg-gray-700 p-4 rounded shadow">
                        <img src="{{ asset($photo->file_path) }}" alt="Foto" class="rounded shadow">
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500">Belum ada foto diunggah.</p>
                @endif
            </div>
        </div>
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
    </script>

</x-app-layout>