<?php
// Include connection.php to connect to the database
include 'connection.php';

// Start the session
session_start();

// Get the username and password from the form submission
$username = $_POST['username'];
$password = $_POST['password'];
$encpass = md5($password);

// Check if the username and password match in the login_user table
$sql = "SELECT * FROM login_user WHERE username='$username' AND password='$encpass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // If username and password match, set session variables and show JavaScript alert, then redirect to home.php
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;

  echo "<script>alert('Log in Successfully!'); window.location.href = 'home.php';</script>";
  exit();
} else {
  // If username and password do not match, show JavaScript alert and redirect back to index.php
  echo "<script>alert('Incorrect Username or Password!'); window.location.href = 'index.php';</script>";

  exit();
}

// Close the database connection
$conn->close();
?>
