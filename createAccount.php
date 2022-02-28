<?php
require_once("partials/body.php");
?>
<title>Register</title>
<div class='container'><br><br>
    <div class="row">
        <div class=" d-flex justify-content-center">
            <div class="card bg-dark" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title text-danger">Register</h5>
                <form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Name" aria-label="Recipient's username" aria-describedby="basic-addon2" name='name' required>
                    </div>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Last Name" aria-label="Recipient's username" aria-describedby="basic-addon2"name='lastname' required >
                    </div>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Username is optional" aria-label="Recipient's username" aria-describedby="basic-addon2"name='username'>
                    </div>
                    <div class="input-group mb-3">
                      <input type="mail" class="form-control" placeholder="E-mail" aria-label="Recipient's username" aria-describedby="basic-addon2" name='email' required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <select class="form-select" aria-label="Default select example"name='codephone'>
                                <option value='+593'>+593</option>
                              </select>
                        </span>
                        <input type="number" class="form-control" placeholder="Phone" aria-label="Recipient's username" aria-describedby="basic-addon2" name='phone' required>
                    </div>
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" placeholder="Password" aria-label="Recipient's username" aria-describedby="basic-addon2" name='password' required>
                    </div>
                     <div class="">
                         <input type='submit' class="btn btn-warning" value='Register'>
                        
                     </div>
                     <div class="input-group mb-3">
                         <span><a class="nav-link active text-danger" aria-current="page" href='account.php'>Login</a></span>
                     </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once("partials/conect.php");
if((isset($_POST['name']))&&($_POST['name']!= null)&&(isset($_POST['password']))&&($_POST['password']!= null)){
    $name=$_POST['name'];
    $lname=$_POST['lastname'];
    $email=$_POST['email'];
    $user=$_POST['username'];
    $telf=$_POST['phone'];
    $cod=$_POST['codephone'];
    $password=$_POST['password'];
    
    
    $pass=password_hash($password, PASSWORD_DEFAULT);
    $phone=$cod.$telf;
    date_default_timezone_set('America/Lima');
    $date = date("Y-m-d H:i:s");
    
    $validate=mysqli_query($conn,"SELECT * FROM user WHERE email='$email' or username='$user'");
    $num=mysqli_num_rows($validate);
    
    if ($num == 0){
        $sql=mysqli_query($conn,"INSERT INTO user (name, lastname, email, username, phone, password, create_at) VALUES ('$name','$lname','$email','$user','$phone','$pass','$date')");
        if ($sql){
            $sesion=mysqli_query($conn,"SELECT id_user FROM user WHERE email='$email'");
            $row=mysqli_fetch_array($sesion);
            $id=$row['id_user'];
            $metadata=mysqli_query($conn,"INSERT INTO sesion (status, date, id_user) VALUES ('Create Account','$date', '$id')");
        }
    }else{
        echo"<script>alert('Username or E-mail is already')</script>";
    }
    
   
}
?>
    