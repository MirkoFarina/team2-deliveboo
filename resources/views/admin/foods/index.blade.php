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

        <h1>
            TABELLA CIBI
            <a class="btn btn-success" href="{{route('admin.food.create')}}">AGGIUNGI UN NUOVO PIATTO</a>
        </h1>
        @if (session('delete'))
            <div class="alert alert-success" role="alert">
                {{ session('delete') }}
            </div>
        @endif
        <table class="table text-light">
            <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Disponibile</th>
                <th scope="col">Azioni</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($foods as $food )
                    <tr>
                    <td>{{ $food->name}} </td>
                    <td> {{$food->price}} &euro;</td>
                    <td>
                        @if ($food->is_available)
                            Disponibile
                        @else
                            Non Disponibile
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary" href=" {{ route('admin.food.show', $food) }} ">
                            <i class="fa-regular fa-eye"></i>
                        </a>
                        <a class="btn btn-warning" href=" {{route('admin.food.edit', $food) }} ">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        @include('admin.partials.form-delete', [
                            'title'   => $food->name,
                            'route'   => 'admin.food.destroy',
                            'element' => $food
                        ])
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
