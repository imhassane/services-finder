@extends('layouts.dashboard_admin')

@section('page_title') Collaborateurs @endsection

@section('page_content')
    <div class="py-2 px-5">
        <h1 class="font-bold text-3xl pb-4 border-b-2">Collaborateurs</h1>

        <div class="my-4 border-b">
            <p class="text-sm">{{ $collaborators->count() }} collaborateurs enregistrés</p>
        </div>

        <div>
            <div class="flex py-3 font-semibold border-b">
                <div class="w-1/12">Id</div>
                <div class="w-2/12">Nom</div>
                <div class="w-4/12">Email</div>
                <div class="flex-1"></div>
            </div>
            @foreach($collaborators as $w)
                <div class="flex py-3 border-b text-sm cursor-pointer">
                    <div class="w-1/12">{{ $w->id }}</div>
                    <div class="w-2/12">{{ $w->name }}</div>
                    <div class="w-4/12">{{ $w->email }}</div>
                    <div class="flex-1">
                        <ul class="w-full flex justify-end">
                            <li class="mr-3">
                                <a href=""><i class="fas fa-envelope"></i></a>
                            </li>
                            <li>
                                @if($w->visible == 1)
                                    <form action="{{ route('block_user', $w) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button><i class="fas fa-times-circle text-red-500"></i></button>
                                    </form>
                                @else
                                    <form action="{{ route('activate_user', $w) }}" method="post">
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
