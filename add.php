<?php
include 'connection.php';

// Initialize variables
$student_id = $full_name = $year = $course = $email = $phone_num = $time_in = $time_out = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"];
    $full_name = $_POST["full_name"];
    $year = $_POST["year"];
    $course = $_POST["course"];
    $email = $_POST["email"];
    $phone_num = $_POST["phone_num"];
    $time_in = $_POST["time_in"];
    $time_out = $_POST["time_out"];

    // Insert data into the database
    $sql = "INSERT INTO student (student_id, full_name, year, course, email, phone_num, time_in, time_out) 
            VALUES ('$student_id', '$full_name', '$year', '$course', '$email', '$phone_num', '$time_in', '$time_out')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
<?php include 'connection.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Record</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-3">Add New Record</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="number" class="form-control" name="student_id" value="<?php echo $student_id; ?>" required>
            </div>
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" name="full_name" value="<?php echo $full_name; ?>" required>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" class="form-control" name="year" value="<?php echo $year; ?>" required>
            </div>
            <div class="form-group">
                <label for="course">Course:</label>
                <input type="text" class="form-control" name="course" value="<?php echo $course; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone_num">Phone Number:</label>
                <input type="tel" class="form-control" name="phone_num" value="<?php echo $phone_num; ?>" required>
            </div>
            <div class="form-group">
                <label for="time_in">Date and Time In:</label>
                <input type="datetime-local" class="form-control" name="time_in" value="<?php echo $time_in; ?>" required>
            </div>
            <div class="form-group">
                <label for="time_out">Date and Time Out:</label>
                <input type="datetime-local" class="form-control" name="time_out" value="<?php echo $time_out; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Add</button>
            <a href="attendance.php" class="btn btn-warning mt-3">Cancel</a>
        </form>
    </div>

</body>
</html>