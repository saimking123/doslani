<?php
include("connection/connection.php");
// session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Use mysqli_real_escape_string to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $hashedPassword = md5($password);

    $query = "SELECT * FROM user WHERE email = '".$email."' AND password = '".$hashedPassword."' LIMIT 1";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["namevar"] = $row["name"];
        if ($row) {
            if ($row['role'] == 0) {
                header("location:index.php");
                
                echo "user";
            } elseif ($row['role'] == 1) {
                header("location:admin/index.php");
                // $_SESSION["loggedin"] = true;
                // $_SESSION["namevar"] = $row["name"];
            } else {
                echo "Username or password incorrect";
            }
        } else {
            echo "No matching user found";
        }
    } else {
        // Handle query error
        echo "Error executing the query: " . mysqli_error($conn);
    }
}
?>
