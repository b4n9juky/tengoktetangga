<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Hasil Observasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border dark:border-gray-700">
                <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Rekapitulasi Jumlah Sesuai Kondisi</h3>

                <table class="w-full text-left table-auto border border-collapse border-gray-300 dark:border-gray-600">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white">
                        <tr>
                            <th class="p-2 border">No</th>
                            <th class="p-2 border">Kondisi</th>
                            <th class="p-2 border">Jumlah Responden</th>
                            <th class="p-2 border">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 dark:text-gray-200">
                        @foreach ($hasil as $index => $item)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="p-2 border">{{ $index + 1 }}</td>
                            <td class="p-2 border">{{ $item['nama'] }}</td>
                            <td class="p-2 border">{{ $item['jumlah_responden'] }}</td>
                            <td class="p-2 border">{{ $item['total_nilai'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>







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
                <canvas id="donutChart" class="w-full max-w-2xl mx-auto py-2 px-2 mt-5"></canvas>

                <canvas id="barChart" class="w-full max-w-2xl mx-auto py-2 px-2 mt-5"></canvas>
                <canvas id="lineChart" class="w-full max-w-2xl mx-auto py-2 px-2 mt-5"></canvas>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = {!! json_encode($dataKondisi->pluck('nama')) !!};
    const nilai = {!! json_encode($dataKondisi->pluck('total_nilai')) !!};

    // Donut Chart
    new Chart(document.getElementById('donutChart').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: nilai,
                backgroundColor: [
                    '#22c55e', '#3b82f6', '#f59e0b',
                    '#ef4444', '#8b5cf6', '#14b8a6'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.raw} poin`;
                        }
                    }
                }
            }
        }
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
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.raw} poin`;
                        }
                    }
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
        options: {
            responsive: true,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.raw} poin`;
                        }
                    }
                }
            }
        }
    });
</script>


</x-app-layout>