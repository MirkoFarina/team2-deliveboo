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
        <div class="d-flex justify-content-around align-items-center mb-3 flex-wrap">
            <h1 class="fs-4">TABELLA CIBI</h1>
            <a class="btn btn-success fs-6" href="{{route('admin.food.create')}}">Aggiungi un nuovo piatto</a>
        </div>
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
                        <a class="btn btn-outline-primary mx-2 px-4 my-1" href=" {{ route('admin.food.show', $food) }} ">
                            <i class="fa-regular fa-eye"></i>
                        </a>
                        <a class="btn btn-outline-warning mx-2 px-4 my-1" href=" {{route('admin.food.edit', $food) }} ">
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
        <div class="d-flex justify-content-center">
            {{ $foods->links() }}
        </div>
    </div>

@endsection
