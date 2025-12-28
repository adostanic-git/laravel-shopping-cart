<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100 dark:bg-gray-900">
@livewire('cart-sidebar')

<div class="min-h-screen py-6 flex flex-col justify-start sm:py-12">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

        {{-- Header sa login/register dashboard --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Our Shop</h1>

            <div>
                @guest
                    <a href="{{ route('login') }}"
                       class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md mr-2 transition-colors">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="text-white bg-green-600 hover:bg-green-700 px-4 py-2 rounded-md transition-colors">
                        Register
                    </a>
                @else
                    <a href="{{ route('dashboard') }}"
                       class="text-white bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-md transition-colors">
                        Dashboard
                    </a>
                @endguest
            </div>
        </div>

        {{-- Shop container --}}
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 bg-white dark:bg-neutral-800 shadow-lg">
            @livewire('product-list')
        </div>

    </div>
</div>

@livewireScripts
</body>
</html>
