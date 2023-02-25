@extends('layouts.admin')

@section('content')

    <div class="container text-light py-5">


        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @elseif (session('denied'))
            <div class="alert alert-danger" role="alert">
                {{ session('denied') }}
            </div>
        @endif

        <h1 class="fs-4">TABELLA ORDINI</h1>

        <table class="table text-light">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr>
                    <td>
                        <a href=" {{ route('admin.order.show', $order) }}">
                        {{ $order->name}}   {{ $order->surname }} </a>
                    </td>
                    <td>
                        {{ $order->total_amount }} &euro;
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
