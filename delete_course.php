<?php
// delete_staff.php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['coursename'])) {
    // Assuming you have a database connection
    include 'db_connection.php';
    // Collect registration number from the query parameters
    $coursename = $_GET['coursename'];
    echo $coursename;
    // Delete the staff record from the staff table
    $deleteQuery = "DELETE FROM admin WHERE `admin`.`COURSE` = '".$coursename."'";
    $deletetable = "DROP TABLE " . $coursename;
    $deleteclasssubject = "DROP TABLE " . $coursename . "_subjects";
    echo $deletetable;
    echo $deleteclasssubject;
    if (($conn->query($deleteQuery) === TRUE) and ($conn->query($deletetable)) and ($conn->query($deleteclasssubject))) {
        $conn->close();
        header("Location: index.php"); // Redirect back to the staff.php page
        exit();
    } else {
        echo "Error deleting Course record: " . $conn->error;
    }

    $conn->close();
}
?>
