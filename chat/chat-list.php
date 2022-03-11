<?php

session_start();
if (isset($_SESSION['id_user'])){
    $x=$_SESSION['id_user'];
    $id=$x;
    require_once('../partials/conect.php');
    $sql = mysqli_query($conn, "SELECT * FROM user WHERE id_user !='$id' ");
    if (!$sql){
        die('Query failed'.mysqli_error($conn));
    }
    $json = array();
    while($row = mysqli_fetch_array($sql)){
        $json[] = array(
            'name' => $row['name'],
            'lastname'=> $row['lastname'],
            'id' => $row['id_user'],
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
    
}else{
    echo "<script> window.location='account.php'</script>";
}





















    

?>