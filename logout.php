<?php
ob_start();
session_start();
session_destroy();

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
    title: 'Logout success',
    showConfirmButton: false,
    timer: 1500
  }).then(function() {
    // เมื่อกด OK หรือ หมดเวลา
    window.location.href = "index.php";
  });
}
</script>