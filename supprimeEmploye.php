<?php

include 'include/connect.inc.php';

// - Suppression d'un enregistrement
if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_employes'])) {
    /* ici on vérifie que l'indice 'action' existe et que cette ation correspond à 'suppression'. On vérifie aussi si l'on a bien récupéré l'id_employes => si tout ça est OK alors je traite la demande : je supprime l'employé
    Toutes ces données (action, suppression, id_employes) se trouvent dans le lien sur le bouton suppression
    */

    $requeteSup = $pdoEntreprise->prepare("DELETE FROM employes WHERE id_employes= :id_employes"); // lorsque j'utilise dans une requête 'prepare' les deux points cela signifie que je suis en train de créer un marqueur. Ici le marqueur :id_employes est pour l'instant vide ! 

    $requeteSup->execute(array(
        ':id_employes' => $_GET['id_employes'],
    )); // j'exécute ma requête en précisant que mon marqueur qui était vide jusqu'à maintenant contient maintenant une information : je recherche l'id_employes du lien
    $requeteSup2 = $pdoEntreprise->prepare("DELETE FROM information WHERE `information`.`id_employes`= :id_employes"); // lorsque j'utilise dans une requête 'prepare' les deux points cela signifie que je suis en train de créer un marqueur. Ici le marqueur :id_employes est pour l'instant vide ! 

    $requeteSup2->execute(array(
        ':id_employes' => $_GET['id_employes'],
    )); // j'exécute ma requête en précisant que mon marqueur qui était vide jusqu'à maintenant contient maintenant une information : je recherche l'id_employes du lien


    header('location:listeEmploye.php');
    exit();
}