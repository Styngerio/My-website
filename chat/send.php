<?php
session_start();
if (  isset($_SESSION['id_user']) &&  !empty($_POST['message'])         ){
    $message= $_POST['message'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    echo $message.' '.$from.' '.$to;
    require_once('../partials/conect.php');
    date_default_timezone_set('America/Lima');
    $date = date("Y-m-d H:i:s");
    $sql = mysqli_query($conn,"INSERT INTO chat (de, message, para, create_at) VALUES ('$from','$message','$to','$date')");
    if (!$sql){
        die('Query failed'.mysqly_error($conn));
    }
    
    
    
}else{
    echo "<script> window.location='../account.php'</script>";
}

?>