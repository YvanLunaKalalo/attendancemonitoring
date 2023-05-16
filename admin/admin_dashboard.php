<?php 
include ('../connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
<form method="POST">
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="admin_dashboard.php">AMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin_dashboard.php">Home</a>
        </li> -->

        <!-- <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li> -->

        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dashboard
          </a> -->

          <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="attendance.php">Attendance</a></li> -->
            <!-- <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Setting</a></li> -->
          <!-- </ul>
        </li> -->
        <!-- <form class="d-flex">
          <input class="form-control mr-3" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success m-1" type="submit">Search</button>
        </form> -->
      <!-- </ul> -->
      <a class="btn btn-outline-dark" href="admin_index.php" type="logout" name="logout">Logout</a>
      
    </div>
  </div>
</nav>
</form>

<div class="container mt-5">
    <h1 class="text-center mb-5">Admin Attendance Monitoring System</h1>

    <form method="GET" class="mb-3">
        <div class="row">
          <div class="col">
                <input type="text" name="search_student_id" class="form-control" placeholder="Search by Student ID">
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
            <div class="col-4">
                <input type="text" name="search_full_name" class="form-control" placeholder="Search by Full Name">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <div class="table-responsive mt-4">
        <table class="table table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Year</th>
                <th>Course</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Time in</th>
                <th>Time out</th>
                <th>Action</th>
            </tr>

            <?php
                include '../connection.php';

                // Check if search form has been submitted
                if (isset($_GET['search_student_id']) || isset($_GET['search_full_name'])) {

                    $search_student_id = $_GET['search_student_id'];
                    $search_full_name = $_GET['search_full_name'];
                    

                    // Build SQL query with search criteria
                    $sql = "SELECT * FROM student WHERE 1=1";

                    if (!empty($search_full_name)) {
                        $sql .= " AND full_name LIKE '%$search_full_name%'";
                    }

                    if (!empty($search_student_id)) {
                        $sql .= " AND student_id LIKE '%$search_student_id%'";

                    }

                    $sql .= " ORDER BY id DESC";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['student_id']."</td>";
                            echo "<td>".$row['full_name']."</td>";
                            echo "<td>".$row['year']."</td>";
                            echo "<td>".$row['course']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['phone_num']."</td>";
                            echo "<td>".$row['time_in']."</td>";
                            echo "<td>".$row['time_out']."</td>";
                            echo "<td>
                                    <a href='edit.php?id=".$row['id']."' class='btn btn-sm btn-primary'>Edit</a>
                                    <a href='delete.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\")' class='btn btn-sm btn-danger'>Delete</a>
                                </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>No records found</td></tr>";
                    }

                } else {

                    // Show all records if search form
                    $sql = "SELECT * FROM student ORDER BY id DESC";

                    $result = $conn->query($sql);
    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['student_id']."</td>";
                            echo "<td>".$row['full_name']."</td>";
                            echo "<td>".$row['year']."</td>";
                            echo "<td>".$row['course']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['phone_num']."</td>";
                            echo "<td>".$row['time_in']."</td>";
                            echo "<td>".$row['time_out']."</td>";
                            echo "<td>
                                    <a href='admin_edit.php?id=".$row['id']."' class='btn btn-sm btn-primary'>Edit</a>
                                    <a href='admin_delete.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\")' class='btn btn-sm btn-danger'>Delete</a>
                                </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>No records found</td></tr>";
                    }
    
                }
              
                $conn->close();
            ?>
    
        </table>
    </div>

</body>
</html>