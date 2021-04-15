<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux prix correcte page 1</title>
    <!--lien css-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" href="public/css/page.css">
</head>

<body>
    <?php
include_once "connexion_bdd.php";
$connexion = connexionbdd('formationphp');
$requete = "SELECT produit, description, image,prix FROM tresors where id=7";

$resultat = $connexion->query($requete);
if (!$resultat) {
    // Si erreur , afficher un message
    $erreurs = $connexion->errorInfo(); // $erreurs = ['code erreur','code driver','description de lerreur"]
    echo "Problème lors de l'exécution de la requête : " . $erreurs[2];
} else {
    $integraliteResultat = $resultat->fetch(PDO::FETCH_ASSOC);
    //$integraliteResultat [id,produit,decription,prix];

}

// pas besoin de guillements si on applique la méthode quote() aux variables

?>
    <header>
        <h1><a href="index.php">LE TRESORS DE PICSOU</a></h1>
    </header>

    <main>

        <div class="card flex-wrap">
            <div class="row ">
                <div class="image ">
                    <img src="public/img/<?php echo $integraliteResultat['image'] ?>" alt="<?php echo $integraliteResultat['produit'] ?>">
                </div>

                <div class="col ">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $integraliteResultat['produit'] ?></h5>
                        <p class="card-text"><?php echo $integraliteResultat['description'] ?></p>
                        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                            <input name="estimation" type="text" placeholder="Prix ?">
                            <input type="submit" name="connexion">
                        </form>
                        <?php
if (isset($_POST['estimation'])) {
    if (($_POST['estimation']) > $integraliteResultat['prix']) {
        echo "<h3 style='color:red;'>C'est moins -</h2>";} else if (($_POST['estimation']) < $integraliteResultat['prix']) {
        echo "<h3 style='color:red;'>C'est plus +</h2>";} else {
        echo "<h2 style='color:green;'>felicitation ! " . $integraliteResultat['prix'] . " est le Prix correct </h2>";
    }}?>
                    </div>

                </div>
            </div>
        </div>

    </main>

</body>

</html>
