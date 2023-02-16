@extends('layouts.admin')

@section('content')

    <div class="container text-light py-5">
        <h1>
            TABELLA ORDINI
        </h1>
        <table class="table text-light">
            <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Prezzo</th>
                <th scope="col">Disponibile</th>
                <th scope="col">Azioni</th>
            </tr>
            </thead>

        </table>
    </div>

@endsection
