<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>OverTask</title>
        <!-- Fonts -->

        <!-- Styles / Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <nav id="mainpage">
            <span>
               <a href="/">
                OverTask
               </a>
            </span>
            <ul>
                <a href="#">
                    <li>Home</li>
                </a>
                <a href="#">
                    <li>About Us</li>
                </a>
                <a href="#">
                    <li>Contact</li>
                </a>
                @guest
                <a href="{{ route('register') }}">
                    <li>Register</li>
                </a>
                <a href="{{ route('login') }}">
                    <li>Login</li>
                </a>
                @else
                <a href="/home">
                    <li>Dashboard</li>
                </a>
                @endguest
                
            </ul>
        </nav>
        <main>
            <div class="container">
                <p class="title">THE BEST TO TRACK YOUR TASKS</p>
                <p class="sub-title">Enjoy a boost in your productivity</p>
                <button>More</button>
            </div>
        </main>
        <footer>
            <p>&copy;2024 testProject. All rights reserved.</p>
            <p>
                <a href="{{ route('login.take') }}">Login</a>
            </p>
        </footer>
    </body>
</html>
