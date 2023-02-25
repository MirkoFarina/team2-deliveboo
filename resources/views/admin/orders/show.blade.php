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


        <h1 class="mb-2 text-light">
            DETTAGLI Ordine
        </h1>

        <div class="card w-75">
            <div class="card-body">
                <h5 class="card-title">{{ $order->name }}{{$order->surname}} </h5>
                <p class="card-text">
                    {{ $order->email }}
                </p>

                <span>
                    {{ $order->total_amount }} &euro;
                </span>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @forelse ($foods as $food)
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{$food->cover_image}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"> {{$food->name}} x  </h5>
                                <p class="card-text"> {{$food->ingredients}} </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4>Non ci sono piatti</h4>
                @endforelse

            </div>
        </div>
    </div>
@endsection
