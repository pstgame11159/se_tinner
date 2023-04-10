<?php
    session_start();
    require_once 'connection/server.php';
    $_SESSION['reciever_userid'] = $_POST['userId']; 
    $sender_userid = $_POST['userId'];
    $reciever_userid = $_SESSION['admin_login']; 
    $qury_sql = "UPDATE chat_tinner Set 	status = '1' WHERE 	status=0 AND sender_userid =  '$sender_userid' AND reciever_userid = ' $reciever_userid'; ";
    $sql_start = mysqli_query($conn,$qury_sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
    
    <title>Document</title>
    <style>
    .chatContainer {
  display: flex;
  align-items: center;
  justify-content: center;
}

.chatMessage {
  width: calc(100% - 60px);
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}

.chatButton {
  width: 50px;
  height: 50px;
  margin: 8px;
  border: none;
  border-radius: 50%;
  background-color: #4CAF50;
  color: white;
  font-size: 24px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.chatButton:hover {
  background-color: #3e8e41;
}



  </style>  
</head>
<a href="chat2.php" class="link-primary">ย้อนกลับ</a>
<body>

        <iframe src="chat_realtime.php" title="description" width="100%" scrolling="" height="800px" scrolling="no" frameborder="0" ></iframe>

        <br>
        <br>
        <div class="chatContainer">
        <input type="text" class="chatMessage" id="chatMessage" placeholder="Write your message..." />
        <button class="submit chatButton" id="chatButton"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>






</body>
</html>




<script>

document.addEventListener("DOMContentLoaded", function() {

  document.getElementById("chatButton").addEventListener("click", function() {
    var message = document.getElementById("chatMessage").value;
    if(message!==""){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
      }
    };
    xhttp.open("POST", "chat_insert.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("message=" + message);

    document.getElementById("chatMessage").value = "";

  }
  });
});

</script>

