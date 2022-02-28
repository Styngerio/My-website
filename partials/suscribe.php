<?php
    require_once('conect.php');
    require_once('date.php');
    if ((isset($_POST['user']) && isset($_POST['course'])) && (isset($_POST['user']) !=null && isset($_POST['course'])!=null)){
        $user=$_POST['user'];
        $course=$_POST['course'];
        $validate=mysqli_query($conn,"SELECT * FROM suscription WHERE id_user='$user'");
        $rows=mysqli_num_rows($validate);
        if($rows ==0){
            $sql=mysqli_query($conn,"INSERT INTO suscription (id_user,id_course,create_at)VALUES ('$user','$course','$date')");
            echo "<script> window.location='../home.php'</script>";
        }else{
            echo "<script> alert('Suscription is already!'); window.location='../home.php'</script>";
        }
        
    }else{
        echo "<script> window.location='../home.php'</script>";
    }
?>