<?php
// require_once "dbConnection.php";

//create table 
 $table = "CREATE TABLE IF NOT EXISTS Registration (
   --  ID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    FULL_NAME VARCHAR(30),
    EMAIL VARCHAR(30),
    PASSWORD VARCHAR(30),
    DOB VARCHAR(10),
    GENDER VARCHAR(30),
    PHONE_NUMBER VARCHAR(10),
    ADDRESS VARCHAR(30),
    COUNTRY VARCHAR(20),
    OCCUPATION VARCHAR(20),
    USERNAME VARCHAR(20)


 )";

 $result = mysqli_query($conn,$table);
 if($result)
 {
    print("<br>Table created successfully<br>");
 }
 else{
    print("<br>Table not created ".mysqli_error($conn));
 }

?>