@extends('layouts.default')

@section('page_title') Bienvenue @endsection

@section('head')
    <style>
        #home-form {
            position: absolute;
            z-index: 10;
            top: 0;
            min-height: 100%;
            min-width: 100%;
            background-color: rgba(0, 0, 0, .4);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
@endsection
@section('page_content')
    <input type="hidden" id="positionHf" />
<div class="h-screen relative">
    <div class="grid grid-cols-1 md:grid-cols-3" id="img-grid">
        <img src="{{ $bag }}" class="h-screen w-full" />
        <img src="{{ $beach }}" class="hidden w-full sm:block h-screen" />
        <img src="{{ $farmer }}" class="hidden w-full sm:block h-screen" />
        <!--
        <img src="{{ $carpenter }}" />
        <img src="{{ $old_guy }}" />
        <img src="{{ $young_woman }}" />
        -->
    </div>
    <div class="px-6 md:px-32 text-white" id="home-form">
        <h1 class="font-bold text-xl md:text-3xl" style="line-height: 150%;">
            Trouvez des personnes prêtes à vous rendre service à proximité de vous!
        </h1>
        <p class="my-5 text-lg font-semibold px-3 py-4 bg-white text-black rounded border-l-4 border-gray-500">
            Aidez-nous à promouvoir notre main d'oeuvre locale et valoriser notre économie
        </p>
        <form method="get" action="{{ route('search') }}"
              class="mt-5 md:mt-16 md:flex w-full bg-white text-black p-4 rounded">
            <div class="flex-1 mb-4 md:mb-0 mr-4">
                <label for="skill" class="font-semibold mb-4">Service</label>
                <select name="service" id="skill" class="w-full border px-3 py-2 mt-4 rounded">
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-40 flex flex-col justify-end">
                <button
                    type="submit"
                    class="w-full px-3 py-2 bg-black text-white font-semibold border border-black rounded"
                >
                    <i class="fas fa-search mr-2"></i>
                    Rechercher
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section("page_scripts")
    <script>
        window.addEventListener("load", () => {
           if(localStorage.getItem("x-user-position")) {
               const position = JSON.parse(localStorage.getItem("x-user-position"));
               document.querySelector("#position").value = `${position.city}, ${position.country_name}`;
               document.querySelector("#positionHf").value = `${position.latitude}_${position.longitude}`;
           }
        });
    </script>
@endsection
