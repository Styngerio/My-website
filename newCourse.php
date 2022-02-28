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
            <title>Create course</title>
            <div class='container'>
                <h1>Create a new course.</h1>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
            </div>
<?php   }  
}else{
    echo "<script> window.location='account.php'</script>";
}
?>
