<h1>
    IL TUO ORDINE &Egrave; STATO RICEVUTO DAL RISTORANTE.
</h1>

<p>
    ECCO IL RIEPILOGO DEL TUO CARRELLO:
</p>

<ul>
    @foreach ($lead->cart->foods as $food)
        <li>Piatto: {{ $food->name }}
            Quantità:{{ $food->quantity }}</li>
    @endforeach
</ul>

<p>
    IL TUO TOTALE : {{ $lead->cart->total_amount }} &euro;
</p>


<h2>
    GRAZIE PER AVER SCELTO {{ $lead->name_res }}, BUON APPETTITO :)
</h2>
