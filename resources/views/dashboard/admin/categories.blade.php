@extends('layouts.dashboard_admin')

@section('page_title') Catégories @endsection

@section('page_content')
    <div class="px-5 py-2 bg-white w-full h-full">
        <h1 class="font-bold text-3xl pb-4 border-b-2">Gestion des catégories</h1>
        <div class="my-4 pb-4 border-b-2 flex">
            <a href="{{ route('add_category_admin') }}" class="px-3 py-1 bg-black text-white font-semibold border border-black rounded">Ajouter</a>
        </div>

        <div>

            @if($categories->count())
                    <div class="flex">
                        <div class="w-24">Image</div>
                        <div class="w-3/12">Titre</div>
                        <div class="w-5/12">Description</div>
                        <div class="flex-1"></div>
                    </div>
                    <div>
                        @foreach($categories as $cat)
                            <div class="flex hover:bg-gray-100 cursor-pointer border-b text-sm py-4">
                                <div class="w-24">
                                    <img src="{{ $cat->cover }}" alt="" class="w-12 h-12 object-cover rounded-full">
                                </div>
                                <div class="w-3/12">{{ $cat->title  }}</div>
                                <div class="w-5/12">{{ $cat->description }}</div>
                                <td class="flex-1">
                                    @if($cat->visible == 1)
                                        <form action="{{ route('destroy_category_admin', $cat) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button
                                                type="submit"
                                                class="bg-red-500 text-white font-semibold border border-red-500 rounded px-3 py-1"
                                            >Masquer</button>
                                        </form>
                                    @else
                                        <form action="{{ route('activate_category_admin', $cat) }}" method="post">
                                            @csrf
                                            <button
                                                type="submit"
                                                class="bg-blue-500 text-white font-semibold border border-blue-500 rounded px-3 py-1"
                                            >Activer</button>
                                        </form>
                                    @endif
                                </td>
                            </div>
                        @endforeach
                    </div>
            @else
                <p class="font-semibold">Aucune catégorie pour le moment</p>
            @endif
        </div>
    </div>
@endsection
