<?php
session_start();
if (isset($_SESSION['id_user'])){
    session_destroy();
    echo "<script> window.location='account.php'</script>";
}else{
    echo "<script>window.location='account.php'</script>";
}
?>