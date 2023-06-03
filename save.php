[7:22 am, 03/06/2023] imran: <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="sha384-..." crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div…
[7:22 am, 03/06/2023] imran: Index.php
[7:23 am, 03/06/2023] imran: <?php
require "config.php";

$uname = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$phone = $_POST['phone'];

$query = "INSERT INTO `crudpdo` (username, email, password, phone) 
          VALUES (:uname, :email, :pass, :phone)";

if (isset($_POST['submit'])) {
    try {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':uname', $uname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':phone', $phone);

        if ($stmt->execute()) {
            echo "<script>alert('Stored success');window.location.href='view.php';</script>";
        } else {
            echo "<script>alert('Stored error');window.location.href='view.php';</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>