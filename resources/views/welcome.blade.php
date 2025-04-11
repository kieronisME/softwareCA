<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/external-css/main.css') }}">
    <style>
        .bgContainer {
            min-height: 100vh;
            background-size: cover;
            background-position: center;
        }

        .nav-custom {
            padding: 1rem 0;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            transition: all 0.3s ease;
            min-width: 120px;
            text-align: center;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <div class="bgContainer flex-grow-1 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">


                    <div class="bg-white p-4 rounded shadow-sm">
                        <h1 class="display-4 mb-4">Welcome To Sustain</h1>
                        <p class="lead">Build with no guilt</p>
                    </div>

                    @if (Route::has('login'))
                    <nav class="nav-custom d-flex flex-wrap justify-content-center gap-3 mb-5 p-3 rounded">
                        @auth
                        <a href="{{ url('MainTestPage') }}" class="btn btn-primary btn-custom">
                            Dashboard
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-custom">
                            Log in
                        </a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-custom">
                            Register
                        </a>
                        <!-- 
                        <a href="{{ route('MainTestPage') }}" class="btn btn-info btn-custom">
                            Test Page
                        </a> -->
                        @endif
                        @endauth
                    </nav>
                    @endif


                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>