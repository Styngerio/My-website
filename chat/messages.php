<?php
session_start();
if (isset($_SESSION['id_user'])){
    $x=$_SESSION['id_user'];
    $from=$x;
    $to= $_POST['id'];
    require_once('../partials/conect.php');
    $sql = mysqli_query($conn,"SELECT * FROM chat  WHERE (de='$from' AND para='$to')OR(de='$to' AND para='$from')");
    if (!$sql){
        die('Query failed'.mysqly_error($conn));
    }
    $json = array();
    while($row=mysqli_fetch_array($sql)){
        $json[]= array(
            'message' => $row['message'],
            'to' =>  $row['para'],
            'from' => $from,
            //
        );
    }
    $jsonstring= json_encode($json);
    echo $jsonstring;
}else{
    echo "<script> window.location='../account.php'</script>";
}

?>