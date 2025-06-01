<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Pertanyaan Baru Quesioner Tetangga
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
                @endif

                <form method="post" action="{{route('questions.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Teks Pertanyaan</label>
                        <input type="text" name="text" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Tipe Pertanyaan</label>
                        <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                            <option value="short_answer">Isian Singkat</option>
                            <option value="multiple_choice">Pilihan Ganda</option>
                        </select>
                    </div>

                    <div id="choices-section" class="hidden mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-2">Pilihan Jawaban + Bobot</label>
                        <div id="choices-wrapper" class="space-y-2">
                            <div class="flex gap-2">
                                <input type="text" name="choices[]" class="flex-1 border-gray-300 rounded-md" placeholder="Jawaban 1">
                                <input type="number" name="bobot_choices[]" min="1" class="w-24 border-gray-300 rounded-md" placeholder="Bobot">
                                <button type="button" onclick="removeChoice(this)" class="text-red-600 hover:text-red-800">Hapus</button>
                            </div>
                        </div>
                        <button type="button" onclick="addChoice()" class="mt-2 px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 text-sm">+ Tambah Jawaban</button>
                    </div>

                    <div class="mb-4">
                        <label for="kategori_id" class="block font-medium text-sm text-gray-700">Kategori Survey</label>
                        <select name="tema_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">-- Pilih Tema --</option>
                            @foreach($temaList as $tema)
                            <option value="{{ $tema->id }}">{{ $tema->nama_tema }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Simpan Pertanyaan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const typeSelect = document.getElementById('type');
        const choicesSection = document.getElementById('choices-section');

        typeSelect.addEventListener('change', function() {
            choicesSection.classList.toggle('hidden', this.value !== 'multiple_choice');
        });

        function addChoice() {
            const wrapper = document.getElementById('choices-wrapper');
            const div = document.createElement('div');
            div.className = 'flex gap-2';
            div.innerHTML = `
                <input type="text" name="choices[]" class="flex-1 border-gray-300 rounded-md" placeholder="Jawaban">
                <input type="number" name="bobot_choices[]" class="w-24 border-gray-300 rounded-md" placeholder="Bobot" min="1">
                <button type="button" onclick="removeChoice(this)" class="text-red-600 hover:text-red-800">Hapus</button>
            `;
            wrapper.appendChild(div);
        }

        function removeChoice(button) {
            button.parentElement.remove();
        }
    </script>
</x-app-layout>