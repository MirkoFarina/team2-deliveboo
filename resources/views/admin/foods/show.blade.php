@extends('layouts.admin')

@section('content')
    <ul>
        <li>
            {{ $food->name }}
        </li>
        <li>
            {{ $food->price }}
        </li>
        <li>
            {{ $food->ingredients }}
        </li>
        <li>
            @if ($food->is_available)
                Disponibile
            @else
                Non Disponibile
            @endif
        </li>
    </ul>
@endsection
