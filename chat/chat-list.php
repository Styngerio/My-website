<?php
    require_once('../partials/conect.php');
    $sql = mysqli_query($conn, "SELECT * FROM user");
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

?>