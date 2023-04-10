<?php 
session_start();

include "connection/server.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/swipe.css" />

    <script src="https://hammerjs.github.io/dist/hammer.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>  
    
    <style>
.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:20px;width:20px;padding:0}
</style>
    <?php include  'include/navbar.php'?>                   
    <title>Document</title>

</head>
<body>
<div class="tinder">
  <div class="tinder--status">
    <i class="fa fa-remove"></i>
    <i class="fa fa-heart"></i>
  </div>

  <div class="tinder--cards">
        <?php
        $u_id_s = $_SESSION['admin_login'];
        $qury= "SELECT *FROM users WHere u_id  != '$u_id_s' order by rand() ";
        $sql_qury = mysqli_query($conn,$qury);
        while($row2 = mysqli_fetch_array($sql_qury)){
            $u_id = $row2['u_id'];

            $sql = "SELECT * FROM swipe WHere u_swipe = '$u_id_s' AND o_swipe = '$u_id' ";
            $result = mysqli_query($conn,$sql);
        
            if(mysqli_num_rows($result)==0)
            {
        ?>
  <div class="tinder--card" data-card-index="<?php echo $row2['u_id']; ?>">
  <center> 
  <div class="w3-content w3-display-container">
  <?php
  $i = 1;
  while($i <= 6) {
?>
  <img class="mySlides" src="upload_gallery/<?php echo $row2['username']."_".$i; ?>.jpg" style="width:50%;height:450px;">
  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
    <?php
      for($j = 1; $j <= 6; $j++) {


						$file = 'upload_gallery/'.$row2['username'].'_'.$j.'.jpg';

						if (file_exists($file)) {
    ?>
      <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(<?php echo $j ;?>)"></span>
    <?php 

						} 
            
            
            } ?>
  </div>
  <?php $i++; } ?>

</div>

</center>

  <h3></h3>
  <h4><?php echo $row2['fullname']; ?></h4>
  <p> <?php echo  $row2['bio'] ?> </p>
</div>
<?php

$i++;
}


}?>








  </div>

  <div class="tinder--buttons">
    <button id="nope"><i class="fa fa-remove"></i></button>
    <button id="love"><i class="fa fa-heart"></i></button>
  </div>
</div>


</body>
</html>
<script>
'use strict';

var tinderContainer = document.querySelector('.tinder');
var allCards = document.querySelectorAll('.tinder--card');
var nope = document.getElementById('nope');
var love = document.getElementById('love');


var currentCardIndex = parseInt(allCards[0].getAttribute('data-card-index'));

function initCards(card, index) {
  var newCards = document.querySelectorAll('.tinder--card:not(.removed)');

  newCards.forEach(function (card, index) {
    card.style.zIndex = allCards.length - index;
    card.style.transform = 'scale(' + (20 - index) / 20 + ') translateY(-' + 0 * index + 'px)';
    card.style.opacity = (10 - index) / 10;
  });
  
  tinderContainer.classList.add('loaded');
}

initCards();

allCards.forEach(function (el) {
  var hammertime = new Hammer(el);

  hammertime.on('pan', function (event) {
    el.classList.add('moving');
    
  });

  hammertime.on('pan', function (event) {
    if (event.deltaX === 0) return;
    if (event.center.x === 0 && event.center.y === 0) return;

    tinderContainer.classList.toggle('tinder_love', event.deltaX > 0);
    tinderContainer.classList.toggle('tinder_nope', event.deltaX < 0);

    var xMulti = event.deltaX * 0.03;
    var yMulti = event.deltaY / 80;
    var rotate = xMulti * yMulti;

    event.target.style.transform = 'translate(' + event.deltaX + 'px, ' + event.deltaY + 'px) rotate(' + rotate + 'deg)';
  });

  hammertime.on('panend', function (event) {

    el.classList.remove('moving');
    tinderContainer.classList.remove('tinder_love');
    tinderContainer.classList.remove('tinder_nope');

    var moveOutWidth = document.body.clientWidth;
    var keep = Math.abs(event.deltaX) < 80 || Math.abs(event.velocityX) < 0.5;

    event.target.classList.toggle('removed', !keep);
    if (keep) {
      event.target.style.transform = '';
    } else {
      var endX = Math.max(Math.abs(event.velocityX) * moveOutWidth, moveOutWidth);
      var toX = event.deltaX > 0 ? endX : -endX;
      var endY = Math.abs(event.velocityY) * moveOutWidth;
      var toY = event.deltaY > 0 ? endY : -endY;
      var xMulti = event.deltaX * 0.03;
      var yMulti = event.deltaY / 80;
      var rotate = xMulti * yMulti;
      event.target.style.transform = 'translate(' + toX + 'px, ' + (toY + event.deltaY) + 'px) rotate(' + rotate + 'deg)';
      const xhr = new XMLHttpRequest();
        const url = "insert_swipe.php";

        const o_id = event.target.getAttribute('data-card-index');
        var status_swipe;


        if(event.additionalEvent=='panright')
        {
            status_swipe = "like";
        }
        else if(event.additionalEvent=='panleft'){

             status_swipe = "unlike";
        }
        const data = new FormData();
        data.append("o_id", o_id);
        data.append("status_swipe", status_swipe);

        xhr.open("POST", url);
        xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
                if(xhr.responseText=='"math"')
           {

            Swal.fire({
            imageUrl: 'img/match.jpg',
            imageHeight: 400,
            imageAlt: 'A tall image'
            })
           }
                
        }
        };
        xhr.send(data);
        

      initCards();
    }
  });
});

function createButtonListener(love) {
  return function (event) {
    var cards = document.querySelectorAll('.tinder--card:not(.removed)');
    var moveOutWidth = document.body.clientWidth * 1.5;

    
    if (!cards.length) return false;

    var card = cards[0];
    var status_swipe;

    card.classList.add('removed');

    if (love) {
      card.style.transform = 'translate(' + moveOutWidth + 'px, -100px) rotate(-30deg)';
      status_swipe = "like";

    } else {
      card.style.transform = 'translate(-' + moveOutWidth + 'px, -100px) rotate(30deg)';
      status_swipe = "unlike";
    }

    
    const xhr = new XMLHttpRequest();
        const url = "insert_swipe.php";

        const o_id =   card.dataset.cardIndex;


        const data = new FormData();
        data.append("o_id", o_id);
        data.append("status_swipe", status_swipe);
        

        xhr.open("POST", url);
        xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
           if(xhr.responseText=='"math"')
           {

            Swal.fire({
            imageUrl: 'img/match.jpg',
            imageHeight: 400,
            imageAlt: 'A tall image'
            })
           }
 
            
        }
        };
        xhr.send(data);
        
    initCards();

    event.preventDefault();
  };
}

var nopeListener = createButtonListener(false);
var loveListener = createButtonListener(true);

nope.addEventListener('click', nopeListener);
love.addEventListener('click', loveListener);

</script>


<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>
