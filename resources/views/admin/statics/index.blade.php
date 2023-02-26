@extends('layouts.admin')

@section('content')
<div class="container">
    @if ($orders_month)
        <div class="row my-5">
            <div class="col-12">
                <div>
                    <canvas id="myChart"></canvas>
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
    Chart.defaults.font.size = 18;
    Chart.defaults.color = '#2f8845';
    let chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: month,
        datasets: [{
            label: 'ORDINI PER MESE/ANNO',
            data: orders,
            borderWidth: 2,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.2
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
@endsection
