<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor Login</title>
    <link href="{{ asset('assets/css') }}/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">


                <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">

                    <form action="{{ route('doctor.save_login') }}" method="POST" style="margin: auto 0; width: 100%;">
                        @csrf
                        <h1>Welcome Doctor Login</h1>
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                <strong>{{ session()->get('error') }}</strong>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js') }}/bootstrap.bundle.min.js"></script>
</body>

</html>
