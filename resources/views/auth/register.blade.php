<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('template/img/icons/icon-48x48.png') }}" />

    <title>Contact App | Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('template/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Get started</h1>
                            <p class="lead">
                                Start creating the best possible user experience for you customers.
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    @include('partials.alerts')
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="name">Full name</label>
                                            <input
                                                class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                type="text" id="name" name="name"
                                                placeholder="Enter your name" value="{{ old('name') }}" />
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email</label>
                                            <input
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                type="email" id="email" value="{{ old('email') }}" name="email"
                                                placeholder="Enter your email" />
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                type="password" name="password" id="password"
                                                placeholder="Enter password" />
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password_confirmation">Password
                                                Confirmation</label>
                                            <input class="form-control form-control-lg" type="password"
                                                name="password_confirmation" id="password_confirmation"
                                                placeholder="Confirm your password!" />
                                        </div>
                                        <div class="d-grid gap-2 mt-3">
                                            <input type="submit" value="Register" class="btn btn-lg btn-primary">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            Already have account? <a href="{{ route('login') }}">Log In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('template/js/app.js') }}"></script>

</body>

</html>
