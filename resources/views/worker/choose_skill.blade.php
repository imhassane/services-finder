@extends('layouts.default')

@section('page_title') Choix des compétences @endsection

@section('page_content')
    <div class="h-full pt-20">
        <div class="bg-white w-3/4 p-6 border mx-auto">
            <h1 class="text-3xl font-bold mb-10">Choix de vos compétences</h1>

            <p class="mx-2 mb-4 text-sm text-gray-500 font-semibold">
                {{ auth()->user()->skills->count() }} / 3 compétences choisies
            </p>

            <div class="flex flex-wrap items-center">
                @foreach($skills as $skill)
                    <div class="md:w-1/5 p-1">
                        @if(!$skill->hasUser(auth()->user()))
                            <form method="post" action="{{ route('select_skill', $skill) }}" class="p-1">
                                @csrf
                                <div class="mb-1">
                                    <img
                                        class="object-cover w-full h-24"
                                        src="{{ $skill->cover }}" alt="" />
                                </div>
                                <p class="font-semibold my-2">{{ $skill->title }}</p>
                                <p class="mb-2 text-sm">{{ $skill->users->count() }} personnes</p>
                                @if(auth()->user()->skills->count()  < 3)
                                    <button
                                        type="submit"
                                        class="border rounded px-3 py-1 bg-black text-white font-semibold w-full border-black"
                                    >Selectionner</button>
                                @else
                                    <button
                                        type="submit"
                                        class="border rounded px-3 py-1 bg-black text-white font-semibold w-full border-black cursor-not-allowed"
                                        disabled="true"
                                    >Selectionner</button>
                                @endif
                            </form>
                        @else
                            <form action="{{ route('unselect_skill', $skill) }}" method="post">
                                @csrf
                                <div class="mb-1">
                                    <img
                                        class="object-cover w-full h-24"
                                        src="{{ $skill->cover }}" alt="" />
                                </div>
                                <p class="font-semibold my-2">{{ $skill->title }}</p>
                                <p class="mb-2 text-sm">{{ $skill->users->count() }} personnes</p>
                                <button
                                    type="submit"
                                    class="border rounded px-3 py-1 bg-red-500 text-white font-semibold w-full border-red-500"
                                >Annuler</button>
                            </form>
                        @endif
                    </div>
                @endforeach
                @if(auth()->user()->skills->count())
                    <p class="flex justify-end w-full">
                        <a href="{{ route('worker_dashboard') }}" class="px-3 py-2 bg-black text-white my-6 border-black rounded">
                            Continuer vers le tableau de bord
                        </a>
                    </p>
                @endif
            </div>

        </div>
    </div>
@endsection
