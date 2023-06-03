<?php
require 'config.php';

$id = $_GET['id'];

try {
    // Prepare the SQL statement
    $sql = "DELETE FROM `crudpdo` WHERE id = :id";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameter
    $stmt->bindParam(':id', $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Delete data successfully');window.location.href='view.php';</script>";
    } else {
        echo "Error deleting record";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?