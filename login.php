<?php
session_start(); 

$_SESSION['loginErrorMessage'] = NULL;

// Log in  the database.
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=auth;charset=utf8', 'root', '', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{

    die('Erreur : '.$e->getMessage());

}
// Verify if the password is compliant
if(!preg_match("#^[a-zA-Z0-9!?.]{8,}$#", $_POST['password_first']))
{
    $_SESSION['loginErrorMessage'] = "Wrong Nickname or Password, please try again.";
    header('location:login_index.php');
    exit();
}
//Hash the password then insert the new user.
$pass_hache = $_POST['password_first'];
// Check the nickname to avoid symbol.  
if(!preg_match("#^[a-zA-Z0-9]{3,}$#", $_POST['nickname']) === 0 )
    {
        
        $_SESSION['loginErrorMessage'] = "Wrong Nickname or Password, please try again.";
        header('location:login_index.php');
        exit();
    }
// Read the Nickname column to compare with an existing one. 
$comparaison = $bdd->query('SELECT nickname FROM authentification');
while($list = $comparaison->fetch())
{
    $listarray[] = $list['nickname'];
}
if(in_array($_POST['nickname'], $listarray))
    {
        $goodNickname = $_POST['nickname'];
    }
$comparaison->closeCursor();
//Prepare the request, to select only one line correspond to the nickname
$req = $bdd->prepare('SELECT * FROM authentification WHERE nickname = ?');
$req->execute(array($goodNickname));
$list = $req->fetch();

//Verify the password according to the nickname and hash
if(password_verify($pass_hache, $list['password_auth']))
    {
        $_SESSION['id_user'] = $list['id'];
        $_SESSION['id_groupe'] = $list['id_groupe'];
        $_SESSION['nickname'] = $list['nickname'];
        $req->closeCursor();
        header('location:accueil.php');

    }
else
    {
        $req->closeCursor();
        $_SESSION['loginErrorMessage'] = "Wrong Nickname or Password, please try again.";
        header('location:login_index.php');
        exit();
    }

?>