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
            <title>Courses</title>
            <div class='container'>
                
                <table class="table table-striped table-hover table-ligth">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Course</th>
                        </tr>
                    </thead>
                <?php
                $sql=mysqli_query($conn,"SELECT u.name, u.lastname, c.name_course FROM user as u, suscription as s, course as c WHERE u.id_user=s.id_user AND s.id_course=c.id_course ");
                $i=1;
                while($rows=mysqli_fetch_array($sql)){
                ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $i?></th>
                            <td><?php echo $rows['name']?></td>
                            <td><?php echo $rows['lastname']?></td>
                            <td><?php echo $rows['name_course']?></td>
                        </tr>
                    </tbody>
                <?php
                        $i+=1;
                }
                ?>
                </table>
            </div>
<?php 
        }else{
             echo "<script>window.location='home.php'</script>";
        }
}else{
    echo "<script> window.location='account.php'</script>";
}
?>

