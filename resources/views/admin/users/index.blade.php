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

        <div class="container ">
            <h1 class="text-center mb-4"> Riepilogo profilo </h1>

            <div class="card text-dark mb-4">
                <div class="card-header text-center">
                    <h3>{{ $user->name }} {{ $user->surname }}</h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bolder">Informazioni personali</h5>
                    <p class="card-text text-start">
                    <h6>
                        <span class="font-monospace">Nome:</span> {{ $user->name }}
                    </h6>
                    <h6>
                        <span class="font-monospace">Cognome:</span> {{ $user->surname }}
                    </h6>
                    <h6>
                        <span class="font-monospace">Indirizzo:</span> {{ $user->address }}
                    </h6>
                    <h6>
                        <span class="font-monospace">Cellulare:</span> {{ $user->phone_number }}
                    </h6>
                    <h6>
                        <span class="font-monospace">E-mail:</span> {{ $user->email }}
                    </h6>
                    </p>

                </div>
                <div class="card-footer text-muted">
                    Iscritto il {{ $user->created_at }}
                </div>

            </div>
            <div class="btns">
                <a href=" {{route('admin.users.edit', $user)}} " class="btn btn-warning text-light">Modifica</a>
                @include('admin.partials.form-delete', [
                            'title'   => $user->name,
                            'route'   => 'admin.users.destroy',
                            'element' => $user
                        ])
            </div>


            @if (!is_null($res))
                <div class="py-5">
                    <h2>Il tuo ristorante</h2>
                    <div class="card text-dark" style="width: 24rem;" >
                        <img src=" {{ asset('storage/' . $res->cover_image) ?? null }} " class="card-img-top" alt="{{$res->name_of_restaurant . ' immagine'}}">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{$res->name_of_restaurant}}
                            </h5>
                            <p class="card-text">
                                <h6>
                                    <span class="font-monospace">Partita IVA: </span>
                                    {{$res->p_iva}}
                                </h6>
                                <h6>
                                    <span class="font-monospace">Indirizzo: </span>
                                    {{$res->address}}
                                </h6>


                            </p>
                            <a href=" {{route('admin.restaurants.index')}} " class="btn btn-primary">Gestisci</a>
                        </div>
                    </div>
                </div>

            @else

                <h2>Registra il tuo ristorante con un click!</h2>
                <a class="btn btn-primary" href=" {{route('admin.restaurants.create')}} ">Registra il tuo ristorante</a>

            @endif



        </div>




    </div>
@endsection
