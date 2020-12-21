<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>@yield('page_title')</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');
            * {

            }
        </style>
    </head>
    <body class="h-screen">
        <header class="py-4 border-b-2 sticky top-0 z-50 bg-white">
            <nav class="flex">
                <ul class="flex justify-center items-center flex-1">
                    <li class="px-2 font-semibold">
                        <a href="/">Mon ouvrier</a>
                    </li>
                    <li class="px-2 font-semibold">
                        <a href="{{ route('dashboard') }}">Tableau de bord</a>
                    </li>
                </ul>
                <div class="flex-1 flex items-center">

                </div>
                <ul class="flex-1 flex items-center">
                    @auth
                        <li class="px-2">
                            <a href="{{ route('notifications') }}"><i class="fas fa-bell"></i></a>
                        </li>
                        <li class="px-2 text-sm">
                            <a href="{{ route('account') }}"><i class="fas fa-user mr-2"></i> {{ auth()->user()->name }}</a>
                        </li>
                        <li class="px-2">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="text-sm"><i class="fas fa-sign-out-alt mr-2"></i> Déconnexion</button>
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li class="px-2 font-semibold">
                            <a href="{{ route('register') }}">Inscription</a>
                        </li>
                        <li class="px-2 font-semibold"><a href="{{ route('login') }}">Connexion</a></li>
                    @endguest
                </ul>
            </nav>
        </header>
        <main class="h-full bg-white z-50 shadow-lg">
            @yield('page_content')
        </main>
        <footer class="bg-gray-800 text-gray-300 sticky bottom-0 bg-white pt-14" style="z-index: -10;">
            <div class="py-8 px-24">
                <h1 class="font-bold text-3xl">Newsletter</h1>
                <p class="my-4">
                    Inscrivez-vous à notre newsletter pour recevoir nos offres d'emploi et nos actualités
                </p>
                <div class="flex">
                    <input type="email" class="border text-gray-900 bg-gray-400 border-gray-400 px-3 py-2 rounded w-9/12 mr-3">
                    <button class="bg-black border-black rounded px-3 py-2 text-white font-semibold flex-1">
                        Rejoindre
                    </button>
                </div>
            </div>
            <div class="border-b border-gray-900 my-8"></div>
            <div class="flex px-24 py-12">
                <div class="flex-2">
                    <h1 class="font-bold text-3xl">Mon ouvrier</h1>
                    <p class="my-4 text-sm">
                        Nous sommes une équipe de jeune enthousiastes qui veulent développer notre très cher pays
                    </p>
                    <ul class="my-4 flex">
                        <li class="mr-2">
                            <a href=""><i class="fab fa-facebook-square"></i></a>
                        </li>
                        <li>
                            <a href=""><i class="fab fa-twitter-square"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="flex-1 md:px-14">
                    <p class="font-bold text-2xl mb-4">Liens utiles</p>
                    <p>
                        <a href="" class="">Contact</a>
                    </p>
                </div>
                <div class="flex-1 md:px-14">
                    <p class="font-bold text-2xl text-center">Contact</p>
                </div>
            </div>
            <p class="py-4 px-24 bg-gray-600 border-gray-800 border-t text-sm font-semibold">
               Créé avec <i class="fas fa-heart"></i> par
                <a href="https://instagram.com/imhassane" class="font-bold" target="_blank">Hassane SOW</a> et
                <span class="font-bold">Rodney ABOUE</span>
            </p>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
        <script>
            // Récupération de la position gps
            if(!localStorage.getItem("x-user-position")) {
                window.addEventListener('load', async () => {
                    const res = await fetch("https://geolocation-db.com/json/");
                    const data = await res.json();
                    localStorage.setItem("x-user-position", JSON.stringify(data));
                });
            }
        </script>
        @yield('page_scripts')
    </body>
</html>
