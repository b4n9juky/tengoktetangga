<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11 3.055A9 9 0 1020.945 13H11V3.055z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M20.488 9H15V3.512A8.988 8.988 0 0120.488 9z" />
            </svg>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Grafik Kondisi Teramati</h2>
        </div>
    </x-slot>

    <div class="py-10 max-w-5xl mx-auto px-4">
        <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-100 mb-4 flex items-center space-x-2">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11 3.055A9 9 0 1020.945 13H11V3.055z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M20.488 9H15V3.512A8.988 8.988 0 0120.488 9z" />
                </svg>
                <span>Grafik Berdasarkan Kondisi</span>
            </h3>
            <canvas id="donutChart" class="mx-auto max-w-sm sm:max-w-md md:max-w-lg"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('donutChart').getContext('2d');

        const data = {
            labels: {!! json_encode($dataKondisi->pluck('nama')) !!},
            datasets: [{
                label: 'Total Nilai',
                data: {!! json_encode($dataKondisi->pluck('total_nilai')) !!},
                backgroundColor: [
                    '#22c55e', // green
                    '#3b82f6', // blue
                    '#f59e0b', // amber
                    '#ef4444', // red
                    '#8b5cf6', // purple
                    '#14b8a6'  // teal
                ],
                borderWidth: 1
            }]
        };

        const donutChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#4b5563',
                            font: {
                                size: 14
                            }
                        }
                    },
                    title: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return `${context.label}: ${context.raw} poin`;
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
