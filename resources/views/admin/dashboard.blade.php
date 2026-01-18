@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
        <h2 class="text-2xl font-semibold mb-6">Dashboard</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div class="bg-blue-100 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-blue-800">Sliders</h3>
                <p class="text-3xl font-bold text-blue-900 mt-2">{{ $stats['sliders'] }}</p>
                <a href="{{ route('admin.sliders.index') }}" class="text-blue-600 hover:text-blue-800 text-sm mt-2 inline-block">
                    Manage Sliders →
                </a>
            </div>

            <div class="bg-green-100 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-green-800">Services</h3>
                <p class="text-3xl font-bold text-green-900 mt-2">{{ $stats['services'] }}</p>
                <a href="{{ route('admin.services.index') }}" class="text-green-600 hover:text-green-800 text-sm mt-2 inline-block">
                    Manage Services →
                </a>
            </div>

            <div class="bg-purple-100 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-purple-800">Industries</h3>
                <p class="text-3xl font-bold text-purple-900 mt-2">{{ $stats['industries'] }}</p>
                <a href="{{ route('admin.industries.index') }}" class="text-purple-600 hover:text-purple-800 text-sm mt-2 inline-block">
                    Manage Industries →
                </a>
            </div>

            <div class="bg-yellow-100 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-yellow-800">Careers</h3>
                <p class="text-3xl font-bold text-yellow-900 mt-2">{{ $stats['careers'] }}</p>
                <a href="{{ route('admin.careers.index') }}" class="text-yellow-600 hover:text-yellow-800 text-sm mt-2 inline-block">
                    Manage Careers →
                </a>
            </div>

            <div class="bg-pink-100 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-pink-800">Partners</h3>
                <p class="text-3xl font-bold text-pink-900 mt-2">{{ $stats['partners'] }}</p>
                <a href="{{ route('admin.partners.index') }}" class="text-pink-600 hover:text-pink-800 text-sm mt-2 inline-block">
                    Manage Partners →
                </a>
            </div>

            <div class="bg-indigo-100 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-indigo-800">Officers</h3>
                <p class="text-3xl font-bold text-indigo-900 mt-2">{{ $stats['officers'] }}</p>
                <a href="{{ route('admin.officers.index') }}" class="text-indigo-600 hover:text-indigo-800 text-sm mt-2 inline-block">
                    Manage Officers →
                </a>
            </div>

            <div class="bg-red-100 p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-red-800">News & Updates</h3>
                <p class="text-3xl font-bold text-red-900 mt-2">{{ $stats['news'] }}</p>
                <a href="{{ route('admin.news.index') }}" class="text-red-600 hover:text-red-800 text-sm mt-2 inline-block">
                    Manage News →
                </a>
            </div>
        </div>
    </div>
</div>
@endsection