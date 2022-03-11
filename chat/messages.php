<?php
session_start();
if (isset($_SESSION['id_user'])){
    $x=$_SESSION['id_user'];
    $from=$x;
    $to= $_POST['id'];
    require_once('../partials/conect.php');
    $sql = mysqli_query($conn,"SELECT m.text FROM user as u, chat as c, message as m WHERE (c.from=u.id_user AND c.id_message= m.id) AND  ((c.from='$from' AND c.to='$to')OR(c.from='$to' AND c.to='$from'))");
    if (!$sql){
        die('Query failed'.mysqly_error($conn));
    }
    $json = array();
    while($row=mysqli_fetch_array($sql)){
        $json[]= array(
            'message' => $row['text'],
            
        );
    }
    $jsonstring= json_encode($json);
    echo $jsonstring;
}else{
    echo "<script> window.location='../account.php'</script>";
}

?>