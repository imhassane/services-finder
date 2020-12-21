@extends('layouts.dashboard_admin')

@section('page_title') Ajouter une catégorie @endsection

@section('page_content')
    <div class="w-full px-5 py-2 bg-white h-full">
        <h1 class="font-bold text-3xl pb-3 border-b-2">Ajouter une catégorie</h1>

        @if(session('fail'))
            <div class="w-full bg-red-500 my-4 border border-red-500 text-white p-2">
                <p>{{ session('fail') }}</p>
            </div>
        @elseif(session('success'))
            <div class="w-full bg-green-500 my-4 border border-green-500 text-white p-2">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="my-4">
            <form action="{{ route('add_category_admin') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="title" class="font-semibold mb-3 block">Titre de la catégorie</label>
                    <input
                        type="text" id="title" name="title"
                        class="border rounded px-3 py-2 w-full @error('title') border-red-500 @enderror"
                        value="{{ old('title') }}"
                    />
                    @error('title')
                        <p class="text-sm text-red-500 my-2">{{ $message  }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="font-semibold mb-3 block">Description</label>
                    <textarea
                        name="description" id="description" rows="4"
                        class="border rounded px-3 py-2 w-full @error('description') border-red-500 @enderror"
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-sm text-red-500 my-2">{{ $message  }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="cover" class="font-semibold mb-3 block">Couverture</label>
                    <input
                        type="text" id="cover" name="cover"
                        class="border rounded px-3 py-2 w-full @error('cover') border-red-500 @enderror"
                        value="{{ old('cover') }}"
                    />
                    @error('cover')
                    <p class="text-sm text-red-500 my-2">{{ $message  }}</p>
                    @enderror
                </div>
                <div>
                    <button
                        type="submit"
                        class="bg-black text-white font-semibold px-3 py-1 border border-black rounded"
                    >Ajouter</button>
                </div>
            </form>
        </div>
    </div>
@endsection
