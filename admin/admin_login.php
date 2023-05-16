<?php
// Include connection.php to connect to the database
include '../connection.php';

// Start the session
session_start();

if (isset($_POST['submit'])) {
    // Retrieve the user's inputs from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement to retrieve the user's account information
    $stmt = $conn->prepare("SELECT * FROM admin_login WHERE username = ? AND password = MD5(?)");
    $stmt->bind_param("ss", $username, $password);

    // Execute the statement
    $stmt->execute();

    // Get the result set from the statement
    $result = $stmt->get_result();

    // Check if the user exists and their password is correct
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Start the session and redirect the user to the admin dashboard
        session_start();
        $_SESSION['username'] = $username;
        // header("Location: ../dashboard.php");
        echo "<script>alert('Welcome, Admin!'); window.location.href = 'admin_dashboard.php';</script>";
        exit();
    } else {
        // Display an error message if the user doesn't exist or password is incorrect
        // echo "<div class='bg-danger text-center p-3 text-white'>Invalid username or password</div>";
        echo "<script>alert('Incorrect Admin Username or Password!'); window.location.href = 'admin_index.php';</script>";
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>