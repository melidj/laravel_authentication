<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        

        <!-- Styles -->
        <style>
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo" class="navbar-brand img-fluid" width="100">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-black" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black"  href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black"  href="#">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex me-3">
                    <h3>{{ Auth::user()->name }}</h3>
                </div>
        </nav>

        <div class="container me-2">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
        </div>
    </body>
</html>
