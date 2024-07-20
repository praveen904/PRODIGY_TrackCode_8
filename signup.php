<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
</head>
<body>
    <?php
    $username=$_POST["username"];
    $pass=$_POST["password"];
    $email=$_POST["email"];

   
    $conn=new mysqli("localhost","root","","praveen");

    if($conn->connect_error){
        die("Connection filed!!".$conn->connect_error);
    }
    else{
        echo "Connection Successfull !!!<br><br>";
    }
    $stmp=$conn->prepare("INSERT INTO praveen.users(username,password,email) VALUE(?,?,?)");
    $stmp->bind_param("sss",$username,$pass,$email);

    if($stmp->execute()==TRUE){
        echo "!!!!!!!!! SUCCESS !!!!!!!!!<br>";
        header("Location:login.html");
    }
    else{
        echo"INSERT FAILED!!!".$stmp->error;
    }
    ?>
</body>
</html>