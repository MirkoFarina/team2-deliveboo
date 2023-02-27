@extends('layouts.admin')

@section('content')
    <div class="container">
        @if ($orders_month)
            <div class="my-5" style="position: relative; height:50vh; width:90vw">
                <canvas id="myChart"></canvas>
            </div>
            <div>
                <h5 class="text-light">Incasso mensile : <span class="text-success">{{$monthRevenue}} &euro;</span></h5>
                <h5 class="text-light">Incasso totale : <span class="text-success">{{$totalRevenue}} &euro;</span></h5>
                <h5 class="text-light">Ordini ricevuti nel mese corrente : <span class="text-warning">{{$nCurrentOrders}} </span></h5>
                <h5 class="text-light">Totale ordini ricevuti  : <span class="text-warning">{{$nTotalOrders}} </span></h5>
                <h5 class="text-light">Piatto più ordinato  : <span class="text-warning">{{$mostPopularFood['name']}} ({{$mostPopularFood['pivot_quantity']}}) </span></h5>

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
