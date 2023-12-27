<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container">
            <h2 class="text-center">Register Form</h2>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 border">
                    <form action="{{ route('register.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name" id=""
                                aria-describedby="emailHelpId" placeholder="" />
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ old('email') }}" name="email" id=""
                                aria-describedby="emailHelpId" placeholder="" />
                                <span class="text-danger">
                                    @error('email')
                                      {{$message}}
                                    @enderror
                                  </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Passowrd</label>
                            <input type="password" class="form-control" name="password" id=""
                                aria-describedby="emailHelpId" placeholder="" />
                                <span class="text-danger">
                                    @error('password')
                                      {{$message}}
                                    @enderror
                                  </span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Confirm Passowrd</label>
                            <input type="password" class="form-control" name="confirm_password" id=""
                                aria-describedby="emailHelpId" placeholder="" />
                                <span class="text-danger">
                                    @error('confirm_password')
                                      {{$message}}
                                    @enderror
                                  </span>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                            <a href="{{ route('login.index') }}" class="btn btn-success mt-2" >Login</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
