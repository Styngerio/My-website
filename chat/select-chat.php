<?php
    if (isset($_POST['id'])){
        require_once('../partials/conect.php');
        $id=$_POST['id'];
        $sql = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");
        if (!$sql){
            die('Query failed'.mysqli_error($conn));
        }
        $json = array();
        while($row = mysqli_fetch_array($sql)){
            $json[] = array(
                'name' => $row['name'],
                'lastname'=> $row['lastname'],
                'id'=> $row['id_user'],
                
            );
        }
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;  
    }
    

?>