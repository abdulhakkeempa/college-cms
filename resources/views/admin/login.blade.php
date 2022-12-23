<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Department of Computer Science</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="image-fill d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card login-card">
                        <div class="card-body p-4 pb-1">
                            <form id="login-form" class="mb-3 mt-md-4 mt-lg-2 mb-lg-4" method="POST" action="/login">
                                <img src="https://cusat.ac.in/files/pictures/pictures_1_logo.png" width="55" class="img-fluid d-block mx-auto" alt="" srcset="">
                                <h2 class="fw-bold mb-4 mt-3 text-center login-title">Login</h2>
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@cusat.ac.in">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label ">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="********">
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                                @if($errors->any())
                                <div class="alert mt-4 bg-danger">
                                    Incorrect Email Id & Password. Please try again.
                                    <span id="closebtn">&times;</span>  
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>