<?php
    include 'connection.php';

    if(isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM student WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    $conn->close();
?>
