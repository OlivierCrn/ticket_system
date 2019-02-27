
    <?php 
            try

            {

            $bdd = new PDO('mysql:host=localhost;dbname=auth;charset=utf8', 'olivier', 'toor');

            }

            catch(Exception $e)

            {

            die('Erreur : '.$e->getMessage());

            }


            $reponse = $bdd->prepare('SELECT id_ticket, subject, content FROM tickets WHERE id_nickname= ?');
            $reponse->execute(array($_SESSION['id_user']));
// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
            ?>
            
            <div class="container">
                <div class="row">
                    <div class=""
                </div>
                <table id="tickets" class="table table-striped table-bordered" style="width:100%" >
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Ticket</th>
                            <th>Subject</th>
                            <th>Content</th>
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
                            <td><?php print $donnees['content']; ?></td>
                        </tr>
                   
            </div>
            <?php
            }
            ?> </tbody>
            </table>