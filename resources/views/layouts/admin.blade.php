<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <h1 class="text-xl font-bold">CMS Admin</h1>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.dashboard') ? 'border-indigo-500' : 'border-transparent' }} text-sm font-medium">
                                Dashboard
                            </a>
                            <a href="{{ route('admin.sliders.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.sliders.*') ? 'border-indigo-500' : 'border-transparent' }} text-sm font-medium">
                                Sliders
                            </a>
                            <a href="{{ route('admin.services.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.services.*') ? 'border-indigo-500' : 'border-transparent' }} text-sm font-medium">
                                Services
                            </a>
                            <a href="{{ route('admin.industries.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.industries.*') ? 'border-indigo-500' : 'border-transparent' }} text-sm font-medium">
                                Industries
                            </a>
                            <a href="{{ route('admin.careers.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.careers.*') ? 'border-indigo-500' : 'border-transparent' }} text-sm font-medium">
                                Careers
                            </a>
                            <a href="{{ route('admin.partners.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.partners.*') ? 'border-indigo-500' : 'border-transparent' }} text-sm font-medium">
                                Partners
                            </a>
                            <a href="{{ route('admin.officers.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.officers.*') ? 'border-indigo-500' : 'border-transparent' }} text-sm font-medium">
                                Officers
                            </a>
                            <a href="{{ route('admin.news.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.news.*') ? 'border-indigo-500' : 'border-transparent' }} text-sm font-medium">
                                News
                            </a>
                        </div>
                    </div>
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-gray-700 hover:text-gray-900">
                                Logout ({{ auth()->user()->name }})
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>