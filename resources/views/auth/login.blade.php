<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - {{ config('app.name', 'Laravel CMS') }}</title>

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
        
        .gradient-text {
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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
            transform: translateY(-1px);
        }
        
        .card-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .floating-label {
            position: absolute;
            top: 50%;
            left: 2.5rem;
            transform: translateY(-50%);
            transition: all 0.2s ease;
            pointer-events: none;
            color: #6b7280;
        }
        
        .input-focused .floating-label,
        input:not(:placeholder-shown) ~ .floating-label {
            top: 0;
            left: 0.75rem;
            font-size: 0.75rem;
            background: white;
            padding: 0 0.25rem;
            color: #4f46e5;
        }
        
        .dark .input-focused .floating-label,
        .dark input:not(:placeholder-shown) ~ .floating-label {
            background: #1f2937;
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
                        <a href="{{ url('/') }}" class="flex items-center">
                            <i class="fas fa-cube text-2xl text-indigo-600 dark:text-indigo-400 mr-2"></i>
                            <span class="text-xl font-bold text-gray-900 dark:text-white">Laravel<span class="text-indigo-600 dark:text-indigo-400">CMS</span></span>
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('register') }}" 
                       class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 text-sm font-medium">
                        Don't have an account?
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <!-- Logo & Welcome -->
            <div class="text-center mb-10">
                <div class="flex items-center justify-center mb-4">
                    <div class="w-20 h-20 gradient-bg rounded-2xl flex items-center justify-center">
                        <i class="fas fa-lock text-white text-3xl"></i>
                    </div>
                </div>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">
                    Welcome Back
                </h1>
                <p class="text-gray-600 dark:text-gray-400">
                    Sign in to your LaravelCMS account
                </p>
            </div>

            <!-- Login Form -->
            <div class="bg-white dark:bg-gray-800 card-shadow rounded-2xl p-8">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
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
                                autofocus
                                autocomplete="email"
                                value="{{ old('email') }}"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                placeholder="you@example.com"
                            >
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Password
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 transition">
                                    Forgot password?
                                </a>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="form-input-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                autocomplete="current-password"
                                class="block w-full pl-10 pr-10 py-3 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200"
                                placeholder="••••••••"
                            >
                            <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input
                            id="remember_me"
                            name="remember"
                            type="checkbox"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                        >
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                            Remember me
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white btn-gradient hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5"
                    >
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Sign In
                    </button>
                </form>

                <!-- Social Login -->
                <div class="mt-8">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400">
                                Or continue with
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-3 gap-3">
                        <a href="#" class="w-full inline-flex justify-center py-2.5 px-4 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 transition duration-200">
                            <i class="fab fa-google text-red-500"></i>
                        </a>
                        <a href="#" class="w-full inline-flex justify-center py-2.5 px-4 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 transition duration-200">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="w-full inline-flex justify-center py-2.5 px-4 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm bg-white dark:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 transition duration-200">
                            <i class="fab fa-microsoft text-blue-500"></i>
                        </a>
                    </div>
                </div>

                <!-- Register Link -->
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 transition">
                            Create one now
                        </a>
                    </p>
                </div>
            </div>

            <!-- Demo Account Info (Optional) -->
            <div class="mt-8 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-4">
                <div class="flex items-start">
                    <i class="fas fa-info-circle text-blue-500 mt-0.5 mr-3"></i>
                    <div>
                        <h4 class="text-sm font-medium text-blue-800 dark:text-blue-300 mb-1">Demo Account</h4>
                        <p class="text-xs text-blue-700 dark:text-blue-400">
                            Email: <code class="bg-blue-100 dark:bg-blue-900 px-1 rounded">demo@laravelcms.com</code><br>
                            Password: <code class="bg-blue-100 dark:bg-blue-900 px-1 rounded">password</code>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Features -->
            <div class="mt-8 grid grid-cols-3 gap-4">
                <div class="text-center">
                    <div class="w-10 h-10 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-shield-alt text-indigo-600 dark:text-indigo-400"></i>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Secure Login</p>
                </div>
                <div class="text-center">
                    <div class="w-10 h-10 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-bolt text-green-600 dark:text-green-400"></i>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Fast Access</p>
                </div>
                <div class="text-center">
                    <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-history text-purple-600 dark:text-purple-400"></i>
                    </div>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Activity Logs</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-auto py-6 border-t border-gray-200 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    &copy; {{ date('Y') }} LaravelCMS. All rights reserved.
                </p>
                <div class="mt-2 flex justify-center space-x-4">
                    <a href="#" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 text-sm">Privacy</a>
                    <a href="#" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 text-sm">Terms</a>
                    <a href="#" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 text-sm">Support</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Add floating label effect
        document.querySelectorAll('input').forEach(input => {
            const parent = input.parentElement;
            
            input.addEventListener('focus', () => {
                parent.classList.add('input-focused');
            });
            
            input.addEventListener('blur', () => {
                if (!input.value) {
                    parent.classList.remove('input-focused');
                }
            });
            
            // Check on page load if there's a value
            if (input.value) {
                parent.classList.add('input-focused');
            }
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            if (!email || !password) {
                e.preventDefault();
                alert('Please fill in all fields');
                return false;
            }
            
            // Add loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Signing in...';
            submitBtn.disabled = true;
        });

        // Demo account autofill
        function fillDemoAccount() {
            document.getElementById('email').value = 'demo@laravelcms.com';
            document.getElementById('password').value = 'password';
            
            // Trigger floating labels
            document.querySelectorAll('input').forEach(input => {
                if (input.value) {
                    input.parentElement.classList.add('input-focused');
                }
            });
        }

        // Add demo account button if needed
        const demoInfo = document.querySelector('.bg-blue-50');
        if (demoInfo) {
            const demoButton = document.createElement('button');
            demoButton.innerHTML = '<i class="fas fa-magic mr-1"></i> Try Demo';
            demoButton.className = 'mt-2 w-full text-xs bg-blue-100 dark:bg-blue-800 hover:bg-blue-200 dark:hover:bg-blue-700 text-blue-700 dark:text-blue-300 py-1 px-2 rounded transition';
            demoButton.onclick = fillDemoAccount;
            demoInfo.querySelector('div').appendChild(demoButton);
        }

        // Add enter key support
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && document.activeElement.tagName !== 'BUTTON') {
                document.querySelector('button[type="submit"]').click();
            }
        });

        // Check for error messages and highlight fields
        @if($errors->any())
            document.addEventListener('DOMContentLoaded', function() {
                @error('email')
                    document.getElementById('email').focus();
                    document.getElementById('email').parentElement.classList.add('ring-2', 'ring-red-500');
                @enderror
                
                @error('password')
                    document.getElementById('password').focus();
                    document.getElementById('password').parentElement.classList.add('ring-2', 'ring-red-500');
                @enderror
            });
        @endif
    </script>
</body>
</html>