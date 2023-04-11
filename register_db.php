<?php     session_start();
        require_once 'connection/server.php';

       if(isset($_POST['register_db']))
       {
            $regiter_error = 0;
            $name = $_POST['name'];
            $sex = $_POST['inlineRadioOptions'];
            $age = $_POST['age'];
            $address = $_POST['address'];
            $phone_number = $_POST['phone_number'];
            $email = $_POST['email'];
            $username = $_POST['username'];

            $password_1 = $_POST['password_1'];
            
            $cus_level = 'user' ;
            if(empty($username))
            {
                $_SESSION['error_rg'] = "Username is required ";
                $regiter_error = $regiter_error+1;
            }
            if(empty($email))
            {
                $_SESSION['error_rg'] = "Email is required";
                $regiter_error = $regiter_error+1;
            }
            if(empty($password_1))
            {
                $_SESSION['error_rg'] = "Password is required";
                $regiter_error = $regiter_error+1;
            }

            $sql_register_check = " SELECT * FROM users Where username = '$username' OR email = '$email' ";
            $result_register = mysqli_query($conn,$sql_register_check);

            $row_regiter = mysqli_fetch_array($result_register);
            if($row_regiter)
            {
            if($username === $row_regiter['fullname'])
            {
                $_SESSION['error_rg'] = "Username error";
                $regiter_error = $regiter_error+1;
            }
            if($email === $row_regiter['email'])
            {
                $_SESSION['error_rg'] =  "duplicate email";
                $regiter_error = $regiter_error+1;
            }
            }
            
            if($regiter_error == 0)
            {   
                $password = $password_1;

                $name_file =  $username."_"."1.jpg";
    
                $tmp_name =  $_FILES['upload-img']['tmp_name'];
                $path =  "upload_gallery/";
                
                move_uploaded_file($tmp_name,$path.$name_file);
                
                $sql_register = "INSERT INTO users (fullname,sex,age,address_s, phone_number, email, username, password_s,bio,urole)value('$name','$sex','$age','$address','$phone_number','$email','$username','$password','-','$cus_level')";

                mysqli_query($conn,$sql_register);


                $sql_gallery = "INSERT INTO gallery_profile(username,name_gallery)value('$username','$name_file')";
                
                mysqli_query($conn,$sql_gallery);
                

             echo "<script>alert('สมัครสมาชิกเสร็จสิ้น');
		        window.location.href='index.php';
	            </script>";
            }
            else{

               
             echo "<script>alert('เกิดข้อผิดพลาด');
             window.location.href='register.php';
             </script>";
            } 




        }
 ?>