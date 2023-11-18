<?php
$serverName = "localhost";
$userName = "root";
$passWord = "";
$dbName = "test";


//create connection
//! 1 st method
$conn = mysqli_connect($serverName,$userName,$passWord,$dbName);

if($conn)
{
    print("db connected successfully");
}
else{
    die("Connection failed: " .mysqli_connect_error());
}

mysqli_close($conn);

//! 2nd method

// $conn = new mysqli($serverName, $userName, $passWord, $dbName);

// // Check connection
// if ($conn) {
//     print("Db connected Successfully");

   
// }
// else{
//     die("Connection failed: " . $conn->connect_error);
// }

// $conn->close();
?>