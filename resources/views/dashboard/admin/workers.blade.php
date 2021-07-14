@extends('layouts.dashboard_admin')

@section('page_title') Travailleurs @endsection

@section('page_content')

    <div class="py-2 px-5">
        <h1 class="font-bold text-3xl pb-4 border-b-2">Liste des travailleurs</h1>

        <div class="my-4 border-b">
            <p class="text-sm">{{ $workers->count() }} travailleurs enregistrés</p>
        </div>

        @if(session('success'))
            <div class="my-4 py-3 px-2 bg-green-500 text-white">{{ session('success') }}</div>
        @endif

        <div>
            <div class="flex py-3 font-semibold border-b">
                <div class="w-1/12">Id</div>
                <div class="w-2/12">Prénom</div>
                <div class="w-2/12">Nom</div>
                <div class="w-2/12">Télephone</div>
                <div class="w-2/12">Quartier</div>
                <div class="w-1/12">Préfecture</div>
                <div class="flex-1"></div>
            </div>
            @foreach($workers as $w)
                <div class="flex py-3 border-b text-sm cursor-pointer">
                    <div class="w-1/12">{{ $w->id }}</div>
                    <div class="w-2/12">{{ $w->first_name }}</div>
                    <div class="w-2/12">{{ $w->last_name }}</div>
                    <div class="w-2/12">{{ $w->phone_number }}</div>
                    <div class="w-2/12">
                        @if($w->coords->first())
                            {{ $w->coords->first()->quartier }}
                        @endif
                    </div>
                    <div class="w-1/12">
                        @if($w->coords->first())
                            {{ $w->coords->first()->prefecture }}
                        @endif
                    </div>
                    <div class="flex-1">
                        <ul class="w-full flex justify-end">
                            <li class="mr-3">
                                <a href=""><i class="fas fa-envelope"></i></a>
                            </li>
                            <li>
                                @if($w->user->visible == 1)
                                    <form action="{{ route('block_user', $w->user) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button><i class="fas fa-times-circle text-red-500"></i></button>
                                    </form>
                                @else
                                    <form action="{{ route('activate_user', $w->user) }}" method="post">
                                        @csrf
                                        <button><i class="fas fa-check-circle text-green-500"></i></button>
                                    </form>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
