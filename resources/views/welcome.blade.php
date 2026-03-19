<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TodoList</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#FDFDFC]">
    <header class="w-full flex justify-between items-center p-6">
        <div class="text-2xl font-black">
            <h1
                class="bg-gradient-to-r from-rose-600 to-rose-400 text-transparent bg-clip-text inline-block cursor-default">
                TodoList.p</h1>
        </div>
        @if (Route::has('login'))
            <div class="font-bold flex gap-4 items-center">
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-rose-500 py-2 px-4 rounded-full hover:bg-rose-700">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-rose-300">Log in</a>
                    <a href="{{ route('register') }}" class="bg-rose-500 py-2 px-4 rounded-full hover:bg-rose-700">Register</a>
                @endauth
            </div>

        @endif
    </header>

    <section class="max-w-6xl mx-auto px-6 py-20 text-center h-screen">
        <h2 class="text-5xl md:text-7xl font-black mb-6 tracking-tight">
            Manage your tasks with <br class="hidden md:block" />
            <span class="bg-gradient-to-r from-rose-600 to-rose-400 text-transparent bg-clip-text">TodoList.p</span>
        </h2>
        <p class="text-lg md:text-xl text-[#1b1b18]/70 dark:text-[#FDFDFC]/70 max-w-2xl mx-auto mb-10">
            A simple, fast, and beautiful way to keep track of everything you need to do. Organize your life and work
            seamlessly.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="bg-rose-500 text-white font-bold py-3 px-8 rounded-full hover:bg-rose-700 transition duration-300 shadow-lg shadow-rose-500/30">
                    Go to Dashboard
                </a>
            @else
                <a href="{{ route('register') }}"
                    class="bg-rose-500 text-white font-bold py-3 px-8 rounded-full hover:bg-rose-700 transition duration-300 shadow-lg shadow-rose-500/30">
                    Get Started Free
                </a>
                <a href="{{ route('login') }}"
                    class="font-bold py-3 px-8 rounded-full border border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition duration-300">
                    Log In
                </a>
            @endauth
        </div>


        <div
            class="mt-20 w-full max-w-4xl mx-auto bg-white dark:bg-[#111111] rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-800 p-6 text-left relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-rose-500/10 rounded-full blur-3xl -mr-32 -mt-32"></div>

            <div class="flex items-center gap-2 mb-8">
                <div class="w-3 h-3 rounded-full bg-rose-500"></div>
                <div class="w-3 h-3 rounded-full bg-amber-500"></div>
                <div class="w-3 h-3 rounded-full bg-green-500"></div>
            </div>

            <div class="space-y-4 relative z-10">
                <div
                    class="flex items-center gap-4 p-4 rounded-xl bg-gray-50 dark:bg-[#1a1a1a] shadow-sm border border-gray-100 dark:border-gray-800 hover:border-rose-300 dark:hover:border-rose-900 transition cursor-pointer">
                    <div class="w-6 h-6 rounded-full border-2 border-rose-500 cursor-pointer flex-shrink-0"></div>
                    <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded-md w-3/4"></div>
                </div>
                <div
                    class="flex items-center gap-4 p-4 rounded-xl bg-gray-50 dark:bg-[#1a1a1a] shadow-sm border border-gray-100 dark:border-gray-800 hover:border-rose-300 dark:hover:border-rose-900 transition cursor-pointer">
                    <div
                        class="w-6 h-6 rounded-full border-2 border-gray-300 dark:border-gray-600 cursor-pointer flex-shrink-0">
                    </div>
                    <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded-md w-1/2"></div>
                </div>
                <div
                    class="flex items-center gap-4 p-4 rounded-xl bg-gray-50 dark:bg-[#1a1a1a] shadow-sm border border-gray-100 dark:border-gray-800 opacity-60">
                    <div
                        class="w-6 h-6 rounded-full bg-rose-500 flex items-center justify-center text-white flex-shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                    </div>
                    <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded-md w-2/3"></div>
                </div>
            </div>
        </div>

    </section>

    <div class="relative flex py-5 items-center">
        <div class="flex-grow border-t border-gray-800"></div>
        <span class="flex-shrink mx-4 text-gray-600">Reviews</span>
        <div class="flex-grow border-t border-gray-800"></div>
    </div>

    <section class="max-w-6xl mx-auto px-6 py-20 ">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-5xl font-black mb-4">Loved by Productivity Enthusiasts</h2>
            <p class="text-[#1b1b18]/70 dark:text-[#FDFDFC]/70 text-lg">See what our users are saying about TodoList.p.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <div
                class="bg-white dark:bg-[#111111] p-8 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-800 flex flex-col justify-between hover:border-rose-300 dark:hover:border-rose-900 transition duration-300">
                <div>
                    <div class="flex items-center gap-1 mb-4 text-amber-500">
                        <!-- 5 Stars -->
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                    </div>
                    <p class="text-lg italic mb-6">"TodoList.p has completely transformed how I organize my day. The UI
                        is incredibly clean, and it's fast. I can't imagine my workflow without it now."</p>
                </div>
                <div class="flex items-center gap-4 mt-auto">
                    <div
                        class="w-12 h-12 bg-rose-200 dark:bg-rose-900 rounded-full flex items-center justify-center text-rose-600 dark:text-rose-300 font-bold text-xl uppercase">
                        S</div>
                    <div>
                        <h4 class="font-bold">Sarah Jenkins</h4>
                        <p class="text-sm text-[#1b1b18]/60 dark:text-[#FDFDFC]/60">Freelance Designer</p>
                    </div>
                </div>
            </div>


            <div
                class="bg-white dark:bg-[#111111] p-8 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-800 flex flex-col justify-between hover:border-rose-300 dark:hover:border-rose-900 transition duration-300">
                <div>
                    <div class="flex items-center gap-1 mb-4 text-amber-500">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                    </div>
                    <p class="text-lg italic mb-6">"Finally, a task manager that focuses on simplicity rather than
                        overwhelming you with features. The dark mode is an absolute masterpiece."</p>
                </div>
                <div class="flex items-center gap-4 mt-auto">
                    <div
                        class="w-12 h-12 bg-blue-200 dark:bg-blue-900 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-300 font-bold text-xl uppercase">
                        M</div>
                    <div>
                        <h4 class="font-bold">Mark T.</h4>
                        <p class="text-sm text-[#1b1b18]/60 dark:text-[#FDFDFC]/60">Software Engineer</p>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-[#111111] p-8 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-800 flex flex-col justify-between hover:border-rose-300 dark:hover:border-rose-900 transition duration-300">
                <div>
                    <div class="flex items-center gap-1 mb-4 text-amber-500">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                        </svg>
                    </div>
                    <p class="text-lg italic mb-6">"This app is exactly what I was looking for. It just works, smoothly
                        and without friction. The sync across devices is instant."</p>
                </div>
                <div class="flex items-center gap-4 mt-auto">
                    <div
                        class="w-12 h-12 bg-green-200 dark:bg-green-900 rounded-full flex items-center justify-center text-green-600 dark:text-green-300 font-bold text-xl uppercase">
                        E</div>
                    <div>
                        <h4 class="font-bold">Emily R.</h4>
                        <p class="text-sm text-[#1b1b18]/60 dark:text-[#FDFDFC]/60">Student</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="relative flex py-5 items-center">
        <div class="flex-grow border-t border-gray-800"></div>
        <span class="flex-shrink mx-4 text-gray-600">Try Now</span>
        <div class="flex-grow border-t border-gray-800"></div>
    </div>

    <section class="max-w-6xl mx-auto px-6 py-20">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-5xl font-black mb-4">Ready to Organize Your Life?</h2>
            <p class="text-[#1b1b18]/70 dark:text-[#FDFDFC]/70 text-lg">Join thousands of satisfied users who have
                transformed their productivity with TodoList.p.</p>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            @auth
                <a href="{{ route('register') }}"
                    class="bg-rose-500 text-white font-bold py-3 px-8 rounded-full hover:bg-rose-700 transition duration-300 shadow-lg shadow-rose-500/30">
                    Get Started Free
                </a>
                <a href="{{ route('login') }}"
                    class="font-bold py-3 px-8 rounded-full border border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition duration-300">
                    Log In
                </a>
            @endauth
        </div>
    </section>

    <div class="p-2  text-center text-sm text-[#1b1b18]/60 dark:text-[#FDFDFC]/60">
        &copy; {{ date('Y') }} TodoList.p. All rights reserved.
    </div>
</body>

</html>