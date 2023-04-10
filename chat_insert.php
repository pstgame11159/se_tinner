<?php
    session_start();
    require_once 'connection/server.php';
    $message = $_POST['message'];


    $key = 'tinner'; // กำหนดคีย์สำหรับเข้ารหัส
    $plaintext = $message; // ข้อความที่ต้องการเข้ารหัส
    
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC"); // ความยาวของเวกเตอร์เริ่มต้น
    $iv = openssl_random_pseudo_bytes($ivlen); // สร้างเวกเตอร์เริ่มต้น
    
    $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv); // เข้ารหัสข้อความ
    
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true); // สร้าง HMAC สำหรับตรวจสอบความถูกต้องของข้อความที่ถอดรหัส
    
    $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw); // แปลงข้อมูลเป็น Base64 เพื่อให้สามารถเก็บในฐานข้อมูลได้
    







    $u_id = $_SESSION['admin_login'];
    $reciever_userid = $_SESSION['reciever_userid'];
    $qury_sql = "INSERT INTO  chat_tinner(sender_userid,reciever_userid,message_chat,status)value('$u_id','$reciever_userid','$ciphertext','0')";
    $start_sql = mysqli_query($conn,$qury_sql);


?>
