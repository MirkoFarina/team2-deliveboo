@extends('layouts.admin')

@section('content')
    <div class="container text-light py-5">

        <h1 class="mb-3">Registra il tuo ristorante</h1>
        <form action=" {{ route('admin.restaurants.store') }} " method="POST" enctype="multipart/form-data">
            @csrf

            {{-- ? name --}}
            <div class="mb-3">
                <label for="name_of_restaurant" class="form-label">Nome del ristorante * </label>
                <input required maxlength="75" type="text" name="name_of_restaurant"
                    class="form-control  @error('name_of_restaurant')
                    is-invalid  @enderror"
                    id="name_of_restaurant" placeholder="inserire il nome del ristorante"
                    value="{{ old('name_of_restaurant') }}">
                <div class="invalid-feedback">
                    @error('name_of_restaurant')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            {{-- ? p.iva --}}
            <div class="mb-3">
                <label for="p_iva" class="form-label">Partita IVA * </label>
                <input required maxlength="11" type="number" name="p_iva"
                    class="form-control @error('p_iva')
                    is-invalid  @enderror" id="p_iva"
                    placeholder="inserire la partita IVA" value="{{ old('p_iva') }}">
                <div class="invalid-feedback">
                    @error('p_iva')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            {{-- ? p.iva --}}
            <div class="mb-3">
                <label for="website" class="form-label">Sito web</label>
                <input maxlength="255" type="text" name="website"
                    class="form-control @error('website')
                    is-invalid  @enderror" id="website"
                    placeholder="link del tuo sito web" value="{{ old('website') }}">
                <div class="invalid-feedback">
                    @error('website')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            {{-- ? Indirizzo --}}
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo * </label>
                <input required type="text" name="address"
                    class="form-control @error('address')
                    is-invalid  @enderror" id="address"
                    placeholder="Inserisci l'indirizzo della tua attività" value="{{ old('address') }}">
                <div class="invalid-feedback">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            {{-- ? phone_number --}}
            <div class="mb-3">
                <label for="phone_number" class="form-label">Numero di telefono * </label>
                <input required maxlength="12" type="text" name="phone_number"
                    class="form-control @error('phone_number')
                    is-invalid  @enderror" id="phone_number"
                    placeholder="Inserisci il numero di telefono della tua attività" value="{{ old('phone_number') }}">
                <div class="invalid-feedback">
                    @error('phone_number')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            {{-- ? email --}}
            <div class="mb-3">
                <label for="email" class="form-label">E-mail *</label>
                <input required type="email" name="email"
                    class="form-control @error('email')
                    is-invalid  @enderror" id="email"
                    placeholder="Inserisci l'email " value="{{ old('email') }}">
                <div class="invalid-feedback">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            {{-- caricamento immagine --}}

            {{-- ? cover_image --}}
            <div class="mb-3">
                <label for="cover_image" class="form-label">Image*</label>
                <input required onchange="showImage(event)" type="file" name="cover_image"
                    class="form-control bg-dark text-light @error('cover_image')
                    is-invalid  @enderror"
                    id="cover_image" placeholder="inserire l'url dell'immagine" value=" {{ old('cover_image') }} ">
                <div class="invalid-feedback">
                    @error('cover_image')
                        {{ $message }}
                    @enderror
                </div>
                <div>
                    <img width="300" id="preview_image" src="  " alt="" class="my-2">
                </div>
            </div>

            {{-- ? categories --}}
            <div class="mb-3">
                <label for="categories" class="d-block mb-3">Categorie*:</label>
                @foreach ($categories as $cat)
                    <input class="@error('categories')
                    is-invalid  @enderror" id="categories{{ $loop->iteration }}" type="checkbox" name="categories[]"
                        value=" {{ $cat->id }} " @if (in_array($cat->id, old('categories', []))) checked @endif>
                    <label class="me-3" for="technologies{{ $loop->iteration }}"> {{ $cat->name }} </label>
                    @endforeach
                    <div class="invalid-feedback">
                        @error('categories')
                            {{ $message }}
                        @enderror
                    </div>
            </div>

            <div class="mb-3 text-center">
                <button class="btn btn-success" type="submit">Registra</button>
            </div>

        </form>

    </div>


    <script>
        function showImage(event) {
            const tagImage = document.getElementById('preview_image');
            tagImage.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
