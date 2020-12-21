@extends('layouts.default')

@section('page_title') Connexion @endsection

@section('page_content')

    <div class="h-full pt-20">
        <div class="w-1/2 mx-auto p-12 bg-white">

            <h1 class="text-3xl font-bold mb-10">Connexion</h1>

            @if(session('fail'))
                <div class="my-8 py-4 px-3 bg-red-500 border-red-500 border rounded">
                    <p class="text-sm text-white">{{ session('fail') }}</p>
                </div>
            @endif

            <div class="my-6 flex">
                <form class="flex-1 mr-1" action="" method="post">
                    @csrf
                    <button
                        type="submit"
                        class="w-full border py-1 rounded"
                    >Se connecter avec Google</button>
                </form>
                <form class="flex-1" action="" method="post">
                    @csrf
                    <button
                        type="submit"
                        class="w-full border py-1 rounded"
                    >Se connecter avec facebook</button>
                </form>
            </div>

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="font-semibold block mb-3">Adresse email</label>
                    <input
                        type="email" name="email" id="email"
                        class="border px-3 py-2 rounded w-full @error('email') border-red-500 @enderror"
                    />
                    @error('email')
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
        </div>
    </div>

@endsection
