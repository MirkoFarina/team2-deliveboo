@extends('layouts.admin')

@section('content')

    <div class="container py-5 text-light">
        <h1>
            CREA UN NUOVO CIBO
        </h1>
        <form action="{{route('admin.food.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome *</label>
                <input type="text" maxlength="75" required value="{{ old('name') }}"  class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome ...">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo *</label>
                <input required min="0" max="999.99" type="number" step="any" value="{{ old('price') }}" class="form-control  @error('price') is-invalid @enderror" id="price" name="price" placeholder="Inserisci il prezzo ...">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredienti *</label>
                <input required type="text" value="{{ old('ingredients') }}" class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" name="ingredients" placeholder="Inserisci gli ingredienti ...">
                @error('ingredients')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="is_available">Disponibilità*</label>
                <select class="form-select" name="is_available">
                    <option selected  value="1">Disponibile</option>
                    <option value="0">Non Disponibile</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label @error('cover_image') text-danger @enderror">UPLOAD image *
                </label>
                <input required onchange="showImg(event)" type="file"
                    class="form-control mb-2 @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image"
                    placeholder="IMAGE ... ">
                @error('cover_image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="show-img text-center mt-5">
                    <img class="w-50" id="image_thumb_up" src="" alt="">
                </div>
            </div>
            <div class="mb-3 text-center">
                <button class="btn btn-success" type="submit"> Aggiungi </button>
            </div>
        </form>
    </div>




    <script>
        function showImg(event) {
            const tagImage = document.getElementById('image_thumb_up');
            tagImage.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
