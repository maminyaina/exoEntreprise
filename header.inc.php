<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $title?></title>
</head>

<body class="bg-light">
    <!-- jumbotron-fluid -->
    <header class="p-4 mb-5 couleur">
        <section class="container-fluid">
            <h1 class="display-5 fw-bold text-light text-center text-uppercase">Back office entreprise</h1>
            <!-- <p class="col-md-8 fs-4">Dans cette page, nous allons afficher les 5 employés de notre entreprise ayant le plus grand salaire. </p> -->
            <div class="d-flex justify-content-between">
                <a class="btn btn-primary btn-lg w-25" href="index.php">Accueil</a>
                <a class="btn btn-primary btn-lg w-25" href="listeEmploye.php">Voir tous les employés</a>
                <a class="btn btn-primary btn-lg w-25" href="contact.php">Contactez-nous</a>
            </div>
        </section>
        <nav class="navbar bg-body-primary mt-2">
            <form class="container-fluid justify-content-end">
                <button class="btn btn-outline-primary me-2" type="button"><a href="connection.php" class="text-decoration-none text-light">Connectez-vous</a></button>
                <!-- <button class="btn btn-sm btn-outline-secondary" type="button">Smaller button</button> -->
            </form>
        </nav>

    </header><!-- fin du jumbotron -->