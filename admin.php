<?php 
session_start();
if (isset($_SESSION['id_user'])){
    $x=$_SESSION['id_user'];
    $id=$x;
    require_once('partials/conect.php');
    $sesion=mysqli_query($conn,"SELECT rol FROM user  WHERE id_user ='$id'");
        $row=mysqli_fetch_array($sesion);
        if($row['rol']=='admin'){
            require_once('partials/admin.php');
            ?>
            <title>Home | Admin</title>
            <div class='container'>
            </div>
<?php   }  
}else{
    echo "<script> window.location='account.php'</script>";
}
?>
