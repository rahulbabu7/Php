<?php
session_start();
if (isset($_POST['submit'])) {

    $userName = $_POST['username'];
    $passWord = $_POST['password'];
    if ((($userName) != "") || (($passWord) != "")) {
        if ($userName == "admin" && $passWord == "admin123") {
            $_SESSION['name'] = $userName;
            header("Location:Welcome.php");
            exit();
        } else {
            $errorMessage = "Incorrect username  or password";
        }
    } else {
        $errorMessage = "Please enter a username or password";
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
if (isset($errorMessage)) {
    print("<p style='color:red;'> $errorMessage </p>");
}

?>
    <h2> Enter your username and password </h2>
    <form method="post" action="login.php">
        UserName: <input type="text" name="username" />
        <br>
        Password: <input type="text" name="password" />
        <br>
        <input type="submit" name="submit" value="Login" />
        <br>
    </form>
</body>

</html>