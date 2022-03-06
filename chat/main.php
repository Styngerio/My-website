<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row align-items-start">
            <div class="col col-md-5">
                <h1>List</h1>
                <form class="row g-3">
                    <div class="col-auto">
                        <label for="inputPassword2" class="visually-hidden">Search</label>
                        <input type="password" class="form-control" id="inputPassword2" placeholder="Search">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                </form>
                
                <table class="table">
                <tbody>
                    
                    <?php
                        require_once('../partials/conect.php');
                        $sql=mysqli_query($conn,"SELECT * FROM user");
                        while ($row=mysqli_fetch_array($sql)){

                    ?>
                    <tr>
                        <td><a href="<?php echo $row['id_user']?>"><?php echo $row['name']?></a></td>
                    </tr>
                    <?php
                    }
                    ?>
                    
                </tbody>
                </table>
            </div>
            <div class="col">
                <h1>Chat</h1>
                <div class="mb-3">
                    <div class="row">
                        <form action="" method="post">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <input type="submit" value='send' class='btn btn-primary mb-3'>
                        </form>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
           

