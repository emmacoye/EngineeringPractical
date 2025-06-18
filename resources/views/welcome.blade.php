<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
    <title>Welcome to Laravel Starter</title>
</head>
<body class="flex flex-col min-h-screen h-full">
    <!--FIX-->
    <!--NAVIGATION-->
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex items-center justify-between">
            <div class="text-lg font-semibold"><h1>Weather Dashboard</h1></div>
            <button id="nav-toggle" class="lg:hidden focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div id="nav-links" class="hidden lg:flex space-x-4">
                <a href="/" class="hover:underline">Home</a>
                <a href="https://google.com" target="_blank" rel="noopener noreferrer" class="hover:underline">Google</a>
            </div>
        </div>
    </nav>

    <form method="GET" action="{{ url('/') }}" class="mb-6 mt-6 flex justify-center">
    <input
        type="text"
        name="city"
        value="{{ request('city') }}"
        placeholder="Enter city"
        class="border rounded-l px-4 py-2 w-64 focus:outline-none"
        required
    />
    <button
        type="submit"
        class="bg-blue-600 text-white rounded-r px-4 py-2 hover:bg-blue-700"
    >
        Search
    </button>
</form>

    <main class="flex-grow container mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-lg w-full overflow-hidden">
            <div class="p-6">
                <h1 class="text-2xl font-bold mb-4">Current Weather</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Temperature & Condition -->
                    <div class="flex items-center space-x-4">
                        <div class="text-5xl font-bold">XX&deg;</div>
                        <div class="text-xl self-end">Sunny</div>
                    </div>
                    <!-- Details -->
                    <div class="space-y-2">
                        <p><span class="font-semibold">Humidity:</span> X%</p>
                        <p><span class="font-semibold">Wind Speed:</span> X km/h</p>
                        <p><span class="font-semibold">Feels Like:</span> XX&deg;</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-200 p-4">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
            <p class="text-sm">&copy; {{ date('Y') }} Weather Dashboard</p>
            <div class="flex space-x-4 mt-2 md:mt-0">
                <!-- Social Icons -->
                <a href="#" aria-label="Twitter" class="hover:text-white">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                        <path d="M24 4.557a9.93 9.93 0 0 1-2.828.775 4.932 4.932 0 0 0 2.165-2.724c-.951.555-2.005.959-3.127 1.184A4.916 4.916 0 0 0 16.616 3c-2.717 0-4.92 2.203-4.92 4.917 0 .386.043.762.127 1.124C7.728 8.82 4.1 6.873 1.671 3.902a4.822 4.822 0 0 0-.666 2.475c0 1.708.87 3.213 2.188 4.096a4.904 4.904 0 0 1-2.228-.616v.062c0 2.385 1.693 4.374 3.946 4.827a4.935 4.935 0 0 1-2.224.084c.627 1.956 2.444 3.379 4.6 3.421A9.868 9.868 0 0 1 0 19.54a13.94 13.94 0 0 0 7.548 2.212c9.051 0 14.001-7.496 14.001-13.986 0-.213-.005-.425-.014-.636A10.012 10.012 0 0 0 24 4.557z"/>
                    </svg>
                </a>
                <a href="#" aria-label="Facebook" class="hover:text-white">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                        <path d="M22.675 0h-21.35C.596 0 0 .593 0 1.326v21.348C0 23.406.596 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.892-4.788 4.658-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.312h3.587l-.467 3.622h-3.12V24h6.116C23.404 24 24 23.406 24 22.674V1.326C24 .593 23.404 0 22.675 0z"/>
                    </svg>
                </a>
                <a href="#" aria-label="Instagram" class="hover:text-white">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.343 3.608 1.319.975.975 1.256 2.242 1.319 3.608.058 1.266.069 1.646.069 4.85s-.012 3.584-.07 4.85c-.062 1.366-.343 2.633-1.319 3.608-.975.975-2.242 1.256-3.608 1.319-1.266.058-1.646.069-4.85.069s-3.584-.012-4.85-.07c-1.366-.062-2.633-.343-3.608-1.319-.975-.975-1.256-2.242-1.319-3.608C2.175 15.647 2.163 15.267 2.163 12s.012-3.584.07-4.85c.062-1.366.343-2.633 1.319-3.608.975-.975 2.242-1.256 3.608-1.319C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.012 7.052.07 5.722.129 4.423.443 3.355 1.511 2.287 2.579 1.973 3.878 1.914 5.208.856 6.488.844 6.897.844 12c0 5.103.012 5.512.07 6.792.059 1.33.373 2.629 1.441 3.697 1.068 1.068 2.367 1.382 3.697 1.441C8.332 23.988 8.741 24 12 24s3.668-.012 4.948-.07c1.33-.059 2.629-.373 3.697-1.441 1.068-1.068 1.382-2.367 1.441-3.697.058-1.28.07-1.689.07-6.792 0-5.103-.012-5.512-.07-6.792-.059-1.33-.373-2.629-1.441-3.697C19.577.443 18.278.129 16.948.07 15.668.012 15.259 0 12 0z"/>
                        <circle cx="12" cy="12" r="3.6"/>
                    </svg>
                </a>
            </div>
        </div>
    </footer>

    <!--NOT PERFECT-->
    <script>
        const btn = document.getElementById('nav-toggle');
        const menu = document.getElementById('nav-links');
        btn.addEventListener('click', () => {
        const open = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', String(!open));
        menu.classList.toggle('hidden');
    });
    </script>


</body>
</html>