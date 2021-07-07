@extends('layouts.dashboard_admin')

@section('page_title') Nouveau collaborateur @endsection

@section('page_content')
    <div class="py-2 px-5">
        <h1 class="font-bold text-3xl pb-4 border-b-2">Ajouter un collaborateur</h1>

        @if(session('success'))
            <div class="my-8 py-4 px-3 bg-green-500 border-green-500 border rounded">
                <p class="text-sm text-white">{{ session('success') }}</p>
            </div>
        @endif

        <form method="post" action="{{ route('collaborators_admin_add') }}" class="my-8">
            @csrf

            <div>
                <label for="name" class="font-semibold mb-3 block">Nom complet</label>
                <input type="text" name="name"
                       class="border rounded px-3 py-2 w-full @error('name') border-red-500 @enderror"
                       value="{{ old('name') }}"
                />
            </div>

            <div class="my-3">
                <label for="email" class="font-semibold mb-3 block">Adresse email</label>
                <input type="email" name="email"
                       class="border rounded px-3 py-2 w-full @error('email') border-red-500 @enderror"
                       value="{{ old('email') }}"
                />
            </div>

            <div>
                <button
                    type="submit"
                    class="bg-black text-white font-semibold px-3 py-1 border border-black rounded"
                >Ajouter</button>
            </div>

        </form>
    </div>
@endsection
