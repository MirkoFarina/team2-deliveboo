@extends('layouts.admin')

@section('content')
    <div class="bg-dark py-5 h-100 ">
        <div class="container text-light ">

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
            @else
                <h4>Registra la tua attività con un click</h4>
            @endif



        </div>
    </div>
@endsection
