
@extends('layouts.admin')

@section('content')

<div class="container text-light py-5">

    <h1 class="mb-3">Modifica il tuo profilo

    </h1>
    <form action=" {{ route('admin.users.update', Auth::user() ) }} " method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- ? name --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nome *</label>
            <input type="text" name="name"
                class="form-control  @error('name')
                is-invalid  @enderror"
                id="name" placeholder="inserire il nome"
                value="{{ old('name', $user->name) }} ">
            <div class="invalid-feedback">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>

        {{-- ? surname --}}
        <div class="mb-3">
            <label for="surname" class="form-label">Cognome *</label>
            <input type="text" name="surname"
                class="form-control  @error('surname')
                is-invalid  @enderror"
                id="surname" placeholder="inserire il cognome"
                value="{{ old('surname', $user->surname) }} ">
            <div class="invalid-feedback">
                @error('surname')
                    {{ $message }}
                @enderror
            </div>
        </div>

        {{-- ? address --}}
        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo *</label>
            <input type="text" name="address"
                class="form-control  @error('address')
                is-invalid  @enderror"
                id="address" placeholder="inserire l'indirizzo"
                value="{{ old('address', $user->address) }} ">
            <div class="invalid-feedback">
                @error('address')
                    {{ $message }}
                @enderror
            </div>
        </div>

        {{-- ? phone_number --}}
        <div class="mb-3">
            <label for="phone_number" class="form-label">Cellulare *</label>
            <input type="text" name="phone_number"
                class="form-control  @error('phone_number')
                is-invalid  @enderror"
                id="phone_number" placeholder="inserire il numero di telefono"
                value="{{ old('phone_number', $user->phone_number) }} ">
            <div class="invalid-feedback">
                @error('phone_number')
                    {{ $message }}
                @enderror
            </div>
        </div>

        {{-- ? email --}}
        <div class="mb-3">
            <label for="email" class="form-label">E-mail *</label>
            <input type="text" name="email"
                class="form-control  @error('email')
                is-invalid  @enderror"
                id="email" placeholder="inserire l'email"
                value="{{ old('email', $user->email) }} ">
            <div class="invalid-feedback">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
        </div>


        <div class="mb-3 text-center">
            <button class="btn btn-outline-success px-5" type="submit">Modifica</button>
        </div>

    </form>

@endsection

