<?php
// login.php - handles user authentication
session_start();

$host = "localhost";
$db_user = "root";
$db_pass = "root123";
$db_name = "momo_portal";

$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $row['username'];
        $_SESSION['is_admin'] = $row['is_admin'];
        header("Location: dashboard.php");
    } else {
        echo "Login failed for user: " . $username;
    }
}
?>

<form method="POST" action="login.php">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>
