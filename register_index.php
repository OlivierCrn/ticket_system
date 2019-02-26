<?php

session_start(); 
$_SESSION['errorMessage']= NULL; 

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inscription CT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light "  style="background-color: #c3cfe5;" >
<a class="navbar-brand mx-auto" href="#">CRNO - Ticket system</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
      <li class="nav-item">
        <a class="nav-link" href="login_index.php">Login</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Register</a>
      </li>
    </ul>
  </div>
</nav>
<div class="center">
    <div class="jumbotron">
        <?php
        if(isset($_SESSION['errorMessage']))
        {?>
            <div class="alert alert-danger" role="alert"> <?php echo $_SESSION['errorMessage']; ?> </div>  

    <?php  } ?> 
    
    </br>


        <form action="register.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="nickname" placeholder="Nickname" required><br>
                <small id="passwordHelpBlock" class="form-text text-muted"> 
                    Your password must contain 8 caracteres, you can only use alpha numeric and "?.!". 
                </small>
                <input type="password" class="form-control" name="password_first" placeholder="Password" required><br>            
                <input type="password" class="form-control" name="password_confirm" placeholder="Retype password" required><br>
                <input type="text" class="form-control" name="email" placeholder="example@mail.com" required><br>
                <input type="submit"class="btn btn-primary" value="Register"><br>
            </div>
        </form>
    </div>
</div >
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
