<?php
include("connection.php");

if(isset($_GET['id'])) {
    // Sanitize input to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "DELETE FROM students WHERE id = '$id'"; // Using backticks around table and column names is optional

    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        header('location: index.php?delete_msg=You have deleted the record.');
        exit(); // It's good practice to exit after a header redirect
    }
}
?>

