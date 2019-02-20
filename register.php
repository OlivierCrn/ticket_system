<?php

// Log in the database.
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', '', '', 
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
        echo("Sorry, nickname Already used");
    }
$comparaison->closeCursor();

// Compare both passwords to prevent typo
if($_POST['password_first'] != $_POST['password_confirm'])
{
    echo('Wrong password confirmation');
}
    else
{
    //hash the password then insert the new user.
    $pass_hache = password_hash($passwordFirst, PASSWORD_DEFAULT);
    $req = $bdd->prepare('INSERT INTO authentification(nickname, password_auth, email, inscription, id_groupe) VALUES(:nickname, :password_auth, :email, Now(), :id_groupe)');
    $req->execute(array(
        
        'nickname' => $_POST['nickname'],
        
        'password_auth' => $pass_hache,
        
        'email' => $_POST['email'],
         
        'id_groupe' => 1,
));

$req->closeCursor();
}
?>
