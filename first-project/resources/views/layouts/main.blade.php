<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/js/app.js')
    <title>Posts</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link {{request()->is('posts') ? 'active' : ''}}" aria-current="page" href="{{ route('posts.index') }}">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{request()->is('categories') ? 'active' : ''}}" href="{{ route('categories.index') }}">Categories</a>
                                </li>
                             <li class="nav-item">
                                <a class="nav-link {{request()->is('tags') ? 'active' : ''}}" href="{{ route('tags.index') }}">Tags</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row mt-5">
            @yield('content')
        </div>
    </div>
</body>
</html>