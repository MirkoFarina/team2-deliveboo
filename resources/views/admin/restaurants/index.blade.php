@extends('layouts.admin')

@section('content')
    <div class="bg-dark py-5 h-100 ">
        <div class="container text-light ">

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {!! session('success') !!}
                </div>
            @elseif (session('denied'))
                <div class="alert alert-danger" role="alert">
                    {!! session('denied') !!}
                </div>
            @endif


            @if ($restaurant)
                <h1 class="mb-3">Il tuo ristorante</h1>

                <div>
                    <h4>Nome ristorante: {{ $restaurant->name_of_restaurant }} </h4>
                </div>
                <div>
                    <h4>Partita IVA: {{ $restaurant->p_iva }} </h4>
                </div>
                <div>
                    <h4>Sito Web: {{ $restaurant->website }} </h4>
                </div>
                <div>
                    <h4>Indirizzo: {{ $restaurant->address }} </h4>
                </div>
                <div>
                    <h4>Numero di telefono: {{ $restaurant->phone_number }} </h4>
                </div>
                <div>
                    <h4>Email: {{ $restaurant->email }} </h4>
                </div>

                <a class="btn btn-warning" href=" {{ route('admin.restaurants.edit', $restaurant) }} ">
                    <i class="fa-solid fa-pencil"></i>
                </a>
                @include('admin.partials.form-delete', [
                    'title' => $restaurant->name_of_restaurant,
                    'route' => 'admin.restaurants.destroy',
                    'element' => $restaurant,
                ])
            @else
                <h4>Registra la tua attività con un click</h4>

                <a class="btn btn-primary" href=" {{ route('admin.restaurants.create') }} ">Registra il tuo ristorante</a>
            @endif

            @if (isset($restaurant->cover_image))
                <img src="{{ asset('storage/' . $restaurant->cover_image) ?? null }}" class="card-img-top"
                    alt="{{ $restaurant->name_of_restaurant }}">
            @endif
        </div>
    </div>
    </div>
@endsection
