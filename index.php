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
<body class="container">

    <div>
        <div id="header">
            <h1> Bienvenue au PRIXCORRECT</h1>
        </div>
        <div id="body row">
            <div class="m-4">
                <p>
                    L’oncle Picsou a accumulé de fabuleux tresor. <br>
                    Il souhaite connaitre l'étendu de sa fortune colossale. <br>
                    Seras-tu capable d’évalué à sa juste valeur les objets denicher?
                </p>
            </div>
            <div class="liste">
                <?php
include_once "connexion_bdd.php";
// J'établis la connexion à la bdd wf3_php_intermediaire_kevins
$connexion = connexionbdd('formationphp');
// j'écris ma requête
$requete = "SELECT id FROM tresors ;";

// J'envoie ma demande
$resultat = $connexion->query($requete);
if (!$resultat) {
    $erreurs = $connexion->errorInfo();
    echo "Problème lors de l'exécution de la requête : " . $erreurs[2];
} else {
    // Donne moi tous les résultats et mets les dans un tableau associatif
    $integraliteResultat = $resultat->fetch(PDO::FETCH_NUM);
    /*
    [
    ['id'=>1,'nom'=>'charentaise','description'=>'la meilleur pantoufle...'],
    ['id'=>2,'nom'=>'charentaise','description'=>'la meilleur pantoufle...']
    ]
     */
    // Nombre de résultats de la requête - compter le nombre de lignes
    $nbChaussures = $resultat->rowCount();

    echo "<h3>Il y a $nbChaussures niveaux de disponible</h3>";

}
// Fermeture de la connexion
$connexion = null;?>

                <h2>Choisissez votre Stage ? </h2>
<?php include_once "index2.php";
?>
            </div>
        </div>

    </div>
</body>
</html>
