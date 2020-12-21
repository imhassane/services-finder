<!DOCTYPE html>
<html lang="fr">
<head>
    <title>@yield('page_title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');
        * {
            font-family: 'Source Sans Pro';
        }
    </style>
</head>
<body class="h-screen">
<header class="py-3 border-b-2 sticky top-0 z-50 bg-white">
    <nav class="flex">
        <ul class="flex-1 flex justify-end items-center">
            <li class="px-2">
                <a href="{{ route('notifications') }}"><i class="fas fa-bell"></i></a>
            </li>
            <li class="px-2">
                <a href="{{ route('account') }}">
                    <i class="fas fa-user mr-2"></i>
                    {{ auth()->user()->name }}
                </a>
            </li>
            <li class="px-2 font-semibold">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="font-semibold"><i class="fas fa-sign-out-alt"></i></button>
                </form>
            </li>
        </ul>
    </nav>
</header>
<main class="h-full bg-white z-50">
    <div class="flex h-full">
        <div class="md:w-64 h-full bg-white border-r">
            <ul>
                <li class="py-3 h-32 border-b px-3">
                    <img
                        src="https://upload.wikimedia.org/wikipedia/commons/e/ed/Flag_of_Guinea.svg" alt=""
                        class="object-cover h-24 w-full mx-auto"
                    />
                </li>
                <li class="py-3 border-b px-3">
                    <a href="{{ route('worker_settings') }}">
                        <i class="fas fa-cogs mr-2"></i>
                        Paramètres
                    </a>
                </li>
                <li class="py-3 border-b px-3">
                    <a href="" class="">
                        <i class="fas fa-envelope mr-2"></i>
                        Messages
                    </a>
                </li>
                <li class="py-3 border-b px-3">
                    <i class="fas fa-question-circle mr-2"></i>
                    <a href="">Demandes</a>
                </li>
                <li class="py-3 border-b px-3">
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button
                            type="submit"
                        >
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Deconnexion
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="flex-1">
            @yield('page_content')
        </div>
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
@yield('page_scripts')
</body>
</html>
