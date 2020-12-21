@extends('layouts.default')

@section('page_title') Bienvenue @endsection

@section('page_content')
<div class="h-full">
    <div class="flex flex-col justify-center h-full md:px-32">
        <h1 class="font-bold text-5xl" style="line-height: 60px">
            Trouvez des personnes prêtes à vous rendre service à proximité de vous!
        </h1>
        <form method="get" action="{{ route('search') }}" class="mt-24 flex w-full">
            <div class="flex-1 mr-2">
                <label for="position" class="font-semibold mb-4">Position</label>
                <input type="text" id="position"
                       class="w-full border px-3 py-2 mt-4 rounded cursor-not-allowed"
                       disabled="disabled"
                />
                <input type="hidden" name="position" id="positionHf" />
            </div>
            <div class="flex-1 mr-4">
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
