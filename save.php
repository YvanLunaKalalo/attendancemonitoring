<?php
// Include connection.php to connect to the database
include 'connection.php';

// Get the username and password from the form submission
$username = $_POST['username'];
$password = $_POST['password'];
$encpass = md5($password);

// Check if the username already exists in the login_user table
$sql = "SELECT * FROM login_user WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // If username already exists, show JavaScript alert and redirect back to register.php
  echo "<script>alert('Username Already Exists!'); window.location.href = 'register.php';</script>";
  exit();
} else {
  // If username does not exist, insert the username and password into the login_user table
  $sql = "INSERT INTO login_user (username, password) VALUES ('$username', '$encpass')";
  if ($conn->query($sql) === TRUE) {
    // If insert was successful, show JavaScript alert and redirect to index.php
    echo "<script>alert('Registered Successfully!'); window.location.href = 'index.php';</script>";
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close the database connection
$conn->close();
