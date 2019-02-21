<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inscription CT</title>
</head>
<body>
    
    <?php
    if(!isset($_SESSION['error_message']))
    {
        echo $_SESSION['errorMessage']; 
    }
    ?>
   </br>
    <form action="register.php" method="post">
            Nickname<br>
            <input type="text" name="nickname" required><br>
            Password<br>
            <input type="password" name="password_first" required><br>
            Retype your Password<br>
            <input type="password" name="password_confirm" required>    Alpha-numeric + (! ? .) - 8 characters <br>
            E-mail address<br>
            <input type="text" name="email" required><br>
            <input type="submit"><br>
    </form>
</body>
</html>