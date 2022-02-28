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
    
}else{
    echo "<script> window.location='account.php'</script>";
}
?>
<title>Home</title>
<h1>Hola <?php echo $name." ".$lname?></h1><span>Aun no se que pondre en esta seccion pero pronto lo sabreis</span>
<div class='container'>
    <h1>Courses Available </h1>
    <div class="row">
    <?php
    require_once('partials/conect.php');
    $sql=mysqli_query($conn,"SELECT * FROM course");
    while($rows=mysqli_fetch_array($sql)){
    ?>
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
              <img src="https://i.blogs.es/1d8a5b/python1/450_1000.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $rows['name_course']?></h5>
                <span><?php echo $rows['category']?></span>
                <p><b>Price:</b> $ <?php echo $rows['price']?>x day</p>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <form action='partials/suscribe.php' method='post'>
                    <input type='text' value="<?php echo $rows['id_course']?>" name='course' hidden>
                    <input type='text' value="<?php echo $id?>" name='user'hidden>
                    <input type="submit" class="btn btn-primary" value="Register">
                </form>
                
              </div>
            </div>
        </div>
    <?php
    }
    ?>
    <?php
        $sql=mysqli_query($conn,"SELECT u.name, u.lastname, c.name_course, c.details, c.link_course FROM user as u, suscription as s, course as c WHERE (u.id_user=s.id_user AND s.id_course=c.id_course) AND s.id_user='$id'");
        $i=1;
        while($rows=mysqli_fetch_array($sql)){
        ?>
        <table class="table table-striped table-hover table-ligth">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Course</th>
                    <th scope="col">Credentiales</th>
                    <th scope="col">Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $i?></th>
                    <td><?php echo $rows['name']?></td>
                    <td><?php echo $rows['lastname']?></td>
                    <td><?php echo $rows['name_course']?></td>
                    <td><?php echo $rows['details']?></td>
                    <td><a class="btn btn-outline-warning" href="<?php echo $rows['link_course']?>" target="_blank" >Link</a></td>
                </tr>
            </tbody>
        </table>
         <?php
                $i+=1;
        }
        ?>
    </div>
</div>