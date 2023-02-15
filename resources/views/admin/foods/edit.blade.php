@extends('layouts.admin')


@section('content')
    <div class="container py-5">
        <form action="{{route('admin.food.update', $food)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" value="{{ old('name', $food->name) }}" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome ...">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" value="{{ old('price', $food->price) }}" class="form-control  @error('price') is-invalid @enderror" id="price" name="price" placeholder="Inserisci il prezzo ...">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredienti</label>
                <input type="text" value="{{ old('ingredients', $food->ingredients) }}" class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" name="ingredients" placeholder="Inserisci gli ingredienti ...">
                @error('ingredients')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="is_available">Disponibilità:</label>
                <select class="form-select" name="is_available">
                    <option
                    @if($food->is_available) selected @endif value="true">Disponibile</option>
                    <option
                    @if(!$food->is_available) selected @endif value="false">Non Disponibile</option>
                </select>
            </div>
             <div class="mb-3">
                <label for="cover_image" class="form-label @error('cover_image') text-danger @enderror">UPLOAD image
                </label>
                <input onchange="showImg(event)" type="file"
                    class="form-control mb-2 @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image"
                    placeholder="IMAGE ... ">
                @error('cover_image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="show-img">
                    <img id="image_thumb_up" src="" alt="">
                </div>
            </div>
            <div class="mb-3 text-center">
                <button class="btn btn-success" type="submit"> INVIA </button>
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
