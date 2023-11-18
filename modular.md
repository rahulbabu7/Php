Certainly! Let's break down the steps and create a simple example using an HTML form to add and update user information in a database.
1. HTML Form (index.html):

Create a simple HTML form with fields for adding and updating user information.

html

<!-- index.html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
</head>
<body>
    <h2>Add User</h2>
    <form action="add_user.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Add User">
    </form>

    <h2>Update User</h2>
    <form action="update_user.php" method="post">
        <label for="userId">User ID:</label>
        <input type="text" name="userId" required>

        <label for="newUsername">New Username:</label>
        <input type="text" name="newUsername" required>

        <label for="newEmail">New Email:</label>
        <input type="email" name="newEmail" required>

        <input type="submit" value="Update User">
    </form>
</body>
</html>

2. Database Connection (db_connection.php):

php

<!-- db_connection.php -->

<?php
$serverName = "localhost";
$userName = "your_username";
$passWord = "your_password";
$dbName = "your_database";

$conn = mysqli_connect($serverName, $userName, $passWord, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

3. Database Functions (db_functions.php):

php

<!-- db_functions.php -->

<?php
require_once "db_connection.php";

function addUser($username, $email, $password) {
    global $conn;

    $sql = "INSERT INTO fb_users (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function updateUser($userId, $newUsername, $newEmail) {
    global $conn;

    $sql = "UPDATE fb_users SET username = ?, email = ? WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $newUsername, $newEmail, $userId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
?>

4. Add User (add_user.php):

php

<!-- add_user.php -->

<?php
require_once "db_functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    addUser($username, $email, $password);
    echo "User added successfully!";
} else {
    echo "Form not submitted!";
}
?>

5. Update User (update_user.php):

php

<!-- update_user.php -->

<?php
require_once "db_functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];
    $newUsername = $_POST['newUsername'];
    $newEmail = $_POST['newEmail'];

    updateUser($userId, $newUsername, $newEmail);
    echo "User updated successfully!";
} else {
    echo "Form not submitted!";
}
?>

In this example, the HTML form (index.html) has two sections for adding and updating users. The PHP scripts (add_user.php and update_user.php) process the form submissions and interact with the database using the functions defined in db_functions.php. The database connection is handled in db_connection.php.

Please adapt the code to fit your specific needs and ensure that you have proper error handling and validation in a real-world scenario.









without statements

Certainly! Here's the complete set of files based on the modified db_functions.php without prepared statements:
1. HTML Form (index.html):

html

<!-- index.html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
</head>
<body>
    <h2>Add User</h2>
    <form action="add_user.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" name="submit" value="Add User">
    </form>

    <h2>Update User</h2>
    <form action="update_user.php" method="post">
        <label for="userId">User ID:</label>
        <input type="text" name="userId" required>

        <label for="newUsername">New Username:</label>
        <input type="text" name="newUsername" required>

        <label for="newEmail">New Email:</label>
        <input type="email" name="newEmail" required>

        <input type="submit" name="submit" value="Update User">
    </form>
</body>
</html>

2. Database Connection (db_connection.php):

php

<!-- db_connection.php -->

<?php
$serverName = "localhost";
$userName = "your_username";
$passWord = "your_password";
$dbName = "your_database";

$conn = mysqli_connect($serverName, $userName, $passWord, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

3. Database Functions (db_functions.php):

php

<!-- db_functions.php -->

<?php
require_once "db_connection.php";

function addUser($username, $email, $password) {
    global $conn;

    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "INSERT INTO fb_users (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($conn, $sql);
}

function updateUser($userId, $newUsername, $newEmail) {
    global $conn;

    $newUsername = mysqli_real_escape_string($conn, $newUsername);
    $newEmail = mysqli_real_escape_string($conn, $newEmail);

    $sql = "UPDATE fb_users SET username = '$newUsername', email = '$newEmail' WHERE user_id = $userId";
    mysqli_query($conn, $sql);
}
?>

4. Add User (add_user.php):

php

<!-- add_user.php -->

<?php
require_once "db_functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    addUser($username, $email, $password);
    echo "User added successfully!";
} else {
    echo "Form not submitted!";
}
?>

5. Update User (update_user.php):

php

<!-- update_user.php -->

<?php
require_once "db_functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $userId = $_POST['userId'];
    $newUsername = $_POST['newUsername'];
    $newEmail = $_POST['newEmail'];

    updateUser($userId, $newUsername, $newEmail);
    echo "User updated successfully!";
} else {
    echo "Form not submitted!";
}
?>
