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
                <table class="px-3">
                    <thead>
                        <th class="w-20">Image</th>
                        <th class="w-1/4">Titre</th>
                        <th>Description</th>
                        <th class="w-24"></th>
                    </thead>
                    <tbody>
                        @foreach($categories as $cat)
                            <tr class="hover:bg-gray-200 cursor-pointer border-b">
                                <td>
                                    <img src="{{ $cat->cover }}" alt="" class="w-12 h-12 object-cover rounded-full mx-auto">
                                </td>
                                <td class="pl-2 py-8">{{ $cat->title  }}</td>
                                <td>{{ $cat->description }}</td>
                                <td>
                                    <a href="" class="text-red-500">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="font-semibold">Aucune catégorie pour le moment</p>
            @endif
        </div>
    </div>
@endsection
