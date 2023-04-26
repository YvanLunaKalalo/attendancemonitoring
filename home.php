<?php
include('account.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMS | Home</title>
    <link rel="stylesheet" href="home.css">
    <!-- Link BOOTSTRAP 5.3.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dashboard
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="attendance.php">Attendance</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Setting</a></li>
          </ul>
        </li>
      </ul>
      <button class="btn btn-dark" type="submit" name="logout">Logout</button>
    </div>
  </div>
</nav>
</form>

<div class="container d-flex justify-content-center align-items-center flex-column">
<h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>

<div class="card" style="width: 18rem;">
  <img src="../attendancemonitoring/1.jpg" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">Importance of attendance to students</h5>
    <p class="card-text">By attending class regularly, your child is more likely to keep up with daily lessons and assignments and take quizzes and tests on time. Research has shown that your child's regular attendance may be the greatest factor influencing his/her academic success.</p>
  </div>

  <!-- <ul class="list-group list-group-flush">
    <li class="list-group-item">An item</li>
    <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li>
  </ul> -->
  
  <div class="card-body">
    <a href="#" class="card-link">Time-in</a>
    <a href="#" class="card-link">Time-out</a>
  </div>
</div>

     <!-- Link BOOTSTRAP 5.3.0 JS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</body>
</html>