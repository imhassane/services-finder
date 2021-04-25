@extends('layouts.default')

@section('page_title') Connexion @endsection

@section('page_content')

    <div class="h-full md:pt-20">
        <div class="md:w-1/2 mx-auto p-4 md:p-12 bg-white">

            <h1 class="text-3xl font-bold mb-10">Connexion</h1>

            @if(session('fail'))
                <div class="my-8 py-4 px-3 bg-red-500 border-red-500 border rounded">
                    <p class="text-sm text-white">{{ session('fail') }}</p>
                </div>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="telephone" class="font-semibold block mb-3">Numéro de téléphone</label>
                    <input
                        type="tel" name="telephone" id="telephone"
                        class="border px-3 py-2 rounded w-full @error('telephone') border-red-500 @enderror"
                    />
                    @error('telephone')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="font-semibold block mb-3">Mot de passe</label>
                    <input
                        type="password" name="password" id="password"
                        class="border px-3 py-2 rounded w-full @error('password') border-red-500 @enderror"
                    />
                    @error('password')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="checkbox" class="border mr-3" name="remember" id="remember" />
                    <label for="remember">Se souvenir de moi</label>
                </div>
                <div>
                    <button
                        type="submit"
                        class="w-full bg-black text-white font-semibold border border-black px-3 py-2 rounded"
                    >Connexion</button>
                </div>
            </form>

            <div class="my-4">
                <a href="{{ route('reactivation_demand') }}" class="text-sm text-blue-500">Faire une demande de réactivation</a>
            </div>
        </div>
    </div>

@endsection
