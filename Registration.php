 <?php

require_once "dbConnection.php";
require_once "RegistrationTableCreation.php";

if(isset($_POST['submit']))
{
    print("Hi<br>");
    $fullName = $_POST["fullName"];
    $email = $_POST["Email"];
    $passWord = $_POST["passWord"];
    $dob = $_POST["DOB"];
    $gender = $_POST["Gender"];
    $phnNumber = $_POST["phnNo"];
    $address = $_POST["address"];
    $country = $_POST["country"];
    $occupation = $_POST["occupation"];
    $userName = $_POST["userName"];

     //$hashedPassword = password_hash($passWord, PASSWORD_DEFAULT);
    $sql = "INSERT INTO Registration
    (
    FULL_NAME,
    EMAIL,
    PASSWORD,
    DOB,
    GENDER,
    PHONE_NUMBER,
    ADDRESS,
    COUNTRY,
    OCCUPATION,
    USERNAME
    ) 
    VALUES
    (
    '$fullName',
    '$email',
    '$passWord',
    '$dob',
    '$gender',
     $phnNumber,
    '$address',
    '$country',
    '$occupation',
    '$userName'
    )";


// print("$sql");
    $result1 = mysqli_query($conn,$sql);
    if($result1)
    {
        // print("hii");
        print("data added<br>");
        // header("Location: Registration.php");
        // exit();
    }
    else{
        print("Data not inserted ".mysqli_error($conn));
    }

}
else{
    print("<br> Cannot get data");
}
mysqli_close($conn);
?>