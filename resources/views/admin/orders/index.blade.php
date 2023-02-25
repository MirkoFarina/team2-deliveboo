@extends('layouts.admin')

@section('content')

    <div class="container text-light py-5">
        <h1 class="fs-4">TABELLA ORDINI</h1>
        <table class="table text-light">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr>
                    <td>
                        <a href=" {{ route('admin.order.show', $order) }}">{{ $order->name }} {{ $order->surname}}</a>
                    </td>
                    <td>
                        {{ $order->total_amount }}
                    </td>
                    <td>
                        {{ $order->checked }}
                    </td>
                    <td>
                        {{ $order->created_at }}
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>

        </table>
    </div>

@endsection
