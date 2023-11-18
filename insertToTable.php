<?php
// var_dump($_POST); used for debugging
require_once "dbConnection.php";

if(isset($_POST['submit']))
{
    $userName = $_POST['name'];
    $sql = "INSERT INTO demo(Name) VALUES('$userName')";
    //  echo "Debug SQL Query: $sql";  
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        print("Data added successfully");
    }
    else{
         print("Some error" .mysqli_error($conn));
    }
    mysqli_close($conn);
}
else{
    print("Enter some data and submit<br>");
}




?>