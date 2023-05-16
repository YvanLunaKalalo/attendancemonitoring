<?php
    include '../connection.php';
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        
        // retrieve the record from the database
        $sql = "SELECT * FROM student WHERE id = $id";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $student_id = $row['student_id'];
            $full_name = $row['full_name'];
            $year = $row['year'];
            $course = $row['course'];
            $email = $row['email'];
            $phone_num = $row['phone_num'];
            $time_in = $row['time_in'];
            $time_out = $row['time_out'];
        }
    }
    
    if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $student_id = $_POST['student_id'];
        $full_name = $_POST['full_name'];
        $year = $_POST['year'];
        $course = $_POST['course'];
        $email = $_POST['email'];
        $phone_num = $_POST['phone_num'];
        $time_in = $_POST['time_in'];
        $time_out = $_POST['time_out'];
        
        // update the record in the database
        $sql = "UPDATE student SET student_id='$student_id', full_name='$full_name', year='$year', course='$course', email='$email', phone_num='$phone_num', time_in='$time_in', time_out='$time_out' WHERE id=$id";
        
        if($conn->query($sql) === TRUE) {
            echo "<script>alert('Record updated successfully');</script>";
            echo "<script>window.location.href='attendance.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Edit Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
<form method="POST">
<div class="container mt-5">
    <h2>Edit Record</h2>
    <div class="row">
        <div class="col-md-6">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="student_id">Student ID</label>
                <input type="text" name="student_id" class="form-control" value="<?php echo $student_id; ?>" required>
            </div>
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" class="form-control" value="<?php echo $full_name; ?>" required>
            </div>
            <div class="form-group">
                <label for="year">Year Level</label>
                <input type="number" name="year" class="form-control" value="<?php echo $year; ?>" required>
            </div>
            <div class="form-group">
                <label for="course">Course</label>
                <input type="text" name="course" class="form-control" value="<?php echo $course; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone_num">Phone Number</label>
                <input type="text" name="phone_num" class="form-control" value="<?php echo $phone_num; ?>" required maxlength="11">
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="time_in">Time In</label>
                    <input type="datetime-local" name="time_in" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($time_in)); ?>" required>
                </div>
            <div class="form-group">
                <label for="time_out">Time Out</label>
                <input type="datetime-local" name="time_out" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($time_out)); ?>" required>
            </div>
            <div class="form-group">
                <button type="submit" name="update" class="btn btn-success mt-3">Update</button>
                <a href="admin_dashboard.php" class="btn btn-outline-danger mt-3">Cancel</a>

            </div>
        </div>
    </div>
</div>
</body>
</html>