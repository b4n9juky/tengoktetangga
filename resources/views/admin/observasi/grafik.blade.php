<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <i data-feather="pie-chart" class="w-6 h-6 text-indigo-600"></i>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Grafik Kondisi Teramati</h2>
        </div>
    </x-slot>

    <div class="py-10 max-w-6xl mx-auto px-4">
        <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 space-y-10">
            <div>
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-100 mb-4 flex items-center space-x-2">
                    <i data-feather="bar-chart-2" class="w-5 h-5 text-emerald-500"></i>
                    <span>Grafik Berdasarkan Kondisi</span>
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Donut Chart -->
                    <div class="aspect-[4/3]">
                        <canvas id="donutChart"></canvas>
                    </div>

                    <!-- Bar Chart -->
                    <div class="aspect-[4/3]">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>

                <!-- Line Chart Full Width -->
                <div class="aspect-[4/3] mt-8">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- Feather Icons CDN --}}
    <script src="https://unpkg.com/feather-icons"></script>

    {{-- ChartJS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        feather.replace(); // aktifkan Feather Icons

        const labels = @json($dataKondisi->pluck('nama'));
        const nilai = @json($dataKondisi->pluck('total_nilai'));

        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.raw} poin`;
                        }
                    }
                },
                legend: {
                    position: 'bottom'
                }
            }
        };

        // Donut Chart
        new Chart(document.getElementById('donutChart').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: nilai,
                    backgroundColor: [
                        '#22c55e', '#3b82f6', '#f59e0b',
                        '#ef4444', '#8b5cf6', '#14b8a6', '#e879f9', '#0ea5e9'
                    ]
                }]
            },
            options: chartOptions
        });

        // Bar Chart
        new Chart(document.getElementById('barChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Nilai',
                    data: nilai,
                    backgroundColor: '#3b82f6',
                    borderColor: '#1e40af',
                    borderWidth: 1
                }]
            },
            options: {
                ...chartOptions,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Line Chart
        new Chart(document.getElementById('lineChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Nilai',
                    data: nilai,
                    borderColor: '#10b981',
                    backgroundColor: '#d1fae5',
                    fill: false,
                    tension: 0.4
                }]
            },
            options: chartOptions
        });
    </script>
</x-app-layout>
