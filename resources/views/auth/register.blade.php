<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register - {{ config('app.name', 'Laravel CMS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --primary-light: #1b1b18;
            --primary-dark: #EDEDEC;
            --background-light: #FDFDFC;
            --background-dark: #0a0a0a;
            --gradient-start: #4f46e5;
            --gradient-end: #7c3aed;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
        }
        
        .form-input-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }
        
        .btn-gradient {
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
        }
        
        .btn-gradient:hover {
            background: linear-gradient(135deg, #4338ca 0%, #6d28d9 100%);
        }
        
        .card-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-screen font-sans">

    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-cube text-2xl text-indigo-600 dark:text-indigo-400 mr-2"></i>
                        <span class="text-xl font-bold text-gray-900 dark:text-white">Laravel<span class="text-indigo-600 dark:text-indigo-400">CMS</span></span>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('login') }}" 
                       class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 text-sm font-medium">
                        Already have an account?
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="min-h-screen flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="flex items-center justify-center mb-4">
                    <div class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center">
                        <i class="fas fa-user-plus text-white text-2xl"></i>
                    </div>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                    Create Account
                </h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Start your journey with LaravelCMS
                </p>
            </div>

            <!-- Registration Form -->
            <div class="bg-white dark:bg-gray-800 card-shadow rounded-xl p-8">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Full Name
                        </label>
                        <div class="relative">
                            <div class="form-input-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                required
                                autofocus
                                autocomplete="name"
                                value="{{ old('name') }}"
                                class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="John Doe"
                            >
                        </div>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Email Address
                        </label>
                        <div class="relative">
                            <div class="form-input-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                required
                                autocomplete="email"
                                value="{{ old('email') }}"
                                class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="john@example.com"
                            >
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Password
                        </label>
                        <div class="relative">
                            <div class="form-input-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                autocomplete="new-password"
                                class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="••••••••"
                            >
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Confirm Password
                        </label>
                        <div class="relative">
                            <div class="form-input-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <input
                                id="password_confirmation"
                                name="password_confirmation"
                                type="password"
                                required
                                autocomplete="new-password"
                                class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="••••••••"
                            >
                        </div>
                        @error('password_confirmation')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Terms Agreement -->
                    <div class="flex items-center">
                        <input
                            id="terms"
                            name="terms"
                            type="checkbox"
                            required
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                        >
                        <label for="terms" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                            I agree to the <a href="#" class="text-indigo-600 dark:text-indigo-400 hover:underline">Terms</a> and <a href="#" class="text-indigo-600 dark:text-indigo-400 hover:underline">Privacy Policy</a>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white btn-gradient hover:shadow-md transition-all duration-200"
                    >
                        <i class="fas fa-user-plus mr-2"></i>
                        Create Account
                    </button>
                </form>

                <!-- Divider -->
                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400">
                                Or sign up with
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-3 gap-3">
                        <a href="#" class="w-full inline-flex justify-center py-2.5 px-4 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <i class="fab fa-google text-red-500"></i>
                        </a>
                        <a href="#" class="w-full inline-flex justify-center py-2.5 px-4 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="w-full inline-flex justify-center py-2.5 px-4 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <i class="fab fa-microsoft text-blue-500"></i>
                        </a>
                    </div>
                </div>

                <!-- Login Link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500">
                            Sign in
                        </a>
                    </p>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="mt-6 text-center">
                <a href="{{ url('/') }}" class="inline-flex items-center text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Home
                </a>
            </div>

            <!-- Features -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="text-center">
                    <div class="w-10 h-10 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-shield-alt text-indigo-600 dark:text-indigo-400"></i>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Secure & Encrypted</p>
                </div>
                <div class="text-center">
                    <div class="w-10 h-10 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-rocket text-green-600 dark:text-green-400"></i>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Free Trial</p>
                </div>
                <div class="text-center">
                    <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-headset text-purple-600 dark:text-purple-400"></i>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-400">24/7 Support</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Simple form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Passwords do not match!');
                return false;
            }
            
            if (password.length < 8) {
                e.preventDefault();
                alert('Password must be at least 8 characters long!');
                return false;
            }
        });

        // Add focus effects
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-indigo-200');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-indigo-200');
            });
        });

        // Toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
            field.setAttribute('type', type);
        }
    </script>
</body>
</html>