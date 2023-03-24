<!-- 
Les pages PHP peuvent contenir (et elles le font la plupart du temps) du HTML. 
Au contraire une page ayant l'extension .html ne peuvent pas contenir du PHP
C'est-à-dire qu'à chaque fois que votre page devra contenir du langage php vous devrez avoir une extension .php.
-->

<?php
// ma première connexion à la BDD
// 1 - en php pour créer une variable j'utilise le signe $ suivi du nom de ma variable
// 2 - PDO => php data object et ça permet de créer (quand il y a la bonnes informations de connexion) une connexion avec la BDD
/* 3 - lorsque j'utilise le mot clé 'new' je crée un objet de la connexion à la BDD qui attendra plusieurs informations :
    * les informations sur mon serveur (ici localhost) et sur le nom de la BDD (entreprise)
    * le nom d'utilisateur ('root')
    * le mdp ('')
*/
// 4 - le tableau (array) sert ici à gérer les erreurs de connexion ou de requête à la BDD. S'il y a une erreur, alors un texte explicatif sera affiché sur la page du navigateur.

include 'include/connect.inc.php';

// $pdoEntreprise = new PDO(
//     'mysql:host=localhost;
//     dbname=entreprise3', 
//     'root',
//     '',
//     array(
//         PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
//         PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
//     )
// );




$title = 'Liste des employes';
include 'include/header.inc.php';
// var_dump($_GET);
?>



<main class="container">
    <a type="submit" class="btn btn-success" href="ajoutEmploye.php">Ajouter un nouvel employé</a>

    <section class="row my-5">
        <?php
        // notre première requête
        $requete = $pdoEntreprise->query("SELECT * FROM employes");


        // pour cette requête je vais chercher ma variable de connexion et grâce à la flèche -> j'indique que je veux une requête dans cette BDD. J'écris ensuite simplement ma requête en SQL.
        ?>
        <table class="table table-success table-hover">
            <thead>
                <tr>
                    <!-- th*7 -->
                    <th>ID</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Genre</th>
                    <th>Service</th>
                    <th>Date d'embauche</th>
                    <th>Salaire</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <?php
                // $query=$pdoEntreprise->prepare($info);

                while ($employes = $requete->fetch(PDO::FETCH_ASSOC)) {

                    // var_dump($_GET);
                    //FETCH_ASSOC est une méthode qui permet de récupérer les informations dans notre BDD en les liant par enregistrement
                    echo "<tr>";
                    echo "<td><a href='information.php?id_employes=" . $employes['id_employes'] . "' class='text-decoration-none text-dark'>" . $employes['id_employes'] . "</a></td>"; // je récupère l'id qui correspond au premier enregistrement de ma requête
                    echo "<td>" . $employes['prenom'] . "</td>";
                    echo "<td>" . $employes['nom'] . "</td>";

                    echo "<td>";

                    //on fait une condition en PHP 
                    /* si le genre est f dans la bdd alors je dis d'afficher femme sinon c'est forcément h et je demande d'afficher homme */
                    if ($employes['genre'] == 'f') {
                        echo "Femme";
                    } else {
                        echo "Homme";
                    }

                    echo "</td>";

                    echo "<td>" . $employes['service'] . "</td>";
                    echo "<td>" . date('d/m/y', strtotime($employes['date_embauche'])) . "</td>";
                    // ici on utilise une fonction prédéfinie date(). Cette fonction PHP prend deux arguments : le format de la date, deuxième argument la date que l'on veut modifier. On peut préciser une date nous-même ou alors récupérer une date depuis la BDD. 
                    echo "<td>" . $employes['salaire'] . " €</td>";
                    echo '<td><a class="btn btn-primary mx-2" href="information.php?id_employes=' . $employes['id_employes'] . '" class="text-decoration-none text-light"><i class="bi bi-eye"></i></a>
                    <a href="modifemploye.php?id_employes='.$employes['id_employes'].'" class="btn btn-warning mx-2"><i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-danger mx-2" href="supprimeEmploye.php?action=suppression&id_employes='. $employes['id_employes'].'" onclick="return(confirm(\'Êtes-vous sûr de vouloir supprimer cet employé ?\'))"><i class="bi bi-trash"></i></a></td>';

                        // echo "</tr>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</main>


<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
</body>

</html>