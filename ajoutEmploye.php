<?php
include 'include/connect.inc.php';



if (!empty($_POST)) // Je verifie que mon formulaire n'est pas vide (not empty)
{
    if(!empty($_POST['id_employes']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['sexe']) && !empty($_POST['service']) && !empty($_POST['date_embauche']) && !empty($_POST['salaire'])){

    $profil = $pdoEntreprise->prepare("INSERT INTO employes (id_employes, prenom, nom, genre, service, date_embauche, salaire) VALUES (:id_employes, :prenom, :nom, :genre, :service, :date_embauche, :salaire)");

    $profil->execute(array(
        ':id_employes' => $_POST['id_employes'],
        ':prenom' => $_POST['prenom'],
        ':nom' => $_POST['nom'],
        ':genre' => $_POST['sexe'],
        ':service' => $_POST['service'],
        ':date_embauche' => $_POST['date_embauche'],
        ':salaire' => $_POST['salaire']
    ));

    $tmpName = $_FILES['photo']['tmp_name'];
    $name = $_FILES['photo']['name'];
    $size = $_FILES['photo']['size'];
    $error = $_FILES['photo']['error'];
    echo $target_dir = "upload/";
    echo $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    echo $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // var_dump($_FILES);
    var_dump($_POST);
    var_dump($_FILES);

    // move_uploaded_file($tmpName, 'img/'.$name) ;
    // if(file_exists('img/'.$name))
    // {
    //         var_dump($_POST);
    //         echo 'updated';
    //     }
    //     else 
    //     {
    //         echo 'not updated';
    move_uploaded_file($tmpName, 'img/'.$name) ;
    // var_dump($_POST);

    //     }
    
    $information = $pdoEntreprise->prepare("INSERT INTO information (id_employes, profil, photo) VALUES (:id_employes, :profil, :photo)");

    $information->execute(array(
        'id_employes' => $_POST['id_employes'],
        ':profil' => $_POST['profil'],
        'photo' => $name
    ));


    header('location:listeEmploye.php');
    exit();

}else{
    echo "Veuillez remplir les champs";
}

}





$title = "Nouvel employe";
include 'include/header.inc.php';
?>

<main class="container">
    <section class="row my-5">

        <form action="#" method="POST" class="border p-2 bg-light" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id_employes">Identifiant employé</label>
                <input type="number" name="id_employes" id="id_employes" class="form-control" value="">
            </div>
            <div class="mb-3">
                <label for="prenom">Prénom de l'employé</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="">
            </div><!-- fin prénom -->

            <div class="mb-3">
                <label for="nom">Nom de l'employé</label>
                <input type="text" name="nom" id="nom" class="form-control" value="">
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
                <label for="date_embauche">Date d'embauche</label>
                <input type="date" name="date_embauche" id="date_embauche" class="form-control" value="">
            </div>
            <div class="mb-3">
                <label for="salaire">Salaire de l'employé</label>
                <input type="number" name="salaire" id="salaire" class="form-control" value="">
            </div>
            <div class="mb-3">
                <label for="profil">Profil</label>
                <input type="text" name="profil" id="profil" class="form-control" value="">
            </div>
            <div class="mb-3">
                <label for='photo'>Photo</label>
                <input type='file' name='photo'>
                <!-- <button type='envoyer' name="envoyer">Enregistrer</button> -->
            </div>
            <input type="submit" class="btn btn-warning" value="Ajouter">
        </form>

        <?php


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