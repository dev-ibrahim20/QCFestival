<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('لوحة التحكم') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- الإحصائيات -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- التقديمات -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gradient-to-br from-blue-50 to-blue-100 border-l-4 border-blue-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm font-semibold mb-2">إجمالي التقديمات</p>
                                <p class="text-4xl font-bold text-blue-600">{{ $applicantsCount }}</p>
                            </div>
                            <div class="text-5xl text-blue-200">📋</div>
                        </div>
                    </div>
                </div>

                <!-- المستخدمين -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gradient-to-br from-green-50 to-green-100 border-l-4 border-green-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm font-semibold mb-2">إجمالي المستخدمين</p>
                                <p class="text-4xl font-bold text-green-600">{{ $usersCount }}</p>
                            </div>
                            <div class="text-5xl text-green-200">👥</div>
                        </div>
                    </div>
                </div>

                <!-- الإعاقات -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gradient-to-br from-purple-50 to-purple-100 border-l-4 border-purple-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 text-sm font-semibold mb-2">أنواع الإعاقات</p>
                                <p class="text-4xl font-bold text-purple-600">{{ $disabilitiesCount }}</p>
                            </div>
                            <div class="text-5xl text-purple-200">♿</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- الرسوم البيانية -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-800 mb-6">التقديمات حسب نوع الإعاقة</h3>
                    <div class="relative h-96">
                        <canvas id="disabilityChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data for Chart.js
        const applicantsByDisability = @json($applicantsByDisability);

        const labels = applicantsByDisability.map(item => item.disability);
        const data = applicantsByDisability.map(item => item.count);

        const ctx = document.getElementById('disabilityChart').getContext('2d');
        const disabilityChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'عدد التقديمات',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',   // Red
                        'rgba(54, 162, 235, 0.6)',   // Blue
                        'rgba(255, 206, 86, 0.6)',   // Yellow
                        'rgba(75, 192, 192, 0.6)',   // Teal
                        'rgba(153, 102, 255, 0.6)',  // Purple
                        'rgba(255, 159, 64, 0.6)',   // Orange
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 2,
                    borderRadius: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            font: {
                                size: 14,
                                weight: 'bold'
                            },
                            usePointStyle: true
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        padding: 12,
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 13
                        },
                        callbacks: {
                            label: function(context) {
                                return 'التقديمات: ' + context.parsed.y;
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
