@extends('layouts.default')

@section('page_title') Recherche de service @endsection

@section('page_content')

    <div class="py-10 px-5">
        <h1 class="text-3xl font-bold mb-10">Services à proximité de chez vous</h1>

        <form
            method="get" action="{{ route('search') }}"
            class="mb-8 py-6 border-t-2 border-b-2 flex items-center"
        >
            <div class="flex-1 flex">
                <div class="md:w-1/2 mr-1">
                    <input
                        type="text" name="quartier" placeholder="Quartier"
                        class="border-2 rounded px-3 py-1 w-full"
                    />
                </div>
                <div class="md:w-1/2">
                    <input
                        type="text" name="prefecture" placeholder="Préfecture" value="Conakry"
                        class="border-2 rounded px-3 py-1 w-full"
                    />
                </div>
            </div>
            <div class="flex-1 mx-2">
                <select name="service" id="service" class="w-full border-2 rounded px-3 py-1">
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-40">
                <button
                    type="submit"
                    class="px-3 py-1 bg-black text-white font-semibold border border-black rounded"
                >
                    <i class="fas fa-search mr-2"></i>
                    Appliquer
                </button>
            </div>
        </form>

        <div class="py-8">

            <div class="flex">
                @foreach($workers as $w)
                    <div class="w-1/5 px-1">
                        <div class="border shadow rounded-b">
                            <div>
                                <img class="object-cover h-32 w-full" src="{{ $w->avatar }}" alt="" />
                            </div>
                            <div class="px-2 py-4">
                                <p class="font-semibold">{{ $w->first_name }} {{ $w->last_name }}</p>
                                <div class="flex my-3">
                                    @for($i = 0; $i < floor($w->note); $i++)
                                        <i class="text-yellow-500 fas fa-star"></i>
                                    @endfor
                                    @for($i = floor($w->note); $i < 5; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                </div>
                                <div class="my-4">
                                    <button class="w-full py-2 px-1 border border-black rounded">
                                        <i class="fas fa-phone-alt mr-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
