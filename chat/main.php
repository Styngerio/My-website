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
    <h1>Chat beta</h1>
    <div class="container p-4">
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
                <tbody id="list"></tbody>
                </table>
            </div>
            <div class="col">
                <h1>Chat</h1>
                <div class="mb-3">
                    <div class="row container">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body" id="chat">
                            
                            <h6 class="card-subtitle mb-2 text-muted">On line</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <form action="send.php" method="post">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message" placeholder='type your message' ></textarea>
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
<?php 
if (isset($_POST['submit'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
}
?>
           

