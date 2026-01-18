@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
        <!-- Dashboard Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Dashboard Overview</h2>
                <p class="text-gray-600 mt-2">Welcome back! Here's what's happening with your content.</p>
            </div>
            <div class="mt-4 sm:mt-0">
                <div class="text-sm text-gray-500 bg-gray-50 px-4 py-2 rounded-lg">
                    Last updated: {{ now()->format('F j, Y') }}
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
            <!-- Sliders Card -->
            <div class="bg-gradient-to-br from-blue-50 to-white p-6 rounded-xl border border-blue-100 hover:border-blue-200 transition-all duration-300 hover:shadow-lg group">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center group-hover:bg-blue-200 transition-colors duration-300">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-blue-600 bg-blue-50 px-3 py-1 rounded-full">Active</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Sliders</h3>
                <p class="text-3xl font-bold text-blue-900 mb-4">{{ $stats['sliders'] }}</p>
                <div class="pt-4 border-t border-blue-100">
                    <a href="{{ route('admin.sliders.index') }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm flex items-center group/link">
                        <span>Manage Sliders</span>
                        <svg class="w-4 h-4 ml-2 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Services Card -->
            <div class="bg-gradient-to-br from-green-50 to-white p-6 rounded-xl border border-green-100 hover:border-green-200 transition-all duration-300 hover:shadow-lg group">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center group-hover:bg-green-200 transition-colors duration-300">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-green-600 bg-green-50 px-3 py-1 rounded-full">Services</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Services</h3>
                <p class="text-3xl font-bold text-green-900 mb-4">{{ $stats['services'] }}</p>
                <div class="pt-4 border-t border-green-100">
                    <a href="{{ route('admin.services.index') }}" class="text-green-600 hover:text-green-800 font-medium text-sm flex items-center group/link">
                        <span>Manage Services</span>
                        <svg class="w-4 h-4 ml-2 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Industries Card -->
            <div class="bg-gradient-to-br from-purple-50 to-white p-6 rounded-xl border border-purple-100 hover:border-purple-200 transition-all duration-300 hover:shadow-lg group">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center group-hover:bg-purple-200 transition-colors duration-300">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-purple-600 bg-purple-50 px-3 py-1 rounded-full">Industries</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Industries</h3>
                <p class="text-3xl font-bold text-purple-900 mb-4">{{ $stats['industries'] }}</p>
                <div class="pt-4 border-t border-purple-100">
                    <a href="{{ route('admin.industries.index') }}" class="text-purple-600 hover:text-purple-800 font-medium text-sm flex items-center group/link">
                        <span>Manage Industries</span>
                        <svg class="w-4 h-4 ml-2 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Careers Card -->
            <div class="bg-gradient-to-br from-yellow-50 to-white p-6 rounded-xl border border-yellow-100 hover:border-yellow-200 transition-all duration-300 hover:shadow-lg group">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-lg bg-yellow-100 flex items-center justify-center group-hover:bg-yellow-200 transition-colors duration-300">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-yellow-600 bg-yellow-50 px-3 py-1 rounded-full">Careers</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Careers</h3>
                <p class="text-3xl font-bold text-yellow-900 mb-4">{{ $stats['careers'] }}</p>
                <div class="pt-4 border-t border-yellow-100">
                    <a href="{{ route('admin.careers.index') }}" class="text-yellow-600 hover:text-yellow-800 font-medium text-sm flex items-center group/link">
                        <span>Manage Careers</span>
                        <svg class="w-4 h-4 ml-2 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Partners Card -->
            <div class="bg-gradient-to-br from-pink-50 to-white p-6 rounded-xl border border-pink-100 hover:border-pink-200 transition-all duration-300 hover:shadow-lg group">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-lg bg-pink-100 flex items-center justify-center group-hover:bg-pink-200 transition-colors duration-300">
                        <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-pink-600 bg-pink-50 px-3 py-1 rounded-full">Partners</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Partners</h3>
                <p class="text-3xl font-bold text-pink-900 mb-4">{{ $stats['partners'] }}</p>
                <div class="pt-4 border-t border-pink-100">
                    <a href="{{ route('admin.partners.index') }}" class="text-pink-600 hover:text-pink-800 font-medium text-sm flex items-center group/link">
                        <span>Manage Partners</span>
                        <svg class="w-4 h-4 ml-2 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Officers Card -->
            <div class="bg-gradient-to-br from-indigo-50 to-white p-6 rounded-xl border border-indigo-100 hover:border-indigo-200 transition-all duration-300 hover:shadow-lg group">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-lg bg-indigo-100 flex items-center justify-center group-hover:bg-indigo-200 transition-colors duration-300">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full">Team</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Officers</h3>
                <p class="text-3xl font-bold text-indigo-900 mb-4">{{ $stats['officers'] }}</p>
                <div class="pt-4 border-t border-indigo-100">
                    <a href="{{ route('admin.officers.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm flex items-center group/link">
                        <span>Manage Officers</span>
                        <svg class="w-4 h-4 ml-2 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- News & Updates Card -->
            <div class="bg-gradient-to-br from-red-50 to-white p-6 rounded-xl border border-red-100 hover:border-red-200 transition-all duration-300 hover:shadow-lg group">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-lg bg-red-100 flex items-center justify-center group-hover:bg-red-200 transition-colors duration-300">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-red-600 bg-red-50 px-3 py-1 rounded-full">Updates</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">News & Updates</h3>
                <p class="text-3xl font-bold text-red-900 mb-4">{{ $stats['news'] }}</p>
                <div class="pt-4 border-t border-red-100">
                    <a href="{{ route('admin.news.index') }}" class="text-red-600 hover:text-red-800 font-medium text-sm flex items-center group/link">
                        <span>Manage News</span>
                        <svg class="w-4 h-4 ml-2 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Summary Section -->
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-6 border border-gray-200">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Quick Summary</h3>
                    <p class="text-gray-600">Total content items across all categories: 
                        <span class="font-bold text-gray-900">{{ array_sum($stats) }}</span>
                    </p>
                </div>
                <div class="mt-4 md:mt-0">
                    <div class="text-sm text-gray-500">
                        <span class="inline-block w-3 h-3 rounded-full bg-green-400 mr-2"></span>
                        All systems operational
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection