<!DOCTYPE html>
<html lang="fr">
<head>
    <title>@yield('page_title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');
    </style>
</head>
<body class="h-screen">
<header class="py-4 border-b-2 sticky top-0 z-50 bg-white">
    <nav class="flex">
        <ul class="flex-1">
            <li class="pl-24 mr-4">
                <a href="/" class="font-bold text-3xl">Mon ouvrier</a>
            </li>
        </ul>
        <ul class="flex-1 flex justify-end items-center">
            <li class="px-2">
                <a href="{{ route('notifications') }}"><i class="fas fa-bell"></i></a>
            </li>
            <li class="px-2 text-sm">
                <a href="{{ route('account') }}"><i class="fas fa-user mr-2"></i> {{ auth()->user()->name }}</a>
            </li>
            <li class="px-2 font-semibold">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="text-sm"><i class="fas fa-sign-out-alt mr-2"></i> Déconnexion</button>
                </form>
            </li>
        </ul>
    </nav>
</header>
<main class="h-full bg-white z-50">
    <div class="flex h-full">
        <div class="md:w-64 h-full bg-white border-r">
            <ul>
                <li class="py-3 border-b px-3">
                    <a href="{{ route('categories_admin') }}"><i class="fas fa-certificate mr-2"></i> Catégories</a>
                </li>
                <li class="py-3 border-b px-3">
                    <a href="{{ route('workers_admin') }}"><i class="fas fa-globe-africa mr-2"></i> Travailleurs</a>
                </li>
                <li class="py-3 border-b px-3">
                    <a href=""><i class="fas fa-chart-line mr-2"></i> Statistiques</a>
                </li>
                <li class="py-3 border-b px-3">
                    <a href=""><i class="fas fa-envelope mr-2"></i> Messages</a>
                </li>
                <li class="py-3 border-b px-3">
                    <a href="{{ route('collaborators_admin') }}"><i class="fas fa-user mr-2"></i> Collaborateurs</a>
                </li>
                <li class="py-3 border-b px-3">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"><i class="fas fa-sign-out-alt mr-2"></i> Déconnexion</button>
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
