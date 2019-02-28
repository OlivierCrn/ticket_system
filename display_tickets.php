<?php 
            try

            {

            $bdd = new PDO('mysql:host=localhost;dbname=auth;charset=utf8', 'olivier', 'toor');

            }

            catch(Exception $e)

            {

            die('Erreur : '.$e->getMessage());

            }


            $reponse = $bdd->prepare('SELECT id_ticket, subject, content, closed FROM tickets WHERE id_nickname= ? ORDER BY id_ticket DESC');
            $reponse->execute(array($_SESSION['id_user']));
// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
            ?>

<div class="container">
    <div class="row">
        <div class="" style="width:100%">
            <table id="tickets" class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Ticket</th>
                        <th>Subject</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>More</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            while ($donnees = $reponse->fetch())

            {
                ?>

                    <tr>
                        <td><?php print $donnees['id_ticket']; ?></td>
                        <td><?php print $donnees['subject']; ?></td>
                        <td> <?php print $donnees['content']; ?> </td>
                        <td> <?php if($donnees['closed'] == 0){
                                ?><button type="button" class="btn btn-success">Open</button>
                            <?php }
                                    else
                                    {
                                        ?><button type="button" class="btn btn-danger">Closed</button><?php
                                    }?> </td>
                        <td> <?php if($donnees['closed'] == 0){
                                ?><button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#test">Answer</button>
                            <?php }
                                    else
                                    {
                                        ?><button type="button" class="btn btn-info">Archived</button><?php
                                    }?> </td>
                    </tr>

                    <?php
            }
            ?> </tbody>
            </table>
        </div>
    </div>
</div>