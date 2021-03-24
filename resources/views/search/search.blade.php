@extends('layouts.default')

@section('page_title') Recherche de service @endsection

@section('page_content')

    <div class="py-10 px-5 md:px-12">
        <h1 class="text-3xl font-bold mb-10">Services à proximité de chez vous</h1>

        <form
            method="get" action="{{ route('search') }}"
            class="mb-8 py-6 border-t border-b md:flex items-center"
        >
            <input type="hidden" name="position" id="position" />
            <div class="flex-1 flex mr-2">
                <div class="md:w-1/2 mr-1">
                    <input
                        type="text" name="quartier" placeholder="Quartier"
                        class="border rounded px-3 py-1 w-full"
                        value="{{ is_null(request()->query('quartier')) ? null: request()->query('quartier') }}"
                    />
                </div>
                <div class="md:w-1/2">
                    <input
                        type="text" name="prefecture" placeholder="Préfecture" value="Conakry"
                        class="border rounded px-3 py-1 w-full"
                    />
                </div>
            </div>
            <div class="my-2 md:my-0 w-32">
                <input type="text" name="distance"
                       placeholder="Rayon"
                       value="{{ is_null(request()->query('distance')) ? 10: request()->query('distance') }}"
                       class="border rounded px-3 py-1 w-3/4"
                />
                <span class="text-sm ml-2">km</span>
            </div>
            <div class="flex-1 my-2 md:my-0 md:mx-2">
                <select name="service" id="service" class="w-full border rounded px-3 py-1">
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
                    <div class="w-full md:w-1/5 px-1">
                        <div class="border shadow rounded-b">
                            <div>
                                <img class="object-cover h-40 w-full" src="{{ $w->avatar }}" alt="" />
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
                                <p class="my-2 text-sm">{{ ceil($w->distance) }} km</p>
                                <div class="my-4">
                                    <button class="w-full py-2 px-1 border border-black rounded">
                                        <i class="fas fa-phone-alt mr-2"></i>
                                        {{ $w->phone_number }}
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

@section('page_scripts')
    <script>
        window.addEventListener('load', () => {
            const position = JSON.parse(localStorage.getItem("x-user-position"));
            document.querySelector("#position").value = `${position.latitude}_${position.longitude}`;
        });
    </script>
@endsection
