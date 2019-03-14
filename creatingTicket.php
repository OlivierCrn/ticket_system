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

//Prepare the request, to select only one line correspond to the nickname
$req = $bdd->prepare('INSERT INTO tickets(id_nickname, subject, content) VALUES(:id_nickname, :subject, :content)');
        $req->execute(array(

            'id_nickname' => $_SESSION['id_user'],
            
            'subject' => $_POST['subject'],
            
            'content' => $_POST['content'],
            ));
        $_SESSION['notification_message']="Ticket sent.";
        $req->closeCursor();
        header('location:accueil.php');
        exit();
?>