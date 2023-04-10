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
            




            ?>


<body onload="showAlert()">
 <script src="sweetalert2.min.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
</body>
<script>
function showAlert() {
  Swal.fire({
    position: 'top-middle',
    icon: 'success',
    title: 'Login success',
    showConfirmButton: false,
    timer: 1500
  }).then(function() {
    window.location.href = "index.php";
  });
}
</script>

            <?php
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


