<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

// Log in  the database.
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'olivier', 'toor', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{

    die('Erreur : '.$e->getMessage());

}
// Read the Nickname column to compare with an existing one. 
$comparaison = $bdd->query('SELECT nickname FROM authentification');
while($list = $comparaison->fetch())
{
    $listarray[] = $list['nickname'];
}
if(in_array($_POST['nickname'], $listarray))
    {
        $_SESSION['errorMessage'] =  "Nickname already used";
        header('location:register_index.php');
        exit();
    }
$comparaison->closeCursor();

//Verify if the email address is compliant
if(!preg_match('"#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,4}$#', $_POST['email']))
{
    $_SESSION['errorMessage'] = "Wrong e-mail format";
    header('location:register_index.php');
    exit();
}
// Compare both passwords to prevent typo
if($_POST['password_first'] != $_POST['password_confirm'])
{
    
    $_SESSION['errorMessage'] = "Wrong password confirmation";
    header('location:register_index.php' );
    exit();
}
    else
{
    // Verify if the password is compliant
    if(!preg_match('^[a-zA-Z0-9!?.]{8}$', $_POST['password_first']))
        {
            $_SESSION['errorMessage'] = "Non-compliant password";
            header('location:register_index.php');
            exit();
        }
    //Hash the password then insert the new user.
    $pass_hache = password_hash($_POST['password_first'], PASSWORD_DEFAULT);
    $req = $bdd->prepare('INSERT INTO authentification(nickname, password_auth, email, inscription, id_groupe) VALUES(:nickname, :password_auth, :email, Now(), :id_groupe)');
    $req->execute(array(
        
        'nickname' => $_POST['nickname'],
        
        'password_auth' => $pass_hache,
        
        'email' => $_POST['email'],
         
        'id_groupe' => 1,

));
$_SESSION['notification_message']="Account registered.";
$req->closeCursor();
header('location:index.html');
exit();
}
?>
