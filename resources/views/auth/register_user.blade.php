@extends('layouts.default')

@section('page_title') Inscription @endsection

@section('page_content')

    <div class="h-full flex flex-col justify-center">
        <div class="md:w-1/2 bg-white mx-auto p-8">
            <h1 class="font-bold text-3xl mb-5">Inscription</h1>

            <div class="flex">
                <form action="" method="post" class="w-1/2 mr-2">
                    @csrf
                    <button
                        type="submit"
                        class="w-full py-2 px-3 border rounded"
                    >M'inscrire avec google</button>
                </form>

                <form action="" method="post" class="w-1/2">
                    @csrf
                    <button
                        type="submit"
                        class="w-full py-2 px-3 border rounded">M'inscrire avec Facebook</button>
                </form>
            </div>

            <form action="{{ route('register_worker') }}" method="post">
                @csrf
                <div class="md:flex my-4">
                    <div class="flex-1 mr-2">
                        <label for="firstName" class="font-semibold mb-3 block">Prénom</label>
                        <input
                            type="text" id="firstName" name="firstName"
                            class="border px-2 py-2 w-full rounded"
                        />
                    </div>
                    <div class="flex-1">
                        <label for="lastName" class="font-semibold mb-3 block">Prénom</label>
                        <input
                            type="text" id="lastName" name="lastName"
                            class="border px-2 py-2 w-full rounded"
                        />
                    </div>
                </div>
                <div class="flex-1 mb-4">
                    <label for="email" class="font-semibold mb-3 block">Adresse email</label>
                    <input
                        type="text" id="email" name="email"
                        class="border px-2 py-2 w-full rounded"
                    />
                </div>
                <div class="md:flex mb-4">
                    <div class="flex-1 mr-2">
                        <label for="password" class="font-semibold mb-3 block">Mot de passe</label>
                        <input
                            type="text" id="password" name="password"
                            class="border px-2 py-2 w-full rounded"
                        />
                    </div>
                    <div class="flex-1">
                        <label for="rptPassword" class="font-semibold mb-3 block">Repetez le mot de passe</label>
                        <input
                            type="text" id="rptPassword" name="password_confirmation"
                            class="border px-2 py-2 w-full rounded"
                        />
                    </div>
                </div>
                <div class="mb-4">
                    <input type="checkbox" name="agree" id="agree" class="border" />
                    <label for="agree" class="ml-3 font-semibold">
                        En m'inscrivant, je confirme avoir lu les règles de la plateforme
                    </label>
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
