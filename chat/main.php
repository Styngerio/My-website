<?php
session_start();
if (isset($_SESSION['id_user'])){
    $x=$_SESSION['id_user'];
    $id=$x;
    require_once('../partials/conect.php');
    $sql=mysqli_query($conn,"SELECT * FROM user WHERE id_user='$id'");
    $rows=mysqli_fetch_array($sql);
    $id=$rows['id_user'];
    $lname=$rows['lastname'];
    
    
}else{
    echo "<script> window.location='../account.php'</script>";
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link href="https://bootswatch.com/5/cyborg/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <h1>Chat beta</h1>
    <div class="container p-4">
        <div class="row align-items-start">
            <div class="col col-md-5">
                <h1>List</h1>
                <form class="row g-3" >
                    <div class="col-auto">
                        <label for="inputPassword2" class="visually-hidden">Search</label>
                        <input type="password" class="form-control" id="inputPassword2" placeholder="Search">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                </form>
            
                <table class="table">
                <tbody id="list"></tbody>
                </table>
            </div>
            <div class="col">
                <h1>Chat</h1>
                <div class="mb-3">  
                    <div class="row container" >
                        <div class="card" style="width: 18rem;">
                            <div class="card-body" >
                                <h5 class="card-title" id="chat"></h5>
                                <h6 class="card-subtitle mb-2 text-muted">On line</h6>
                                <div id="messages"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <form  id="send-message">
                            <input type="hidden" id= "from" value="<?php echo $id;?>" >
                            <input type="hidden" id="to" >
                            <div ></div>
                            <textarea class="form-control" id="message" rows="3"  placeholder='type your message' ></textarea>
                            <input type="submit" value='send' class='btn btn-primary mb-3'>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>

<!-- mini backend --> 

           

