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

// var_dump($_POST);


if (!empty($_POST)) // Je verifie que mon formulaire n'est pas vide (not empty)
{
    $nom = htmlspecialchars($_POST['titre']);
    $prenom = htmlspecialchars($_POST['titre']);
    
      $resultat = $pdoEntreprise->prepare("UPDATE employes, information SET employes.prenom = :prenom, employes.nom = :nom, employes.genre = :genre, employes.service = :service, employes.salaire = :salaire, information.profil = :profil WHERE employes.id_employes = information.id_employes AND employes.id_employes = :id_employes");

    $resultat->execute(array(
        'id_employes' => $_GET['id_employes'],
        ':prenom' => $prenom,
        'nom' => $nom,
        'genre' => $_POST['sexe'],
        'service' => $_POST['service'],
        'salaire' => $_POST['salaire'],
        ':profil' => $_POST['profil']
    ));

    header('location:listeEmploye.php');
    exit();
}

// if (isset($_GET['idEmployes'])) {

//     $requete = $pdoEntreprise->query("SELECT `employes`.*, `information`.*
// FROM `employes` 
//     LEFT JOIN `information` ON `information`.`id_employes` = `employes`.`id_employes`
// WHERE `employes`.`id_employes`=" . $_GET['idEmployes'] . "");

$title = "Employé - n°" . $ficheEmploye["id_employes"];
include 'include/header.inc.php';
?>



<main class="container">
    <section class="row my-5">

        <form action="#" method="POST" class="border p-2 bg-light" enctype="multipart/form-data">
            <div class="mb-3">
                <!-- <div class='col-4'><img class='rounded float-start w-100' src='img/<?php echo $ficheEmploye['photo']; ?>' alt=''>
                <input type="file" name="file"> -->
                <label for="prenom">Prénom de l'employé</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $ficheEmploye['prenom']; ?>">
            </div><!-- fin prénom -->

            <div class="mb-3">
                <label for="nom">Nom de l'employé</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $ficheEmploye['nom']; ?>">
            </div><!-- fin nom -->



            <div class="mb-3">
                <label for="sexe">Genre de l'employé</label>
                <select name="sexe" id="sexe" class="form-select">
                    <option value="f">Femme</option>
                    <option value="m">Homme</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="service">Service de l'employé</label>
                <select name="service" id="service" class="form-select">
                    <?php // je récupère les services depuis la BDD
                    $requeteService = $pdoEntreprise->query("SELECT DISTINCT service FROM employes");
                    // ma requête qui va cherher tous les services depuis ma BDD

                    while ($service = $requeteService->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=\"" . $service['service'] . "\">" . $service['service'] . "</option>";
                        // je demande l'affichage de chacun des services sous forme de <option>
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="salaire">Salaire de l'employé</label>
                <input type="number" name="salaire" id="salaire" class="form-control" value="<?php echo $ficheEmploye['salaire']; ?>">
            </div>
            <div class="mb-3">
                <label for="profil">Profil</label>
                <input type="text" name="profil" id="profil" class="form-control" value="<?php echo $ficheEmploye['profil']; ?>">
            </div>

            <input type="submit" class="btn btn-warning" value="Modifier">
        </form>

        <?php

        //     if(isset($_POST['submit']))
        // {
        //     // echo $n=$_POST['name'];
        //     $tmpName = $_FILES['file']['tmp_name'];
        //     $name = $_FILES['file']['name'];
        //     $size = $_FILES['file']['size'];
        //     $error = $_FILES['file']['error'];
        //     echo $target_dir = "upload/";
        //     echo $target_file = $target_dir . basename($_FILES["file"]["name"]);
        //     echo $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        //     // var_dump($_FILES);
        //     var_dump($_POST['submit']);

        //     // move_uploaded_file($tmpName, 'img/'.$name) ;
        //     if(file_exists('img/'.$name))
        //     {
        //             var_dump($_POST);
        //             echo 'updated';
        //             echo $name;
        //         }
        //         else 
        //         {
        //             echo 'not updated';
        //     move_uploaded_file($tmpName, 'img/'.$name) ;
        //     var_dump($_POST);
        //     echo $name;
        //         }                    
        // }
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
