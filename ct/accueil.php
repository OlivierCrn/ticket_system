<?php
session_start();
if($_SESSION['id_groupe'] == 1)
{
  include('UserPage.php');
}
/*elseif($_SESSION['id_groupe'] === 2)
{
    include("MasterPage.php");
}
 elseif($_SESSION['id_groupe'] === 3)
{
    include("AdminPage.php");
}*/
?>