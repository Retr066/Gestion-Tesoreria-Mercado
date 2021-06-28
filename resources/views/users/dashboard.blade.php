<x-app-layout>
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="flex items-center justify-center bg-gray-100">
                    <div class="max-w-7xl w-full mx-auto py-6 sm:px-6 lg:px-8">
                        <div class="flex flex-col lg:flex-row w-full lg:space-x-2 space-y-2 lg:space-y-0 mb-2 lg:mb-4">

                            <div class="w-full lg:w-1/5">
                                <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-purple-400">
                                    <div class="flex items-center">
                                        <div class="icon w-14 p-3.5 bg-purple-400 text-white rounded-full mr-3">
                                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                            </svg>
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <div class="text-lg">230k</div>
                                            <div class="text-sm text-gray-400">Sales</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full lg:w-1/5">
                                <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-blue-400">
                                    <div class="flex items-center">
                                        <div class="icon w-14 p-3.5 bg-blue-400 text-white rounded-full mr-3">
                                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <div class="text-lg">3456</div>
                                            <div class="text-sm text-gray-400">Customers</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full lg:w-1/5">
                                <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-yellow-400">
                                    <div class="flex items-center">
                                        <div class="icon w-14 p-3.5 bg-yellow-400 text-white rounded-full mr-3">
                                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                            </svg>
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <div class="text-lg">3456</div>
                                            <div class="text-sm text-gray-400">Products</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full lg:w-1/5">
                                <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-red-400">
                                    <div class="flex items-center">
                                        <div class="icon w-14 p-3.5 bg-red-400 text-white rounded-full mr-3">
                                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <div class="text-lg">12658</div>
                                            <div class="text-sm text-gray-400">Orders</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-full lg:w-1/5">
                                <div class="widget w-full p-4 rounded-lg bg-white border-l-4 border-green-400">
                                    <div class="flex items-center">
                                        <div class="icon w-14 p-3.5 bg-green-400 text-white rounded-full mr-3">
                                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <div class="text-lg">$948'560</div>
                                            <div class="text-sm text-gray-400">Revenue</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="md:flex justify-center">
        <div class="md:w-11/12 md:flex bg-white overflow-hidden shadow-xl sm:rounded-lg ">
            <div class=" md:w-3/12 mr-5">
                <canvas id="myChart2" width="400" height="580"></canvas>
            </div>
            <div class="md:w-9/12" >
                <canvas id="myChart" width="400" height="195"></canvas>
        </div>
        </div>
    </div>
    @push('scripts')
    <script>
        var ctx = document.getElementById('myChart');
        var ctx2 = document.getElementById('myChart2');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(34, 139, 34, 0.2)',

                    ],
                    borderColor: [
                        'rgba(34, 139, 34, 1)',

                    ],
                    borderWidth: 1
                },{
                    label: '# of Votes',
                    data: [3, 8, 5, 4, 1, 2],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Line Chart'
                }
            }
        },

        });
        let data =  [-12, 19, 3, -5, 2, 3];
           const optiones = {
                responsive: true,
                indexAxis: 'y',
                elements: {
                            bar: {
                                borderWidth: 2,
                            }
                        },
                plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Chart.js Line Chart'
                        },

                     },

            };


        let myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: data,
                    backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],

                    borderWidth: 1,
                }]
            },
            options: optiones,
        });


        </script>

    @endpush
</x-app-layout>
