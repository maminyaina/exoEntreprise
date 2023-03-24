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

$title = 'Connexion';
include 'include/header.inc.php';
?>



    <main class="container">
        <section class="w-75 mx-auto alert alert-secondary">
    <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control w-100" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </section>
    </main>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>