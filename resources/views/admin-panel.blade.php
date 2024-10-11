<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View More</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <x-cookie-banner />

    <!-- Navbar -->
    <livewire:navbar />

    <section class="container p-6 mx-auto">
        <div class="container p-6 mx-auto">
            <!-- Stats Boxes -->
            <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-3">
                <div
                    class="p-6 transition duration-300 ease-in-out transform bg-white rounded-lg shadow-lg hover:scale-105">
                    <div class="flex items-center justify-between">
                        <div class="text-xl font-semibold text-gray-700">Total Users</div>
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="mt-4 text-3xl font-bold text-gray-800">1,234</div>
                    <div class="mt-2 text-sm text-gray-500">12% increase from last month</div>
                </div>
                <div
                    class="p-6 transition duration-300 ease-in-out transform bg-white rounded-lg shadow-lg hover:scale-105">
                    <div class="flex items-center justify-between">
                        <div class="text-xl font-semibold text-gray-700">Total Listed Homes</div>
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </div>
                    <div class="mt-4 text-3xl font-bold text-gray-800">567</div>
                    <div class="mt-2 text-sm text-gray-500">5% increase from last week</div>
                </div>
                <div
                    class="p-6 transition duration-300 ease-in-out transform bg-white rounded-lg shadow-lg hover:scale-105">
                    <div class="flex items-center justify-between">
                        <div class="text-xl font-semibold text-gray-700">Active Exchanges</div>
                        <svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                    </div>
                    <div class="mt-4 text-3xl font-bold text-gray-800">89</div>
                    <div class="mt-2 text-sm text-gray-500">3% increase from yesterday</div>
                </div>
            </div>

            <!-- Chart -->
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h2 class="mb-4 text-2xl font-semibold text-gray-800">Monthly Home Exchanges</h2>
                <div class="relative h-64 sm:h-96">
                    <canvas id="exchangeChart" class="w-full h-full"></canvas>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctx = document.getElementById('exchangeChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        datasets: [{
                            label: 'Home Exchanges',
                            data: [65, 59, 80, 81, 56, 55, 40, 50, 62, 75, 80, 90],
                            fill: false,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        </div>
    </section>


    <!-- Footer -->
    <livewire:footer />
    @livewireScripts
</body>

</html>
