<div>

    <div class="md:flex justify-center">
        <div class="md:w-11/12 md:flex bg-white overflow-hidden shadow-xl sm:rounded-lg ">
            <div class=" md:w-3/12 mr-5">
                <canvas id="myChart2" width="400" height="580"></canvas>
            </div>
            <div class="md:w-9/12">
                <canvas id="myChart" width="400" height="195"></canvas>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        var ctx = document.getElementById('myChart');
        var ctx2 = document.getElementById('myChart2');
        Livewire.on('datosAño', (meses, kk, kk_egreso) => {
            console.log(meses, kk, kk_egreso);
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: meses,
                    datasets: [{
                        label: '# de Ingresos',
                        data: kk,
                        backgroundColor: [
                            'rgba(34, 139, 34, 0.2)',

                        ],
                        borderColor: [
                            'rgba(34, 139, 34, 1)',

                        ],
                        borderWidth: 1
                    }, {
                        label: '# de Egresos',
                        data: kk_egreso,
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
                            text: 'Ingresos Mensuales x Egresos Mensuales'
                        }
                    }
                },

            });


        });


        Livewire.on('datosLiquidez', (meses, liquidez) => {
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
                        text: 'Utilidad x Meses'
                    },

                },

            };


            let myChart2 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: meses,
                    datasets: [{
                        label: '# de Utilidad',
                        data: liquidez,
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

        });
    </script>

@endpush
