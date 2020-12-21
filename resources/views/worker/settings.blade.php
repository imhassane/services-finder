@extends('layouts.dashboard_worker')

@section('page_title') Paramètres du compte @endsection

@section('page_content')

    <div class="p-8">
        <h1 class="text-3xl font-bold">Paramètres du compte</h1>

        <div class="my-8">
            <p class="font-semibold pb-4 border-b">Numéro de téléphone</p>
            <div class="flex">
                <div class="w-64">
                    <p class="mt-3">Numéro actuel: {{ auth()->user()->worker->phone_number }}</p>
                </div>
                <form action="{{ route('worker_add_phone_number') }}" method="post" class="mb-4">
                    @csrf
                    <div class="my-4">
                        <input type="tel" name="phone_number" class="border py-1 px-3 rounded" @error('phone_number') border-red-500 @enderror />
                        <button type="submit" class="border rounded border-black px-3 py-1 bg-black text-white font-semibold">Mettre à jour</button>
                    </div>
                    @error('phone_number')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </form>
            </div>
        </div>

        <div class="my-8">
            <p class="font-semibold pb-4 border-b">Adresses</p>
            <form class="mb-4 border-b" action="{{ route('worker_add_address') }}" method="post">
                @error('latitude')
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror
                @error('longitude')
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror
                @csrf
                <input type="hidden" name="latitude" id="lat" />
                <input type="hidden" name="longitude" id="lon" />
                <div class="flex py-4">
                    <div class="flex-1">
                        <label for="quartier" class="block text-sm font-semibold">Quartier</label>
                        <input type="text" name="quartier" class="w-full border p-2 border rounded mt-4 @error('quartier') border-red-500 @enderror" />
                        @error('quartier')
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex-1 mx-2">
                        <label for="prefecture" class="block text-sm font-semibold">Préfecture</label>
                        <select name="prefecture" id="prefecture" class="w-full border p-2 border rounded mt-4 @error('prefecture') border-red-500 @enderror">
                            <option value="conakry">Conakry</option>
                        </select>
                        @error('prefecture')
                            <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex-1 flex flex-col justify-end">
                        <button
                            type="submit"
                            class="w-full bg-black border-black border rounded px-3 py-2 text-white font-semibold"
                        >
                            Ajouter
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="mb-8">
            <div class="flex py-4 font-semibold border-b">
                <div class="w-2/12">Quartier</div>
                <div class="w-2/12">Préfecture</div>
                <div class="w-2/12">Latitude</div>
                <div class="w-2/12">Longitude</div>
            </div>
            @foreach($coords as $coord)
                <div class="flex py-4 border-b">
                    <div class="w-2/12">
                        <p>{{ $coord->quartier }}</p>
                    </div>
                    <div class="w-2/12">
                        <p>{{ $coord->prefecture }}</p>
                    </div>
                    <div class="w-2/12">
                        <p>{{ $coord->latitude }}</p>
                    </div>
                    <div class="w-2/12">
                        <p>{{ $coord->longitude }}</p>
                    </div>
                    <div class="w-2/12">

                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@section('page_scripts')
    <script>
        window.addEventListener('load', () => {
           const position = JSON.parse(localStorage.getItem("x-user-position"));
           document.querySelector("#lat").value = position.latitude;
           document.querySelector("#lon").value = position.longitude;
        });
    </script>
@endsection
