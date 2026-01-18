<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel CMS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind CSS (Fallback until Vite is configured) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-light: #1b1b18;
            --primary-dark: #EDEDEC;
            --background-light: #FDFDFC;
            --background-dark: #0a0a0a;
            --gradient-start: #667eea;
            --gradient-end: #764ba2;
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
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Custom animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.5s ease-out;
        }
    </style>

    <!-- Fallback styles (from your code) -->
    @if (!file_exists(public_path('build/manifest.json')) && !file_exists(public_path('hot')))
        <style>
            /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
            @layer theme, base, components, utilities;
            @layer theme {
                :root, :host {
                    --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                    --color-blue-500: oklch(.623 .214 259.815);
                    --color-indigo-600: oklch(.511 .262 276.966);
                    --color-gray-50: oklch(.985 .002 247.839);
                    --color-gray-100: oklch(.967 .003 264.542);
                    --color-gray-200: oklch(.928 .006 264.531);
                    --color-gray-600: oklch(.446 .03 256.802);
                    --color-gray-700: oklch(.373 .034 259.733);
                    --color-gray-800: oklch(.278 .033 256.848);
                    --color-gray-900: oklch(.21 .034 264.665);
                    --color-white: #fff;
                    --color-black: #000;
                    --spacing: .25rem;
                    --radius-sm: .25rem;
                    --radius-lg: .5rem;
                    --text-sm: .875rem;
                    --text-sm--line-height: calc(1.25/.875);
                    --font-weight-medium: 500;
                    --font-weight-semibold: 600;
                    --leading-normal: 1.5;
                    --default-font-family: var(--font-sans);
                }
            }
            @layer base {
                *, :after, :before, ::backdrop {
                    box-sizing: border-box;
                    border: 0 solid;
                    margin: 0;
                    padding: 0
                }
                html, :host {
                    line-height: 1.5;
                    font-family: var(--default-font-family, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji");
                }
                body {
                    line-height: inherit;
                }
                a {
                    color: inherit;
                    text-decoration: inherit;
                }
                button, input, textarea {
                    font: inherit;
                }
            }
            @layer utilities {
                .bg-\[\#FDFDFC\] { background-color: #FDFDFC }
                .dark\:bg-\[\#0a0a0a\] { background-color: #0a0a0a }
                .text-\[\#1b1b18\] { color: #1b1b18 }
                .dark\:text-\[\#EDEDEC\] { color: #EDEDEC }
                .border-\[\#19140035\] { border-color: #19140035 }
                .dark\:border-\[\#3E3E3A\] { border-color: #3E3E3A }
                .hover\:border-\[\#1915014a\]:hover { border-color: #1915014a }
                .dark\:hover\:border-\[\#62605b\]:hover { border-color: #62605b }
                .rounded-sm { border-radius: var(--radius-sm) }
                .px-5 { padding-inline: calc(var(--spacing)*5) }
                .py-1\.5 { padding-block: calc(var(--spacing)*1.5) }
                .text-sm { font-size: var(--text-sm); line-height: var(--text-sm--line-height) }
                .leading-normal { line-height: var(--leading-normal) }
                .font-medium { font-weight: var(--font-weight-medium) }
                .inline-block { display: inline-block }
                .flex { display: flex }
                .items-center { align-items: center }
                .justify-end { justify-content: flex-end }
                .gap-4 { gap: calc(var(--spacing)*4) }
                .mb-6 { margin-bottom: calc(var(--spacing)*6) }
                .w-full { width: 100% }
                .lg\:max-w-4xl { max-width: 56rem }
                .max-w-\[335px\] { max-width: 335px }
                .min-h-screen { min-height: 100vh }
                .flex-col { flex-direction: column }
                .items-center { align-items: center }
                .justify-center { justify-content: center }
                .p-6 { padding: calc(var(--spacing)*6) }
                .lg\:p-8 { padding: calc(var(--spacing)*8) }
                .lg\:justify-center { justify-content: center }
                .not-has-\[nav\]\:hidden:not(:has(:is(nav))) { display: none }
            }
        </style>
    @endif
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] min-h-screen font-sans">

    <!-- Header with Navigation -->
    <header class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 mb-6">
        <nav class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <i class="fas fa-cube text-2xl text-blue-500 mr-2"></i>
                <span class="text-xl font-bold">Laravel<span class="text-indigo-600">CMS</span></span>
            </div>
            
            <!-- Desktop Navigation Links -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#features" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">Features</a>
                <a href="#pricing" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">Pricing</a>
                <a href="#testimonials" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">Testimonials</a>
                <a href="#contact" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">Contact</a>
            </div>
            
            <!-- Auth Buttons (Using your provided code) -->
            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
            
            <!-- Mobile Menu Button -->
            <button class="md:hidden text-gray-700 dark:text-gray-300">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </nav>
        
        <!-- Mobile Navigation -->
        <div class="md:hidden mt-4 hidden" id="mobile-menu">
            <div class="flex flex-col space-y-3">
                <a href="#features" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">Features</a>
                <a href="#pricing" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">Pricing</a>
                <a href="#testimonials" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">Testimonials</a>
                <a href="#contact" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">Contact</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <div class="gradient-bg text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-32">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 fade-in-up">
                    Powerful Content Management<br>
                    <span class="text-indigo-200">Made Simple</span>
                </h1>
                <p class="text-xl text-white/90 mb-10 max-w-3xl mx-auto fade-in-up">
                    LaravelCMS is a modern, intuitive content management system built with Laravel. 
                    Manage your content effortlessly with our powerful yet easy-to-use platform.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4 fade-in-up">
                    @auth
                        <a href="{{ url('/dashboard') }}" 
                           class="bg-white text-gray-800 hover:bg-gray-100 px-8 py-3 rounded-sm font-medium shadow-lg transition duration-150 inline-flex items-center justify-center">
                            Go to Dashboard <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    @else
                        <a href="{{ route('register') }}" 
                           class="bg-white text-gray-800 hover:bg-gray-100 px-8 py-3 rounded-sm font-medium shadow-lg transition duration-150 inline-flex items-center justify-center">
                            Start Free Trial <i class="fas fa-rocket ml-2"></i>
                        </a>
                        <a href="#features" 
                           class="bg-transparent border-2 border-white text-white hover:bg-white/10 px-8 py-3 rounded-sm font-medium transition duration-150 inline-flex items-center justify-center">
                            Explore Features
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="py-20 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Everything You Need in One Platform
                </h2>
                <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    LaravelCMS comes packed with features designed to make content management efficient and enjoyable.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white dark:bg-gray-800 p-8 rounded-sm shadow-md card-hover fade-in-up">
                    <div class="feature-icon mb-6">
                        <i class="fas fa-edit text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Intuitive Editor</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        WYSIWYG editor with markdown support, drag & drop media, and real-time preview.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Rich text formatting
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Media library
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Version control
                        </li>
                    </ul>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white dark:bg-gray-800 p-8 rounded-sm shadow-md card-hover fade-in-up">
                    <div class="feature-icon mb-6">
                        <i class="fas fa-users-cog text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">User Management</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        Complete control over user roles, permissions, and access levels with detailed audit logs.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Role-based permissions
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Activity logs
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Multi-team support
                        </li>
                    </ul>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white dark:bg-gray-800 p-8 rounded-sm shadow-md card-hover fade-in-up">
                    <div class="feature-icon mb-6">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Analytics Dashboard</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        Comprehensive analytics to track content performance, user engagement, and platform usage.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Real-time statistics
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Content insights
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-400">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            Export reports
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-gray-800 dark:bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="fade-in-up">
                    <div class="text-4xl font-bold mb-2">10K+</div>
                    <div class="text-gray-300">Active Users</div>
                </div>
                <div class="fade-in-up">
                    <div class="text-4xl font-bold mb-2">50K+</div>
                    <div class="text-gray-300">Articles Published</div>
                </div>
                <div class="fade-in-up">
                    <div class="text-4xl font-bold mb-2">99.9%</div>
                    <div class="text-gray-300">Uptime</div>
                </div>
                <div class="fade-in-up">
                    <div class="text-4xl font-bold mb-2">24/7</div>
                    <div class="text-gray-300">Support</div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-white dark:bg-gray-800 py-20">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6 fade-in-up">
                Ready to Transform Your Content Management?
            </h2>
            <p class="text-gray-600 dark:text-gray-400 mb-10 text-lg fade-in-up">
                Join thousands of teams who trust LaravelCMS for their content needs.
            </p>
            @auth
                <a href="{{ url('/dashboard') }}" 
                   class="bg-gray-800 dark:bg-gray-700 hover:bg-gray-900 dark:hover:bg-gray-600 text-white px-10 py-3 rounded-sm font-medium shadow-lg transition duration-150 inline-flex items-center fade-in-up">
                    Access Dashboard <i class="fas fa-arrow-right ml-3"></i>
                </a>
            @else
                <div class="flex flex-col sm:flex-row justify-center gap-4 fade-in-up">
                    <a href="{{ route('register') }}" 
                       class="bg-gray-800 dark:bg-gray-700 hover:bg-gray-900 dark:hover:bg-gray-600 text-white px-10 py-3 rounded-sm font-medium shadow-lg transition duration-150">
                        Get Started Free
                    </a>
                    <a href="#contact" 
                       class="bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-800 dark:text-white px-10 py-3 rounded-sm font-medium transition duration-150">
                        Schedule Demo
                    </a>
                </div>
            @endauth
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="fade-in-up">
                    <div class="flex items-center mb-6">
                        <i class="fas fa-cube text-2xl text-indigo-400 mr-2"></i>
                        <span class="text-xl font-bold">Laravel<span class="text-indigo-400">CMS</span></span>
                    </div>
                    <p class="text-gray-400">
                        A modern content management system built with Laravel for developers and content creators.
                    </p>
                </div>
                
                <div class="fade-in-up">
                    <h4 class="text-lg font-semibold mb-6">Product</h4>
                    <ul class="space-y-3">
                        <li><a href="#features" class="text-gray-400 hover:text-white transition">Features</a></li>
                        <li><a href="#pricing" class="text-gray-400 hover:text-white transition">Pricing</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Documentation</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">API</a></li>
                    </ul>
                </div>
                
                <div class="fade-in-up">
                    <h4 class="text-lg font-semibold mb-6">Company</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Careers</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                
                <div id="contact" class="fade-in-up">
                    <h4 class="text-lg font-semibold mb-6">Stay Updated</h4>
                    <p class="text-gray-400 mb-4">
                        Subscribe to our newsletter for the latest updates.
                    </p>
                    <form class="flex">
                        <input type="email" placeholder="Your email" class="px-4 py-2 rounded-l-sm flex-grow text-gray-900">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-r-sm">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <div class="text-gray-400 text-sm mb-4 md:mb-0">
                    &copy; {{ date('Y') }} LaravelCMS. All rights reserved.
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-discord"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Mobile menu toggle
        document.querySelector('button.md\\:hidden').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href === '#') return;
                
                e.preventDefault();
                const targetElement = document.querySelector(href);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    const mobileMenu = document.getElementById('mobile-menu');
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });

        // Add active class to nav links on scroll
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section[id], div[id]');
            const navLinks = document.querySelectorAll('nav a[href^="#"]');
            
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (window.scrollY >= (sectionTop - 100)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('text-blue-500', 'font-semibold');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('text-blue-500', 'font-semibold');
                }
            });
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                }
            });
        }, observerOptions);

        // Observe all elements with data-animate attribute
        document.querySelectorAll('[class*="fade-in-up"]').forEach(el => {
            observer.observe(el);
        });

        // Dark mode toggle (if you want to add it later)
        const darkModeToggle = document.createElement('button');
        darkModeToggle.innerHTML = '<i class="fas fa-moon"></i>';
        darkModeToggle.className = 'fixed bottom-4 right-4 bg-gray-800 text-white p-3 rounded-full shadow-lg';
        darkModeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            darkModeToggle.innerHTML = document.documentElement.classList.contains('dark') 
                ? '<i class="fas fa-sun"></i>' 
                : '<i class="fas fa-moon"></i>';
        });
        document.body.appendChild(darkModeToggle);
    </script>

    <!-- Vite / Asset Loading -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</body>
</html>