<?php     
        session_start();
        require_once 'connection/server.php';

       if(isset($_POST['edit_profile']))
       {

        $u_id = $_SESSION['admin_login'];
        $username =  $_SESSION['username'];

        $name =  $_POST['name'];
        $age =  $_POST['age'];
        $sex =  $_POST['gender'];
        $bio =  $_POST['bio'];
        


        $qury_profile = "UPDATE users Set fullname = '$name', age = '$age', sex = '$sex',bio = '$bio' Where u_id = '$u_id' ";
        $sql_profile = mysqli_query($conn,$qury_profile);


              $_SESSION['fullname']= $name;
             $_SESSION['age']= $age;
             $_SESSION['sex']= $sex;
             $_SESSION['bio']= $bio;

        $gallery_error = 0;
        $i = 1;
        while($i<=6)
        {
            $namefile_i = "profile-pic-".$i;

            
            $name_file =  $username."_".$i.".jpg";
    
            $tmp_name =  $_FILES[$namefile_i]['tmp_name'];
            $path =  "upload_gallery/";
            
            move_uploaded_file($tmp_name,$path.$name_file);

           
            if($_FILES[$namefile_i]['error']!=4)
            {

                
                $sql_name_gallery = " SELECT * FROM gallery_profile Where name_gallery = '$name_file' ";
                $result_name_gallery = mysqli_query($conn,$sql_name_gallery);
    
                $row_name_gallery = mysqli_fetch_array($result_name_gallery);
                if($row_name_gallery['name_gallery'] !== $name_file)
                {   

                    $sql_gallery = "INSERT INTO gallery_profile(username,name_gallery)value('sarawut','$name_file')";
                    mysqli_query($conn,$sql_gallery);
                
                }
            }

          
   
            $i++;
    
        }


        }
 ?>
 <body onload="showAlert()">
 <script src="sweetalert2.min.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
  <!-- เนื้อหาของหน้าเว็บ -->
</body>
<script>
function showAlert() {
  Swal.fire({
    position: 'top-middle',
    icon: 'success',
    title: 'Update success',
    showConfirmButton: false,
    timer: 1500
  }).then(function() {
    // เมื่อกด OK หรือ หมดเวลา
    window.location.href = "edit_profile.php";
  });
}
</script>