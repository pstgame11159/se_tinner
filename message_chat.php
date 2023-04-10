<?php 

    session_start();
    require_once 'connection/server.php';
	   $u_id = $_SESSION['admin_login'];

?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap - Prebuilt Layout</title>

    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	 <link rel="stylesheet" href="css/Untitled-3.css">
	  
  </head>
  <body>

  <div class="card">
  <?php
                         $qury= "SELECT *FROM chat_tinner";
                         $sql_qury = mysqli_query($conn,$qury);
                            while($row2 = mysqli_fetch_array($sql_qury)){

								$key = 'tinner'; // กำหนดคีย์สำหรับถอดรหัส
								$ciphertext = $row2['message_chat']; // ข้อมูลที่เก็บในฐานข้อมูล
								
								$ciphertext = base64_decode($ciphertext); // แปลงข้อมูลจาก Base64
								$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC"); // ความยาวของเวกเตอร์เริ่มต้น
								$iv = substr($ciphertext, 0, $ivlen); // ดึงเวกเตอร์ออกมาจากข้อมูล
								$hmac = substr($ciphertext, $ivlen, $sha2len=32); // ดึง HMAC ออกมาจากข้อมูล
								$ciphertext_raw = substr($ciphertext, $ivlen+$sha2len); // ดึงข้อความที่ถูกเข้ารหัสออกมาจากข้อมูล
								
								$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv); // ถอดรหัสข้อความ
								$calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true); // สร้าง HMAC สำหรับตรวจสอบความถูกต้องของข้อค
								
								
								if($row2['sender_userid']==$u_id && $row2['reciever_userid']==$_SESSION['reciever_userid']){
                            ?>
					
						<div class="card-box2">
						<img class="user" style="width: 30px; height: 30px" src="images/<?php echo $row2['sender_userid'];?>.jpg">
						<span><?php echo $row2['sender_userid'];?>
						<ul class="chat-messages2">
							<li class="message2"><?php echo $original_plaintext;?></li>
						</ul>
						</span>
						</div>

						<?php
								}else if($row2['sender_userid']==$_SESSION['reciever_userid']  && $row2['reciever_userid']==$u_id){
							?>	

					<div class="card-box1"  >
					<span><?php echo $row2['sender_userid'];?>
						<img class="user" style="width: 30px; height: 30px" src="images/<?php echo $row2['sender_userid'];?>.jpg">
					<ul class="chat-messages">
						<li class="message"><?php echo $original_plaintext  ;?></li>
					</ul>
					</span>
					</div>
		
					<?php
					}
									}
							?>		

      

  </div>

  </body>

	
</html>
