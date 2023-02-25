@extends('layouts.admin')

@section('content')
    <div class="container d-flex align-items-center justify-content-center py-5 flex-column">

        @if (session('create'))
            <div class="alert alert-success" role="alert">
                {{ session('create') }}
            </div>
        @elseif (session('edit'))
            <div class="alert alert-success" role="alert">
                {{ session('edit') }}
            </div>
        @endif


        <h1 class="mb-4 text-light">
            DETTAGLI ORDINE
        </h1>

        <div class="card w-75 mb-4">
            <div class="card-body">
                <h5 class="card-title">Cliente : {{ $order->getFullName() }} </h5>
                <p class="card-text">
                    <span>
                        E-mail : {{ $order->email }} <br>
                    </span>
                    <span>
                        Totale ordine : {{ $order->total_amount }} &euro;
                    </span>
                </p>

                <span v-if="$order->checked" class="fw-bold" style="color: green;">
                    COMPLETATO
                </span>
            </div>
        </div>

        <div class="container">
            <table class="table text-light">
                <thead>
                    <tr>
                        <th scope="col">Piatto</th>
                        <th scope="col">Prezzo/Unità</th>
                        <th scope="col">Subtotale</th>
                        <th scope="col">Quantità</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($foods as $food)
                    <tr>
                        <td>
                            {{ $food['name'] }}
                        </td>
                        <td>
                            {{ $food['price'] }} &euro;
                        </td>
                        <td>
                            {{
                            number_format(($food['price'] * $food['pivot_quantity']), 2, '.', '');
                            }} &euro;
                        </td>
                        <td>
                            {{ $food['pivot_quantity'] }}
                        </td>
                    </tr>
                    @empty
                    @endforelse
                    <tr>
                        <td>
                            <b> TOTALE : <b>
                        </td>
                        <td></td>
                        <td>
                            {{$order->total_amount}} &euro;
                        </td>

                    </tr>

                </tbody>
            </table>

        </div>
    </div>

@endsection
