<?php
session_start();
require_once("partials/body1.php");
?>
<title>Login</title>
<div class='container'><br><br>
    <div class="row">
        <div class=" d-flex justify-content-center">
            <div class="card bg-dark" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title text-danger">Login</h5>
                <form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>' class="row g-6 needs-validation" novalidate>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Username or E-mail" aria-label="Recipient's username" aria-describedby="basic-addon2" name='user'>
                    </div>
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" placeholder="Password" aria-label="Recipient's username" aria-describedby="basic-addon2" name='password'>
                    </div>
                     <div class="">
                         <input type='submit' class="btn btn-warning" value='Login'>
                     </div>
                     <div class="input-group mb-3">
                         <span><a class="nav-link active text-danger" aria-current="page" href='createAccount.php'>Create Account</a></span>
                     </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php
require_once('partials/conect.php');

if ((isset($_POST['user']))&&($_POST['user'] != null)){
    $user=$_POST['user'];
    $password=$_POST['password'];
    $sql=mysqli_query($conn,"SELECT * FROM user WHERE username='$user' or email='$user'");
    $rows=mysqli_fetch_array($sql);
    $hash=$rows['password'];
    $rol=$rows['rol'];
    $id=$rows['id_user'];
    
    date_default_timezone_set('America/Lima');
    $date = date("Y-m-d H:i:s");
    
    $result=mysqli_num_rows($sql);
    if ($result ==1 && password_verify($password, $hash)&&$rol=='user'){
        $metadata=mysqli_query($conn,"INSERT INTO sesion (status, date, id_user) VALUES ('Session Started','$date', '$id')");
        $_SESSION['id_user']=$id;
        echo "<script> window.location='home.php?'</script>";
        
    }elseif($result ==1 && password_verify($password, $hash)&&$rol=='admin'){
         $metadata=mysqli_query($conn,"INSERT INTO sesion (status, date, id_user) VALUES ('Session Started','$date', '$id')");
        $_SESSION['id_user']=$id;
        echo "<script> window.location='admin.php'</script>";
    }else{
        echo"<script>alert('User or Password is invalid')</script>";
    }
}
?>