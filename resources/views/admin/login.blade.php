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
                    <div class="card">
                        <div class="card-body p-5">
                            <form class="mb-3 mt-md-4 mt-lg-2">
                                <img src="https://cusat.ac.in/files/pictures/pictures_1_logo.png" width="55" class="img-fluid d-block mx-auto" alt="" srcset="">
                                <h2 class="fw-bold mb-2 mt-3 text-center">Login</h2>

                                <div class="mb-3">
                                    <label for="email" class="form-label ">Email Address</label>
                                    <input type="email" class="form-control" id="email" placeholder="name@cusat.ac.in">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label ">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="********">
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>