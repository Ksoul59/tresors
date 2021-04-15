<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Acceuil</title>
</head>
<?php
include_once "connexion_bdd.php";
// On établit la connexion
$connexion = connexionbdd('formationphp');
// On crée la requête
$requete = "SELECT id FROM tresors";
// On exécute la requête avec la méthode query
$resultat = $connexion->query($requete);
echo '<div class="liste">';
if (!$resultat) {
    // Si erreur , afficher un message
    $erreurs = $connexion->errorInfo(); // $erreurs = ['code erreur','code driver','description de lerreur"]
    echo "Problème lors de l'exécution de la requête : " . $erreurs[2];
} else {
    $nbAgents = $resultat->rowCount();
    $integraliteResultat = $resultat->fetchAll(PDO::FETCH_ASSOC);
    $titres = array($integraliteResultat[0]);

    foreach ($integraliteResultat as $ligne) {

        // Affichage de toutes les valeurs de la ligne

        foreach ($ligne as $valeur) {

            echo '<a href="page' . $valeur . '.php" class="btn btn-primary m-1">STAGE ' . $valeur . '</a>';
        }

    }

}
echo '<div>';
// Fermeture de la connexion
$connexion = null;
?>
<!--
            <div class="liste">
                <h2>Choisissez votre Stage ? </h2>
                <div class="">
                    <a href="page1.php" class="btn btn-primary m-1">STAGE 1</a>
                    <a href="page2.php" class="btn btn-primary m-1">STAGE 2</a>
                    <a href="page3.php" class="btn btn-primary m-1">STAGE 3</a>
                </div>
                <div >
                    <a href="page4.php" class="btn btn-primary m-1">STAGE 4</a>
                    <a href="page5.php" class="btn btn-primary m-1">STAGE 5</a>
                    <a href="page6.php" class="btn btn-primary m-1">STAGE 6</a>
                </div>
                <div >
                    <a href="page7.php" class="btn btn-primary m-1">STAGE 7</a>
                    <a href="page8.php" class="btn btn-primary m-1">STAGE 8</a>
                    <a href="page9.php" class="btn btn-primary m-1">STAGE 9</a>
                </div>
            </div>
-->