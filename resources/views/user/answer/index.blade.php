<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Pertanyaan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow dark:text-gray-200">

                <form action="{{ route('answer.store') }}" method="POST" id="quizForm">
                    @csrf

                    {{-- Navigation dots (nomor soal) --}}
                    <div class="flex flex-wrap gap-2 justify-center mb-6">
                        @foreach ($questions as $index => $question)
                        <button type="button"
                            class="soal-nav px-3 py-1 rounded-full border text-sm transition 
                   border-gray-300 bg-white text-gray-800 hover:bg-blue-100"
                            data-nav="{{ $index }}">
                            {{ $loop->iteration }}
                        </button>
                        @endforeach
                    </div>

                    {{-- Question steps --}}
                    @foreach ($questions as $index => $question)
                    <div class="question-step transition-all duration-500 ease-in-out {{ $index !== 0 ? 'hidden opacity-0 -translate-x-full' : 'opacity-100 translate-x-0' }}" data-step="{{ $index }}">
                        <label class="block mb-2 text-lg font-semibold  ">
                            {{ $loop->iteration }}. {{ $question->text }}
                        </label>

                        @if ($question->type === 'short_answer')
                        <textarea name="answers[{{ $question->id }}]" class="w-full px-3 py-2 border rounded-md mb-4 answer-text" required></textarea>

                        @elseif ($question->type === 'multiple_choice')
                        <div class="space-y-3 mt-2 mb-4">
                            @foreach ($question->choices as $option)
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" name="answers[{{ $question->id }}][]" value="{{ $option->id }}" class="peer sr-only answer-checkbox">
                                <div class="w-5 h-5 mr-3 border-2 border-gray-400 rounded-md 
                            peer-checked:bg-blue-600 
                            peer-checked:border-blue-600 
                            peer-checked:after:content-['✔'] 
                            peer-checked:after:text-white 
                            peer-checked:after:text-xs 
                            peer-checked:after:ml-[2px] 
                            peer-checked:after:mt-[-2px] 
                            peer-checked:after:block">
                                </div>
                                <span>{{ $option->text }}</span>
                            </label>
                            @endforeach
                        </div>
                        @endif

                        <div class="text-red-500 text-sm mb-2 hidden" id="error-step-{{ $index }}">Harap isi terlebih dahulu.</div>

                        <div class="flex justify-between">
                            <button type="button" class="btn-prev px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 disabled:opacity-50" {{ $index == 0 ? 'disabled' : '' }}>
                                Kembali
                            </button>
                            @if ($loop->last)
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Kirim Jawaban</button>
                            @else
                            <button type="button" class="btn-next px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Lanjut
                            </button>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </form>


            </div>
        </div>
    </div>
    <script>
        const steps = document.querySelectorAll('.question-step');
        const navButtons = document.querySelectorAll('.soal-nav');
        let currentStep = 0;

        function showStep(index) {
            steps[currentStep].classList.add('opacity-0', '-translate-x-full');
            setTimeout(() => {
                steps[currentStep].classList.add('hidden');
                steps[index].classList.remove('hidden');
                setTimeout(() => {
                    steps[index].classList.remove('opacity-0', '-translate-x-full');
                    steps[index].classList.add('opacity-100', 'translate-x-0');
                }, 10);
                currentStep = index;
                highlightCurrentNav();
            }, 300);
        }

        function highlightCurrentNav() {
            navButtons.forEach((btn, i) => {
                btn.classList.remove('bg-blue-600', 'text-white', 'font-bold');
                if (i === currentStep) {
                    btn.classList.add('bg-blue-600', 'text-white', 'font-bold');
                }
            });
        }

        function validateStep(stepElement) {
            const textarea = stepElement.querySelector('.answer-text');
            const checkboxes = stepElement.querySelectorAll('.answer-checkbox');
            const errorElement = stepElement.querySelector(`#error-step-${currentStep}`);

            if (textarea) {
                if (textarea.value.trim() === "") {
                    errorElement.classList.remove('hidden');
                    return false;
                }
            }

            if (checkboxes.length > 0) {
                let anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
                if (!anyChecked) {
                    errorElement.classList.remove('hidden');
                    return false;
                }
            }

            errorElement.classList.add('hidden');
            markNavAsAnswered(currentStep);
            return true;
        }

        function markNavAsAnswered(index) {
            const step = steps[index];
            const btn = navButtons[index];
            const textarea = step.querySelector('.answer-text');
            const checkboxes = step.querySelectorAll('.answer-checkbox');

            let answered = false;
            if (textarea && textarea.value.trim() !== "") {
                answered = true;
            }
            if (checkboxes.length > 0) {
                answered = Array.from(checkboxes).some(cb => cb.checked);
            }

            if (answered) {
                btn.classList.add('border-blue-600', 'ring-2', 'ring-blue-300');
            }
        }

        document.querySelectorAll('.btn-next').forEach((btn) => {
            btn.addEventListener('click', () => {
                if (validateStep(steps[currentStep])) {
                    showStep(currentStep + 1);
                }
            });
        });

        document.querySelectorAll('.btn-prev').forEach((btn) => {
            btn.addEventListener('click', () => {
                showStep(currentStep - 1);
            });
        });

        navButtons.forEach((btn, i) => {
            btn.addEventListener('click', () => {
                showStep(i);
            });
        });

        // Initial highlight
        highlightCurrentNav();
    </script>


</x-app-layout>