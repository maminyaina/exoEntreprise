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
$title = 'Accueil';
include 'include/header.inc.php';
?>

    <main class="container">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/imgEntreprise/001.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/imgEntreprise/002.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/imgEntreprise/003.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/imgEntreprise/004.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>

            <!-- <div class="carousel-inner border border-danger">
                <div class="carousel-item active">
                    <img src="img/imgEntreprise/001.jpg" class="d-block w-100 h-50 mx-auto border border-dark" alt="image-01">
                    <div class="carousel-caption d-none d-md-block border border-success">
                        <h5>Bienvenue sur réseau privé virtuel</h5>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/imgEntreprise/002.jpg" class="d-block w-100 h-50 mx-auto border border-dark" alt="image-02">
                    <div class="carousel-caption d-none d-md-block border border-success">
                        <h5>Montez vers le sommet</h5>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/imgEntreprise/003.jpg" class="d-block w-100 h-50 mx-auto border border-dark" alt="image-03">
                    <div class="carousel-caption d-none d-md-block border border-success">
                        <h5>Toute l'infrastructure est ici</h5>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/imgEntreprise/004.jpg" class="d-block w-100 h-50 mx-auto border border-dark" alt="image-04">
                    <div class="carousel-caption d-none d-md-block border border-success">
                        <h5>En route vers le futur</h5>
                        <p></p>
                    </div>
                </div>
            </div> -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <section class="row my-5">
            <?php
            // notre première requête
            // $requete = $pdoEntreprise->query("SELECT * FROM employes ORDER BY salaire DESC LIMIT 0,5");
            // pour cette requête je vais chercher ma variable de connexion et grâce à la flèche -> j'indique que je veux une requête dans cette BDD. J'écris ensuite simplement ma requête en SQL.
            ?>
            <!-- <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        th*7 
                        <th>ID</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Genre</th>
                        <th>Service</th>
                        <th>Date d'embauche</th>
                        <th>Salaire</th>
                    </tr>
                </thead>
                <tbody> -->
            <?php
            // while ($employes = $requete->fetch(PDO::FETCH_ASSOC)) {
            //     //FETCH_ASSOC est une méthode qui permet de récupérer les informations dans notre BDD en les liant par enregistrement
            //     echo "<tr>";
            //     echo "<td>" . $employes['id_employes'] . "</td>"; // je récupère l'id qui correspond au premier enregistrement de ma requête
            //     echo "<td>" . $employes['prenom'] . "</td>";
            //     echo "<td>" . $employes['nom'] . "</td>";
            //     echo "<td>";
            //     //on fait une condition en PHP 
            //     /* si le genre est f dans la bdd alors je dis d'afficher femme sinon c'est forcément h et je demande d'afficher homme */
            //     if ($employes['genre'] == 'f') {
            //         echo "Femme";
            //     } else {
            //         echo "Homme";
            //     }
            //     echo "</td>";
            //     echo "<td>" . $employes['service'] . "</td>";
            //     echo "<td>" . date('d/m/y', strtotime($employes['date_embauche'])) . "</td>";
            //     // ici on utilise une fonction prédéfinie date(). Cette fonction PHP prend deux arguments : le format de la date, deuxième argument la date que l'on veut modifier. On peut préciser une date nous-même ou alors récupérer une date depuis la BDD. 
            //     echo "<td>" . $employes['salaire'] . " €</td>";
            //     echo "</tr>";
            // }
            ?>
            <!-- </tbody>
            </table> -->
        </section>
    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>