<?php
session_start(); 

$_SESSION['loginErrorMessage'] = NULL;

// Log in  the database.
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=auth;charset=utf8', 'olivier', 'toor', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{

    die('Erreur : '.$e->getMessage());

}

//Prepare the request, to select only one line correspond to the nickname
$req = $bdd->prepare('INSERT INTO tickets(id_ticket, id_nickname, subject, content) VALUES(:subject, :content)');
        $req->execute(array(
            
            'subject' => $_POST['subject'],
            
            'content' => $_POST['content'],
            ));
        $_SESSION['notification_message']="Ticket créé.";
        $req->closeCursor();
        header('location:accueil.php');
        exit();
?>