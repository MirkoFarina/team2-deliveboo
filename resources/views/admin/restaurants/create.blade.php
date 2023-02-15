@extends('layouts.admin')

@section('content')
    <div class="bg-dark py-5 h-100 ">
        <div class="container text-light ">

            <h1 class="mb-3">Registrazione del tuo ristorante</h1>
            <form action=" {{route('admin.restaurants.store')}} " method="POST" enctype="multipart/form-data">
                @csrf

                {{-- ? name --}}
                <div class="mb-3 w-50">
                    <label for="name_of_restaurant" class="form-label">Nome del ristorante * </label>
                    <input type="text" name="name_of_restaurant"
                        class="form-control  @error('name_of_restaurant')
                    is-invalid  @enderror"
                        id="name_of_restaurant" placeholder="inserire il nome del ristorante" value=" {{ old('name_of_restaurant') }} ">
                    <div class="invalid-feedback">
                        @error('name_of_restaurant')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- ? p.iva --}}
                <div class="mb-3 w-50">
                    <label for="p_iva" class="form-label">Partita IVA * </label>
                    <input type="text" name="p_iva"
                        class="form-control @error('p_iva')
                    is-invalid  @enderror"
                        id="p_iva" placeholder="inserire la partita IVA" value=" {{ old('p_iva') }} ">
                    <div class="invalid-feedback">
                        @error('p_iva')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- ? p.iva --}}
                <div class="mb-3 w-50">
                    <label for="website" class="form-label">Sito web</label>
                    <input type="text" name="website"
                        class="form-control @error('website')
                    is-invalid  @enderror"
                        id="website" placeholder="link del tuo sito web" value=" {{ old('website') }} ">
                    <div class="invalid-feedback">
                        @error('website')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- ? Indirizzo --}}
                <div class="mb-3 w-50">
                    <label for="address" class="form-label">Indirizzo * </label>
                    <input type="text" name="address"
                        class="form-control @error('address')
                    is-invalid  @enderror"
                        id="address" placeholder="Inserisci l'indirizzo della tua attività" value=" {{ old('address') }} ">
                    <div class="invalid-feedback">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- ? phone_number --}}
                <div class="mb-3 w-50">
                    <label for="phone_number" class="form-label">Numero di telefono * </label>
                    <input type="text" name="phone_number"
                        class="form-control @error('phone_number')
                    is-invalid  @enderror"
                        id="phone_number" placeholder="Inserisci il numero di telefono della tua attività" value=" {{ old('phone_number') }} ">
                    <div class="invalid-feedback">
                        @error('phone_number')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- ? email --}}
                <div class="mb-3 w-50">
                    <label for="email" class="form-label">E-mail *</label>
                    <input type="text" name="email"
                        class="form-control @error('email')
                    is-invalid  @enderror"
                        id="email" placeholder="Inserisci l'email " value=" {{ old('email') }} ">
                    <div class="invalid-feedback">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                {{-- caricamento immagine --}}

                <button class="btn btn-primary" type="submit">Registra</button>

            </form>

        </div>
    </div>


@endsection
