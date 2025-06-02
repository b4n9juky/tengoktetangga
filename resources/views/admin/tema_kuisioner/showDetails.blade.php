<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight flex items-center space-x-2">
            <i data-feather="file-text" class="text-blue-500 w-6 h-6"></i>
            <span>{{ __('Tema Kuisioner') }}</span>
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 space-y-6">
                <div class="flex items-start space-x-3">
                    <i data-feather="help-circle" class="text-indigo-500 w-6 h-6 mt-1"></i>
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100">{{ $pertanyaan->text }}</h3>
                </div>

                <div class="w-full">
                    <canvas id="chartJawaban" class="max-h-96"></canvas>
                </div>

                <ul class="divide-y divide-gray-200 dark:divide-gray-700 mt-6">
                    @foreach ($pertanyaan->choices as $choice)
                        <li class="py-3 flex items-center justify-between hover:bg-gray-50 dark:hover:bg-gray-700 px-2 rounded-md transition-all">
                            <div class="flex items-center space-x-2">
                                <i data-feather="check-circle" class="text-green-500 w-5 h-5"></i>
                                <span class="text-gray-700 dark:text-gray-300">{{ $choice->text }}</span>
                            </div>
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">
                                <i data-feather="users" class="inline w-4 h-4 text-blue-500 mr-1"></i>
                                {{ $choice->answers_count }} siswa
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script>
        const labels = @json($pertanyaan->choices->pluck('text'));
        const dataCounts = @json($pertanyaan->choices->pluck('answers_count'));

        const ctx = document.getElementById('chartJawaban').getContext('2d');
        new Chart(ctx, {
            type: 'bar', // Ganti ke 'pie' jika ingin pie chart
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah yang memilih',
                    data: dataCounts,
                    backgroundColor: ['#3498db', '#2ecc71', '#e74c3c', '#f1c40f', '#9b59b6', '#34495e'],
                    borderRadius: 6,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#2d3748',
                        titleColor: '#f7fafc',
                        bodyColor: '#e2e8f0'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0,
                            stepSize: 1,
                            color: '#4a5568'
                        },
                        grid: {
                            color: '#e2e8f0'
                        }
                    },
                    x: {
                        ticks: {
                            color: '#4a5568'
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Inisialisasi Feather Icons setelah halaman dimuat
        feather.replace();
    </script>
</x-app-layout>
