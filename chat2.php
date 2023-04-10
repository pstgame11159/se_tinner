<?php 

    session_start();
    require_once 'connection/server.php';
    if (isset($_GET['delete'])) {

      $delete_id = $_GET['delete'];
      $uiddd = $_SESSION['admin_login']; 
  
      $delete_url = "DELETE FROM match_tinner WHERE u_id   =  '$delete_id' And o_id   =  '$uiddd' ;";
      $start_sql = mysqli_query($conn,$delete_url);

      $delete_url = "DELETE FROM match_tinner WHERE u_id   =  '$uiddd' And o_id   =  '$delete_id' ;";
      $start_sql = mysqli_query($conn,$delete_url);
      
      
    }


?> 

<!DOCTYPE html>
<html>

<head>
  <title>Chat</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="plugins/jquery/jquery.min.js"></script>

  <style>
    .col-md-6 {
      margin-left: 20%;
    }
    .button-width100 {
  width: 100%;
  background-color: white;
  border: none;

}
.lefttext{
  float:right;
}
  </style> 
</head>


<body>
<div class="card rare-wind-gradient ">
  <div class="card-body">

    <!-- Grid row -->
    <div class="row px-lg-2 px-2">

      <!-- Grid column -->
      <div class="col-md-6 col-xl-4 px-6">

      <?php include  'include/navbar.php'?>

      <form class="login100-form validate-form p-b-33 p-t-5" action="message.php" method="post" >
        <div class="white z-depth-1 px-2 pt-3 pb-0 members-panel-1 ">
            <?php
                        $u_id = $_SESSION['admin_login'];
                         $qury= "SELECT *FROM match_tinner WHere 	u_id = '$u_id' OR o_id = '$u_id'";
                         $sql_qury = mysqli_query($conn,$qury);
                            while($row2 = mysqli_fetch_array($sql_qury)){

                              if($row2['u_id']==$u_id)
                              {
                                $u_id_s = $row2['o_id'];
                              }
                              else if($row2['o_id']==$u_id)
                              {
                                $u_id_s = $row2['u_id'];
                              }

                              $qury_users= "SELECT *FROM users WHere 	u_id = '$u_id_s' ";
                              $sql_qury_users = mysqli_query($conn,$qury_users);
                              $row_users = mysqli_fetch_array($sql_qury_users);


                             $qury_chater= "SELECT COUNT(chatid) AS count FROM chat_tinner WHERE 	status=0 AND sender_userid =  '$u_id_s' AND reciever_userid = ' $u_id';";
                              $sql_quryer = mysqli_query($conn,$qury_chater);
                              $row = mysqli_fetch_array($sql_quryer);
                              $count = $row['count'];
      


                              ?>
          <ul class="list-unstyled friend-list">
          <button type="submit"  name="userId" class="login100-form-btn button-width100" value="<?php echo $row_users['u_id'] ?>">
            <li class="active grey lighten-3 p-2">
              <a href="#" class="d-flex justify-content-between">
                <img  src="upload_gallery/<?php echo $row_users['username']."_1.jpg"; ?>"  width="100" height="100" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                <p class="text-smaller text-muted mb-2"><?php echo $row_users['fullname']; ?></p>
                <div class="text-small">
                <p class="text-smaller text-muted mb-0">Just now</p>
                <?php if($count==0)
                {

                }else{
                  
                  ?>
                <span class="badge badge-danger float-right"><?php echo $count; }?></span>

                </div>
                <div class="chat-footer">

                <a href="?delete=<?php echo $row_users['u_id'] ?>" data-id="<?php echo $row_users['u_id'] ?>" class="btn btn-danger btn-sm delitem1-btn mt-1 lefttext" id="delitem1-btn" >Unmatch</a>
                     
                </div>
              </a>
            </li>
        </button>
        <?php }?>
        </form>
          </ul>
        </div>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
</div>

<script>
        $(".delitem1-btn").click(function(e) {
            var ID = $(this).data('id');
            e.preventDefault();
            deletefileConfirm(ID);
            console.log(ID)
        })
        
        function deletefileConfirm(ID) {
            Swal.fire({
                title: 'Do you want to Unmatch ? ',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm',
                cancelButtonText: 'Cancle !',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                                url: 'chat2.php',
                                type: 'GET',
                                data: 'delete=' + ID,
                            })
                            .done(function() {
                                Swal.fire({
                                    title: 'สำเร็จ',
                                    text: 'Unmatchเรียบร้อย!',
                                    icon: 'success',
                                }).then(() => {
                                    window.location.reload();
                                })
                            })
                            .fail(function() {
                                Swal.fire('มีบางอย่างผิดพลาด!', 'error')
                                window.location.reload();
                            });
                    });
                },
            });
        }
    </script> 

</body>

</html>

