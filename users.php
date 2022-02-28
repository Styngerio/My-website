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
                <title>Users</title>
                    <div class='container'>
                        <table class="table table-striped table-hover table-ligth">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">E-mail</th>
                                </tr>
                            </thead>
                        <?php
                        $sql=mysqli_query($conn,"SELECT * FROM user  WHERE id_user!='$id'");
                        $i=1;
                        while($rows=mysqli_fetch_array($sql)){
                        ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $i?></th>
                                    <td><?php echo $rows['name']?></td>
                                    <td><?php echo $rows['lastname']?></td>
                                    <td><?php echo $rows['username']?></td>
                                    <td><?php echo $rows['phone']?></td>
                                    <td><?php echo $rows['email']?></td>
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
            echo "<script> history.go(-1)</script>";
        }
    }else{
        echo "<script> window.location='../account.php'</script>";
    }
?>
    