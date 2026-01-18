<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel CMS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* Fallback styles from the welcome page */
            /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
            @layer theme, base, components, utilities;
            @layer theme {
                :root, :host {
                    --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
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
                /* Additional utilities for the registration page */
                .bg-gradient-to-r { background-image: linear-gradient(to right, var(--tw-gradient-stops)) }
                .from-indigo-600 { --tw-gradient-from: #4f46e5; --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, rgba(79, 70, 229, 0)) }
                .to-purple-600 { --tw-gradient-to: #7c3aed }
                .hover\:from-indigo-700:hover { --tw-gradient-from: #4338ca }
                .hover\:to-purple-700:hover { --tw-gradient-to: #6d28d9 }
                .transform { transform: var(--tw-transform) }
                .hover\:-translate-y-0\.5:hover { --tw-translate-y: -0.125rem; transform: var(--tw-transform) }
                .shadow-lg { --tw-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1); box-shadow: var(--tw-shadow) }
                .rounded-lg { border-radius: var(--radius-lg) }
                .border { border-style: var(--tw-border-style); border-width: 1px }
                .border-gray-300 { border-color: #d1d5db }
                .dark\:border-gray-600 { border-color: #4b5563 }
                .dark\:bg-gray-700 { background-color: #374151 }
                .dark\:text-white { color: #fff }
                .focus\:ring-2:focus { --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color); --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color); box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow) }
                .focus\:ring-indigo-500:focus { --tw-ring-color: #6366f1 }
                .focus\:border-indigo-500:focus { border-color: #6366f1 }
                .dark\:focus\:ring-indigo-400:focus { --tw-ring-color: #818cf8 }
                .dark\:focus\:border-indigo-400:focus { border-color: #818cf8 }
                .transition { transition-property: all; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms }
                .duration-200 { transition-duration: 200ms }
                .w-12 { width: 3rem }
                .h-12 { height: 3rem }
                .grid { display: grid }
                .grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)) }
                .gap-3 { gap: 0.75rem }
                .mt-12 { margin-top: 3rem }
                .pt-8 { padding-top: 2rem }
                .border-t { border-top-style: var(--tw-border-style); border-top-width: 1px }
                .border-gray-200 { border-color: #e5e7eb }
                .dark\:border-gray-800 { border-color: #1f2937 }
                .text-center { text-align: center }
                .text-sm { font-size: 0.875rem; line-height: 1.25rem }
                .text-gray-600 { color: #4b5563 }
                .dark\:text-gray-400 { color: #9ca3af }
                .max-w-md { max-width: 28rem }
                .mb-8 { margin-bottom: 2rem }
                .text-2xl { font-size: 1.5rem; line-height: 2rem }
                .font-bold { font-weight: 700 }
                .text-gray-900 { color: #111827 }
                .dark\:text-white { color: #fff }
                .mb-2 { margin-bottom: 0.5rem }
                .bg-white { background-color: #fff }
                .dark\:bg-gray-800 { background-color: #1f2937 }
                .overflow-hidden { overflow: hidden }
                .px-8 { padding-left: 2rem; padding-right: 2rem }
                .py-6 { padding-top: 1.5rem; padding-bottom: 1.5rem }
                .border-b { border-bottom-style: var(--tw-border-style); border-bottom-width: 1px }
                .border-gray-200 { border-color: #e5e7eb }
                .dark\:border-gray-700 { border-color: #374151 }
                .text-lg { font-size: 1.125rem; line-height: 1.75rem }
                .font-semibold { font-weight: 600 }
                .p-8 { padding: 2rem }
                .block { display: block }
                .text-gray-700 { color: #374151 }
                .dark\:text-gray-300 { color: #d1d5db }
                .relative { position: relative }
                .absolute { position: absolute }
                .inset-y-0 { top: 0; bottom: 0 }
                .left-0 { left: 0 }
                .pl-3 { padding-left: 0.75rem }
                .pl-10 { padding-left: 2.5rem }
                .pr-4 { padding-right: 1rem }
                .py-3 { padding-top: 0.75rem; padding-bottom: 0.75rem }
                .w-full { width: 100% }
                .mt-2 { margin-top: 0.5rem }
                .text-red-600 { color: #dc2626 }
                .dark\:text-red-400 { color: #f87171 }
                .flex-col { flex-direction: column }
                .mt-6 { margin-top: 1.5rem }
                .inline-flex { display: inline-flex }
                .justify-center { justify-content: center }
                .py-3 { padding-top: 0.75rem; padding-bottom: 0.75rem }
                .px-4 { padding-left: 1rem; padding-right: 1rem }
                .shadow-sm { --tw-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); box-shadow: var(--tw-shadow) }
                .bg-gray-50 { background-color: #f9fafb }
                .dark\:bg-gray-900 { background-color: #111827 }
                .font-semibold { font-weight: 600 }
                .text-indigo-600 { color: #4f46e5 }
                .dark\:text-indigo-400 { color: #818cf8 }
                .ml-1 { margin-left: 0.25rem }
                .h-4 { height: 1rem }
                .w-4 { width: 1rem }
                .text-indigo-600 { color: #4f46e5 }
                .ml-2 { margin-left: 0.5rem }
                .mr-2 { margin-right: 0.5rem }
                .gap-6 { gap: 1.5rem }
                .max-w-4xl { max-width: 56rem }
                .p-6 { padding: 1.5rem }
                .border { border-style: var(--tw-border-style); border-width: 1px }
                .border-gray-200 { border-color: #e5e7eb }
                .dark\:border-gray-700 { border-color: #374151 }
                .bg-indigo-100 { background-color: #e0e7ff }
                .dark\:bg-indigo-900 { background-color: #312e81 }
                .text-xl { font-size: 1.25rem; line-height: 1.75rem }
                .text-purple-600 { color: #7c3aed }
                .dark\:text-purple-400 { color: #a78bfa }
                .bg-purple-100 { background-color: #f3e8ff }
                .dark\:bg-purple-900 { background-color: #4c1d95 }
                .bg-green-100 { background-color: #d1fae5 }
                .dark\:bg-green-900 { background-color: #064e3b }
                .text-green-600 { color: #059669 }
                .dark\:text-green-400 { color: #34d399 }
                .fixed { position: fixed }
                .bottom-6 { bottom: 1.5rem }
                .right-6 { right: 1.5rem }
                .bg-indigo-600 { background-color: #4f46e5 }
                .hover\:bg-indigo-700:hover { background-color: #4338ca }
                .duration-200 { transition-duration: 200ms }
                .w-12 { width: 3rem }
                .h-12 { height: 3rem }
                .rounded-full { border-radius: 9999px }
                .flex { display: flex }
                .items-center { align-items: center }
                .justify-center { justify-content: center }
                /* ... add more as needed ... */
            }
        </style>
    @endif

    <script>
        // On page load, check for dark mode preference
        (function() {
            const theme = localStorage.getItem('theme') || 'light';
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] font-sans antialiased">
    {{ $slot }}

    <!-- Dark mode toggle button -->
    <button id="theme-toggle" class="fixed bottom-6 right-6 bg-indigo-600 text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center hover:bg-indigo-700 transition duration-200">
        <i class="fas fa-moon"></i>
    </button>

    <script>
        const themeToggle = document.getElementById('theme-toggle');
        const icon = themeToggle.querySelector('i');

        themeToggle.addEventListener('click', () => {
            const isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            icon.className = isDark ? 'fas fa-sun' : 'fas fa-moon';
        });

        // Set initial icon
        const currentTheme = localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        if (currentTheme === 'dark') {
            icon.className = 'fas fa-sun';
        }
    </script>
</body>
</html>