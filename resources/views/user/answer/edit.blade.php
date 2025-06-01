<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Pertanyaan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 dark:text-gray-200 p-6 rounded shadow">

                <form action="{{ route('answer.update', $surveyor->id) }}" method="POST">
                    @csrf


                    @foreach ($answers as $answer)
                    <div>
                        <label>{{ $answer->question->text }}</label><br>

                        @if ($answer->question->type === 'multiple_choice')
                        @foreach ($answer->question->choices as $choice)
                        <label>
                            <input type="checkbox" name="answers[{{ $answer->id }}][]" value="{{ $choice->id }}"
                                {{ in_array($choice->id, $answer->choices->pluck('id')->toArray()) ? 'checked' : '' }}>
                            {{ $choice->text }}
                        </label><br>
                        @endforeach
                        @else
                        <input type="text" name="answers[{{ $answer->id }}]" value="{{ $answer->text_answer }}">
                        @endif
                    </div>
                    <hr>
                    @endforeach
                    <div class="px-2 py-2">
                        <x-primary-button>Update</x-primary-button>
                    </div>
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