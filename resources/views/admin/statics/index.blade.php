@extends('layouts.admin')

@section('content')
    <div class="container">
        @if ($orders_month)
            <div class="my-5">
                <div class="chart-container" style="position: relative; height:40vh; width:70vw">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
                integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

            <div class="col-md-10 ">
                <div class="row ">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card l-bg-cherry">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">TOTALE ORDINI RICEVUTI</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            {{ $nTotalOrders }}
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card l-bg-green-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fa-solid fa-pizza-slice"></i></div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">PIATTO PI&Uacute; ORDINATO</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0 fs-6">
                                            {{ $mostPopularFood['name'] }}

                                        </h2>
                                    </div>
                                    <div class="col-4 text-right">
                                        <span class="fs-2"> {{ $mostPopularFood['pivot_quantity'] }} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card l-bg-orange-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">INCASSO TOTALE</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            {{ $totalRevenue }} &euro;
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card l-bg-blue-dark">
                            <div class="card-statistic-3 p-4">
                                <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                                <div class="mb-4">
                                    <h5 class="card-title mb-0">INCASSO MENSILE</h5>
                                </div>
                                <div class="row align-items-center mb-2 d-flex">
                                    <div class="col-8">
                                        <h2 class="d-flex align-items-center mb-0">
                                            {{ $monthRevenue }} &euro;
                                        </h2>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h1 class="text-center text-white my-5">
                    CI DISPIACE NON HAI ANCORA ORDINI REGISTRATI :(
                </h1>
        @endif
    </div>

    <script>
        const ctx = document.getElementById('myChart');
        // TRANSFORMO I DATA PHP IN JS
        let data = {{ Illuminate\Support\Js::from($orders_month) }};
        // ASSEGNO I VALORI
        let month = Object.keys(data);
        let orders = Object.values(data);
        Chart.defaults.font.size = 14;
        Chart.defaults.color = '#ffffff';
        let chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: month,
                datasets: [{
                    label: 'ORDINI PER MESE/ANNO',
                    data: orders,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        window.addEventListener('beforeprint', () => {
            ctx.resize(600, 600);
        });
        window.addEventListener('afterprint', () => {
            ctx.resize();
        });
    </script>
@endsection
