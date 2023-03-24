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



if (isset($_GET['id_employes'])) {
    // $affichage = $pdoEntreprise->prepare("SELECT * FROM employes WHERE id_employes = :id_employes");
    $affichage = $pdoEntreprise->prepare("SELECT `employes`.*, `information`.*
                                    FROM `employes` 
                                    LEFT JOIN `information` ON `information`.`id_employes` = `employes`.`id_employes`
                                    WHERE `employes`.`id_employes`= :id_employes");
    /*
ici je sélectionne toutes les informations d'un salarié grâce à son "id" que j'ai précisé dans le href sur la page 02-employes.php.
Sur le bouton 'voir l'employé',
Lorsque j'utilise la flèche -> : je m'appuis sur / je me base sur
Lorsque j'utilise la flèche => : élément à gauche correspond à l'élément à droite
*/

    $affichage->execute(array(
        ':id_employes' => $_GET['id_employes'], // dans un tabbleau (array), les informations sont séparés par des  
        // virgules.
    ));


    if ($affichage->rowCount() == 0) {
        //  si la personne arrive sur la page en récupérant un id_employe qui n'existe pas alors je la renvoie sur une autre page
        //rowCount() est une variable prédéfinie qui permet de compter combien de rangée renvoie une requête // si elle renvoie 0 c'est que cette requête est mauvaise ou que l'id n'existe plus 
        header('location:employes.php');
        exit();
    }
    $ficheEmploye = $affichage->fetch(PDO::FETCH_ASSOC);
    // echo "<pre>";
    // var_dump($ficheEmploye);
    // echo "<pre>";

} else {
    header('location:listeEmployes.php');
    exit();
}

// if (isset($_GET['idEmployes'])) {

//     $requete = $pdoEntreprise->query("SELECT `employes`.*, `information`.*
// FROM `employes` 
//     LEFT JOIN `information` ON `information`.`id_employes` = `employes`.`id_employes`
// WHERE `employes`.`id_employes`=" . $_GET['idEmployes'] . "");

$title = "Fiche employé - n°". $ficheEmploye["id_employes"];;
include 'include/header.inc.php';
?>

<!doctype html>
<html lang="fr">



    <!-- <title>Fiche employé - n° <?php echo $ficheEmploye["id_employes"]; ?></title> -->



    <main class="container">
        <section class="row my-5">
            <?php
            // notre première requête




            // pour cette requête je vais chercher ma variable de connexion et grâce à la flèche -> j'indique que je veux une requête dans cette BDD. J'écris ensuite simplement ma requête en SQL.

            echo "<h1 class='text-center fw-bold fs-1'>Employé n° " . $ficheEmploye["id_employes"] . " - " . $ficheEmploye["prenom"] . " " . $ficheEmploye["nom"] . "</h1>";


            // if ($ficheEmploye['genre'] == 'm') {

            // echo    "

            if ($ficheEmploye['genre'] == 'm') {
                $bgColor = 'info';
                $ficheEmploye['genre'] = 'Homme';
            } else {
                $bgColor = 'warning';
                $ficheEmploye['genre'] = 'Femme';
            }
            echo 
            "<div class='alert alert-$bgColor w-75 mx-auto mt-5'>
            <div class='row'>
                    <div class='col-4'><img class='rounded float-start w-100' src='img/" . $ficheEmploye["photo"] . "' alt=''>
                    </div>
                    <div class='col-8'>

                        <div class='row'>
                            <h3 class='col-4'>Nom : </h3>
                            <p class='col-8 text-uppercase'>" . $ficheEmploye["nom"] . "</p>
                        </div>
                        <div class='row'>
                            <h3 class='col-4'>Prénom(s) : </h3>
                            <p class='col-8'>" . $ficheEmploye["prenom"] . "</p>
                        </div>
                        <div class='row'>
                            <h3 class='col-4'>Genre : </h3>

                            <p class='col-8'>" . $ficheEmploye["genre"] . " </p>
                        </div>
                    </div>
                    </div>
                    <p class='text-center fs-1 text-uppercase'>" . $ficheEmploye["service"] . "</p>
                    <ul>
                        <li>Date d'embauche : " . date('d/m/y', strtotime($ficheEmploye['date_embauche'])) . "</li>
                        <li>Salaire : " . $ficheEmploye['salaire'] . " €</li>
                        <li>" . $ficheEmploye["profil"] . "</li>
                    </ul>
                    <div class='text-center'>
                        <a href='modifemploye.php?id_employes=".$ficheEmploye['id_employes']."' class='btn btn-$bgColor w-50'>Modifier</a>
                    </div>
                </div>";
            //              else {

            //                 echo    "<div class='alert alert-warning w-75 mx-auto'>
            //         <div class='row'>
            //                 <div class='col-4'><img class='rounded float-start w-100' src='img/" . $ficheEmploye["photo"] . "' alt=''></div>
            //             <div class='col-8'>

            //                 <div class='row'>
            // <h3 class='col-4'>Nom : </h3>

            //                 <p class='col-8 text-uppercase'>" . $ficheEmploye["nom"] . "</p>


            //                 </div>
            //                 <div class='row'>
            //                     <h3 class='col-4'>Prénom(s) : </h3>

            //                 <p class='col-8'>" . $ficheEmploye["prenom"] . "</p>
            //                 </div>
            //                 <div class='row'>
            //                 <h3 class='col-4'>Genre : </h3>

            //                 <p class='col-8'>Femme</p>

            //                 </div>
            //             </div>
            //         </div>
            //                 <p class='text-center fs-1 text-uppercase'>" . $ficheEmploye["service"] . "</p>
            //                 <ul>
            //             <li>Date d'embauche : " . date('d/m/y', strtotime($ficheEmploye['date_embauche'])) . "</li>
            //                 <li>Salaire : " . $ficheEmploye['salaire'] . " €</li>
            //                 <li>" . $ficheEmploye["profil"] .
            //                     "</li>
            //                 </ul>
            //             <div class='text-center'>
            //                 <a href='#' class='btn btn-warning w-50'>Modifier</a>
            //             </div>
            //     </div>";
            //             }
            ?>



        </section>
    </main>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>




<?php
