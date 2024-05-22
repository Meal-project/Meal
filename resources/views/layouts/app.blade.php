<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css'])
</head>

<body>


    <div id="app">
        <div class="navbar">
            <div class="nav-brand">
                <a class="nav-link-brand" href="{{ url('/') }}">
                    <img src="http://localhost:8080/Meal/public/images/logo.svg" alt="logo" height="40px"
                        width="100px" />
                </a>
            </div>

            <div class="nav-item-list">
                <div class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">
                        <span class="nav-title">首頁</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('posts.create') }}">
                        <span class="nav-title">創建飯局</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('surprise') }}">
                        <span class="nav-title">驚喜包</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('posts.index') }}">
                        <span class="nav-title">我要假奔</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('post_user.index') }}">
                        <span class="nav-title">我的飯局</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="nav-title">通知</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('{name}', ['name' => $user->name ?? 'None']) }}">
                        <span class="nav-title">個人檔案</span>
                    </a>
                </div>

                    <input type="checkbox" id="menu">
                    <label for="menu" class="line">
                        <div class="menu"></div>
                    </label>

                    <div class="menu-list">
                        <ul>
                            <li>選單2</li>
                            <li>選單3</li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <input class="burger-link-logout" type="submit" value="logout">
                                </form>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>

        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
