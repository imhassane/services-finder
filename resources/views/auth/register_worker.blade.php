@extends('layouts.default')

@section('page_title') Inscription @endsection

@section('page_content')

    <div class="h-full flex flex-col justify-center">
        <div class="md:w-1/2 bg-white mx-auto p-8">
            <h1 class="font-bold text-3xl">Inscription</h1>

            <form action="{{ route('register_worker') }}" method="post">
                @csrf
                <div class="md:flex my-4">
                    <div class="flex-1 mr-2">
                        <label for="firstName" class="font-semibold mb-3 block">Prénom</label>
                        <input
                            type="text" id="firstName" name="firstName"
                            class="border px-2 py-2 w-full rounded @error('firstName') border-red-500 @enderror"
                            value="{{ old('firstName') }}"
                        />
                        @error('firstName')
                            <p class="text-sm my-2 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="lastName" class="font-semibold mb-3 block">Nom</label>
                        <input
                            type="text" id="lastName" name="lastName"
                            class="border px-2 py-2 w-full rounded @error('lastName') border-red-500 @enderror"
                            value="{{ old('lastName') }}"
                        />
                        @error('lastName')
                            <p class="text-sm my-2 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex-1 mb-4">
                    <label for="phoneNumber" class="font-semibold mb-3 block">Numéro de téléphone</label>
                    <input
                        type="tel" id="phoneNumber" name="phoneNumber"
                        class="border px-2 py-2 w-full rounded @error('phoneNumber') border-red-500 @enderror"
                        value="{{ old('phoneNumber') }}"
                    />
                    @error('phoneNumber')
                        <p class="my-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="md:flex mb-4">
                    <div class="flex-1 mr-2">
                        <label for="password" class="font-semibold mb-3 block">Mot de passe</label>
                        <input
                            type="password" id="password" name="password"
                            class="border px-2 py-2 w-full rounded @error('password') border-red-500 @enderror"
                        />
                        @error('password')
                            <p class="my-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="rptPassword" class="font-semibold mb-3 block">Repetez le mot de passe</label>
                        <input
                            type="password" id="rptPassword" name="password_confirmation"
                            class="border px-2 py-2 w-full rounded"
                        />
                    </div>
                </div>
                <div>
                    <button
                        type="submit"
                        class="w-full bg-black border-black border text-white font-semibold py-2 px-3 rounded"
                    >Inscription</button>
                </div>
            </form>

        </div>
    </div>

@endsection
