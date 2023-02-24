@extends('layouts.admin')

@section('content')

    <div class="container text-light py-5">

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
            <div class="card">
                @if (isset($restaurant->cover_image))
                    <img src="{{ asset('storage/' . $restaurant->cover_image) ?? null }}" class="card-img-top"
                        alt="{{ $restaurant->name_of_restaurant }}">
                @endif
                <div class="card-body text-dark">
                    <h5 class="card-title text-uppercase">{{ $restaurant->name_of_restaurant }}</h5>
                    <p class="card-text">
                        @if (!is_null($categories))
                            @foreach ($categories as $cat)
                                <span class="badge text-bg-danger"> {{ $cat->name }} </span>
                            @endforeach
                        @endif
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Partita IVA: {{ $restaurant->p_iva }}</li>
                    <li class="list-group-item">Sito Web: {{ $restaurant->website }}</li>
                    <li class="list-group-item">Indirizzo: {{ $restaurant->address }}</li>
                    <li class="list-group-item">Numero di telefono: {{ $restaurant->phone_number }}</li>
                    <li class="list-group-item">Email: {{ $restaurant->email }}</li>
                </ul>
                <div class="card-body text-center">
                    <a class="btn btn-outline-warning px-5" href=" {{ route('admin.restaurants.edit', $restaurant) }} ">
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    @include('admin.partials.form-delete', [
                        'title' => $restaurant->name_of_restaurant,
                        'route' => 'admin.restaurants.destroy',
                        'element' => $restaurant,
                    ])
                </div>
            </div>
        @else
            <h1 class="text-center mb-5">
                REGISTRA LA TUA ATTIVIT&Agrave; CON UN SEMPLICE CLICK!
            </h1>
            <div class="text-center">
                <a class="btn btn-success" href=" {{ route('admin.restaurants.create') }} "> REGISTRA QUI IL TUO RISTORANTE
                </a>
            </div>
        @endif


    </div>

@endsection
