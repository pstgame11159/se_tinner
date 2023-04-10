<?php
session_start();

include "connection/server.php";
if(isset($_POST['signin']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHere email = '$email' AND password_s = '$password' ";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==1)
    {
        $row = mysqli_fetch_array($result);

        $_SESSION['urole'] = $row["urole"];

        if($_SESSION['urole'] == 'superadmin' || $_SESSION['urole'] == 'admin' || $_SESSION['urole'] == 'user')
        {
            $_SESSION['admin_login'] = $row["u_id"];

            $_SESSION['username'] = $row["username"];
            
            $_SESSION['fullname'] = $row["fullname"];//name
            $_SESSION['age'] = $row["age"]; //age
            $_SESSION['sex'] = $row["sex"]; //gender
            $_SESSION['bio'] = $row["bio"];//bio
            


            echo "<script>alert('เข้าสู่ระบบสำเร็จ');
            window.location.href='chat2.php';
            </script>";
        }
        else
        {
            echo "<script>alert('รหัสผ่านผิด');
            window.location.href='login_16.php';
            </script>";
        }
    }
    else
    {
        echo "<script>";
        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
        echo "window.history.back()";
        echo "</script>";
    }
}
?>
