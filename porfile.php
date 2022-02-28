<?php
session_start();
if (isset($_SESSION['id_user'])){
    $x=$_SESSION['id_user'];
    $id=$x;
    require_once('partials/body.php');
    require_once('partials/conect.php');
    $sql=mysqli_query($conn,"SELECT * FROM user WHERE id_user='$id'");
    $rows=mysqli_fetch_array($sql);
    $name=$rows['name'];
    $lname=$rows['lastname'];
    $email=$rows['email'];
    $phone=$rows['phone'];
    $username=$rows['username'];
}else{
    echo "<script> window.location='account.php'</script>";
}
?>
<title>Porfile</title>
<div class="input-group mb-5"></div>
<div class= 'container'>
    <div class="row">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <img src="https://jejuhydrofarms.com/wp-content/uploads/2020/05/blank-profile-picture-973460_1280.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <div class="col-sm-4">
                    
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="<?php echo $name?>" aria-label="Recipient's username" aria-describedby="basic-addon2"  disabled>
                        <span class="input-group-text" id="basic-addon1">Name</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="<?php echo $lname?>" aria-label="Recipient's username" aria-describedby="basic-addon2"  disabled>
                        <span class="input-group-text" id="basic-addon1">Last Name</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="<?php echo $email?>" aria-label="Recipient's username" aria-describedby="basic-addon2"  disabled>
                        <span class="input-group-text" id="basic-addon1">E-mail</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="<?php echo $phone?>" aria-label="Recipient's username" aria-describedby="basic-addon2"  disabled>
                        <span class="input-group-text" id="basic-addon1">Phone</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="<?php echo $username?>" aria-label="Recipient's username" aria-describedby="basic-addon2"  disabled>
                        <span class="input-group-text" id="basic-addon1">Username</span>
                    </div>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
        </div>
    </div>