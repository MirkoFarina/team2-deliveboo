<ul>
    @foreach ($lead->cart->foods as $food)
        <li>Piatto: {{ $food->name }}
            Quantità:{{ $food->quantity }}</li>
    @endforeach
</ul>

<p>
    Indirizzo: {{$lead->address}}
</p>

<p>
    Totale : {{ $lead->cart->total_amount }} &euro;
</p>
