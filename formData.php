<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Enter Your Name :<input type="text" name="Name" >
        <br>
        Enter your Email : <input type="email" name="Email">
        <br>
        Enter your password : <input type="password" name="passWord">
        <br>
        <input type="submit" value="Submit" name="submit">
    </form>


    <?php
   
   if(isset($_POST['submit']))
   {
    $userName = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['passWord'];

    // password hashing
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //password_default is a hashing algorithm that means we are using the php default hashing algo
    //if php chnages the default algo to something else out algo changes because we add password default option
 
    print("$password");
    print("$hashedPassword");

   }

?>
</body>
</html>