<?php
ob_start();
session_start();
session_destroy();
echo "<script>
$(document).ready(function() {
    Swal.fire({
        title: 'Logout',
        text: 'ออกจากระบบสำเร็จ !',
        icon: 'success',
        timer: 3000,
        showConfirmButton: false
    });
})
</script>";
header("refresh:2; url=index.php");

?>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>