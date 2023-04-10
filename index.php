<?php
    if(!isset($_SESSION)) {
        ob_start();
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	   <link rel="stylesheet" href="css/Home.css">

    <title>Document</title>
</head>
<?php include  'include/navbar.php'?>
<img src="images/homeimg.png"  alt="Nature" class="responsive" width="600" height="400" >
	   <div class="text-overlay col-lg-8">
    		<h1 id="text">Tinner</h1>
    		<p class="responsive-text">
				Tinner เป็นเดทติ้งออนไลน์ที่นำไปสู่การพบปะคนใหม่ๆ<br>ที่อาจมีความสนใจใกล้เคียงกันผู้ใช้ Tinner  
				สามารถ<br>สร้างโปรไฟล์ส่วนตัวของตัวเองและดูโปรไฟล์ของผู้ใช้คนอื่นๆ<br>ซึ่งสามารถให้ข้อมูลทั่วไปและ
				รูปภาพเพื่อให้ผู้ใช้เลือกกันว่าจะถือ<br>ว่าน่าสนใจหรือไม่ถ้าคุณชอบโปรไฟล์ของคนๆใด<br>  
				คุณสามารถส่งข้อความหากันเพื่อเริ่มการสนทนาและถ้าคุณและคนๆ<br>นั้นคุยกันอยู่กันดีๆ 
				คุณอาจจะตัดสินใจเพื่อพบปะกันนอกจาก <br>เว็บ แอปพลิเคชันด้วยกัน
		   </p>
		   </div>
	  


  

	  
	  

 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.4.1.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script>
  <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>