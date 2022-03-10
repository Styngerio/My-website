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
                
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;  
    }
    

?>