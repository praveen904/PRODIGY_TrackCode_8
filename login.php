<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
</head>
<body>
    <?php
    $username=$_POST["username"];
    $password=$_POST["password"];
 

    $conn=new mysqli("localhost","root","","praveen");

    if($conn->connect_error){
        die("Connection filed!!".$conn->connect_error);
    }
    else{
        echo "Connection Successfull !!!<br><br>";
    }
    $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
    $stmp=$conn->prepare("SELECT*FROM praveen.users WHERE username=? and password=?");
    $stmp->bind_param("ss",$username,$hashedPassword);

    if($stmp->execute()===TRUE){
        $res=$stmp->get_result();
        if($res->num_rows > 0){
            header("location:dashboard.html");
            exit();
        }
        else{
            echo "you don't have account<br><br>";
            echo "<a href='signin.html'>sign in</a>";
            
        }
    }
    else{
        echo"select failed".$stmp->error;
        
    }
    ?>
</body>
</html>