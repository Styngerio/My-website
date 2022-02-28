<?php 
    require_once('partials/body1.php');
?>

<title>Welcome to Stynger</title>
<div class="bg-secondary">
    <div class="container">
        <h1 class="text-warning d-flex justify-content-center">Welcome to Stynger</h1><span class="text-white d-flex justify-content-center">This website was deveolpment whith Boostrap</span>
        <div class='container'>
            <h1>The new's </h1>
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
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="account.php" class="btn btn-primary">Register</a>
                      </div>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
</div>