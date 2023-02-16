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
            DETTAGLI DI {{ $food->name }}
            <a class="btn btn-success" href="{{ route('admin.food.create') }}">AGGIUNGI UN NUOVO PIATTO</a>
        </h1>
        <div class="mb-4">
            <a class="btn btn-warning" href=" {{route('admin.food.edit', $food) }} ">
                <i class="fa-solid fa-pencil"></i>
            </a>
            @include('admin.partials.form-delete', [
                'title'   => $food->name,
                'route'   => 'admin.food.destroy',
                'element' => $food
            ])
        </div>
        <div class="card w-75">
            <img src="{{ asset('storage/' . $food->cover_image) }}" class="card-img-top" alt="{{ $food->original_name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $food->name }}</h5>
                <p class="card-text">
                    {{ $food->ingredients }}
                </p>
                <p>
                    @if ($food->is_available)
                        Disponibile
                    @else
                        Non Disponibile
                    @endif
                </p>
                <span>
                    {{ $food->price }} &euro;
                </span>
            </div>
        </div>
    </div>
@endsection
