<?php
    session_start();
    require_once 'connection/server.php';
?>


<script>
var oldMessages = "";

function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var newMessages = this.responseText;
      if (newMessages !== oldMessages) {
        document.getElementById("showweb").innerHTML = newMessages;
        oldMessages = newMessages;
        window.scrollTo(0,document.body.scrollHeight);
      }
    }
  };
  xhttp.open("GET", "message_chat.php", true);
  xhttp.send();
  setTimeout(loadXMLDoc, 100);
}

loadXMLDoc();
</script>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>Document</title>
</head>

<body>
        <div id="showweb"></div>

</body>
</html>
