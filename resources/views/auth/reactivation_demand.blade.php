@extends('layouts.default')

@section('page_title') Demande de reactivation @endsection

@section('page_content')

    <div class="h-full md:pt-20">
        <div class="md:w-1/2 mx-auto p-4 md:p-12">

            <h1 class="font-bold text-3xl mb-10">Demande de reactivation du compte</h1>

            <form action="{{ route('reactivation_demand') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="email" class="font-semibold block mb-3">Adresse email</label>
                    <input
                        type="email" id="email" name="email"
                        class="border px-3 py-2 rounded w-full @error('email') border-red-500 @enderror" />
                </div>

                <div class="mb-4">
                    <label for="message" class="font-semibold block mb-3">Message</label>
                    <textarea name="message" id="message"
                        class="border px-3 py-2 rounded h-24 w-full @error('message') border-red-500 @enderror"
                    ></textarea>
                </div>

                <div>
                    <button
                        type="submit"
                        class="bg-black border-black text-white font-semibold rounded py-2 w-full"
                    >Valider ma demande</button>
                </div>
            </form>

        </div>
    </div>

@endsection
