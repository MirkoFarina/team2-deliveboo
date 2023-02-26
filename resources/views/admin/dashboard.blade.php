@extends('layouts.admin')

@section('content')
<div class="container">
    <div>
        <canvas id="myChart"></canvas>
      </div>
</div>

<script>
    const ctx = document.getElementById('myChart');
    let data = {{ Illuminate\Support\Js::from($orders_month) }};
    console.log(data);
    let month = Object.keys(data);
    let orders = Object.values(data);
    console.log(orders, month);
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: month,
        datasets: [{
          label: 'ORDINI PER MESE/ANNO',
          data: orders,
          borderWidth: 2
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
