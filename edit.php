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

    // Update data in the database
    $sql = "UPDATE student SET full_name='$full_name', year='$year', course='$course', email='$email', phone_num='$phone_num', time_in='$time_in', time_out='$time_out' WHERE student_id='$student_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} elseif (isset($_GET["id"])) { // Check if student ID is provided in the URL
    $student_id = $_GET["id"];

    // Fetch existing details of the student record
    $sql = "SELECT * FROM student WHERE student_id='$student_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $full_name = $row["full_name"];
        $year = $row["year"];
        $course = $row["course"];
        $email = $row["email"];
        $phone_num = $row["phone_num"];
        $time_in = $row["time_in"];
        $time_out = $row["time_out"];
    } else {
        echo "No record found with the provided student ID.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update Record</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Update Record</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="number" class="form-control" id="student_id" name="student_id" value="<?php echo $student_id; ?>" required>
            </div>
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $full_name; ?>" required>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" class="form-control" id="year" name="year" value="<?php echo $year; ?>" required>
            </div>
            <div class="form-group">
                <label for="course">Course:</label>
                <input type="text" class="form-control" id="course" name="course" value="<?php echo $course; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone_num">Phone Number:</label>
                <input type="tel" class="form-control" id="phone_num" name="phone_num" value="<?php echo $phone_num; ?>" required>
            </div>
            <div class="form-group">
                <label for="time_in">Date and Time In:</label>
                <input type="datetime-local" class="form-control" id="time_in" name="time_in" value="<?php echo $time_in; ?>" required>
            </div>
            <div class="form-group">
                <label for="time_out">Date and Time Out:</label>
                <input type="datetime-local" class="form-control" id="time_out" name="time_out" value="<?php echo $time_out; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save</button>
            <a href="attendance.php" class="btn btn-warning mt-3">Cancel</a>
        </form>
    </div>

    
<?php
// Check if the page was accessed with a student_id parameter
if(isset($_GET["student_id"])) {
    // Retrieve the student data from the database
    $student_id = $_GET["student_id"];
    $sql = "SELECT * FROM student WHERE student_id='$student_id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        // Display the existing details in the form
        $row = mysqli_fetch_assoc($result);
        $full_name = $row["full_name"];
        $year = $row["year"];
        $course = $row["course"];
        $email = $row["email"];
        $phone_num = $row["phone_num"];
        $time_in = $row["time_in"];
        $time_out = $row["time_out"];
    } else {
        // Display an error message if the student data was not found
        echo "Error: Student data not found.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
</body>
</html>
