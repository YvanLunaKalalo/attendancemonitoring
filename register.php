<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMS | Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-start flex-column vh-100">
        <div class="container"> 
            <div class="row justify-content-end mt-5">
                <h1>AMS | Register</h1>
                
                <div class="col-md-6">
                    <form action="save.php" method="post">

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="name" class="form-control" name="username" placeholder="Enter Username" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                    <div class="mt-2">Have an account?<a href="index.php" class="ms-2">Login here.</a></div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

