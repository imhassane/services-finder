@extends('layouts.default')

@section('page_title')Choix du type de compte @endsection

@section('page_content')
    <div class="h-full pt-20">
        <div class="md:w-1/2 bg-white mx-auto p-14">
            <h1 class="font-bold text-3xl">Choisissez le type de compte</h1>

            <div class="my-5 flex">
                <div class="border rounded p-2 bg-gray-200 h-32 flex-1 flex justify-center items-center mr-2">
                    <a href="{{ route('register_worker') }}" class="font-semibold text-lg">Je propose mes compétences</a>
                </div>
                <div class="border rounded p-2 bg-gray-200 h-32 flex-1 flex justify-center items-center">
                    <a href="{{ route('register_user') }}" class="font-semibold text-lg">Je cherche des compétences</a>
                </div>
            </div>
        </div>
    </div>
@endsection
