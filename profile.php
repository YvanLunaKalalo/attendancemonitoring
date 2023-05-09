<?php
include('connection.php');
include('account.php');
?>

<!DOCTYPE html>
<html>
<head lang="en">
  <title>AMS | Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
<form method="POST">
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">AMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li> -->

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dashboard
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="attendance.php">Attendance</a></li>
            <!-- <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Setting</a></li> -->
          </ul>
        </li>
      </ul>
      <button class="btn btn-outline-dark" type="logout" name="logout">Logout</button>
    </div>
  </div>
</nav>
</form>

<section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-4">

        <div class="card" style="border-radius: 15px;">
          <div class="card-body text-center">
            <div class="mt-3 mb-4">
              <img src="black.jpg"
                class="rounded-circle img-fluid" style="width: 100px;" />
            </div>
            <h4 class="mb-2"><?php echo $_SESSION['username']; ?></h4>
            <p class="text-muted mb-4">@<?php echo $_SESSION['username']; ?><span class="mx-2">|</span> <a
                href="https://bcas.edu.ph/">Contact Us</a></p>

            <!-- <div class="mb-4 pb-2">
              <button type="button" class="btn btn-outline-primary btn-floating">
                <i class="fab fa-facebook-f fa-lg"></i>
              </button>
              <button type="button" class="btn btn-outline-primary btn-floating">
                <i class="fab fa-twitter fa-lg"></i>
              </button>
              <button type="button" class="btn btn-outline-primary btn-floating">
                <i class="fab fa-skype fa-lg"></i>
              </button>
            </div> -->
            
            <div>
                <a href="attendance.php" class="btn btn-success btn-rounded btn-lg">Attendance</a>
                <a href="home.php" class="btn btn-outline-danger btn-rounded btn-lg">Go back</a>  
            </div>
<!-- 
            <div class="d-flex justify-content-center text-center mt-5 mb-2">
              <div>
                <?php if (isset($_POST['email'])): ?>
                  <p class="text-muted mb-0"><?php echo $_POST['email']; ?> Wallets Balance</p>
                  <?php else: ?>
                    <p class="text-muted mb-0">No email provided</p>
                    <?php endif; ?> -->
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

</body>
</html>