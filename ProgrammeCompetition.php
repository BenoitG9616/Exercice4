<?php 
/* 
    Cet exercice compte pour 15 points, mais est évalué sur 10 points.

    A - La fonction harveyScrabble et sa documentation         / 4
    B - La fonction pileOuFace et sa documentation             / 1
    C - Le test des fonctions                                  / 1
    D - La fonction competition et sa documentation            / 3

    Échange en classe (10%)                                    / 1

                                                   Total       / 10 
*/      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    /*
        Mise en situation 

        Le nouveau jeu HarveyScrabble fait son arrivée sur les tablettes. Il s’agit évidemment d’une version modifiée du Scrabble, où les joueurs doivent écrire des mots dans le but d’obtenir un maximum de points.

        PREMIÈRE PARTIE 

        Pour commencer, vous devrez développer et tester une fonction nommée harveyScrabble qui calcule le nombre de points que vaut un mot envoyé en paramètres selon un calcul particulier (décrit dans le fichier Fonctions.php).
    
    */

    require_once("Fonctions.php");
    //A. Développer ET documenter la fonction harveyScrabble dans Fonctions.php selon les règles qui y sont décrites.

    //B. Développer ET documenter la fonction pileOuFace dans Fonctions.php selon les règles qui y sont décrites.

    //C. Testez la fonction harveyScrabble, développée dans le fichier Fonctions.php. Vous devez remplacer la table HTML plus bas et en générer une qui contient le nombre de points correspondant pour chaque mot à tester dans le tableau suivant, en traversant le tableau avec une boucle.
    
    $motsTest = ["véritable", "gravitas", "hydravion", "regarder", "coucou", "déjà"];
    ?>
    <h1>Première partie - Les fonctions harveyScrabble et pileOuFace</h1>
    <h2>Test de la fonction harveyScrabble</h2>
    <table border='1'>
        <tr>
            <th>Mot</th><th>Valeur en points</th>
        </tr>
        <!-- Générer dynamiquement à partir du tableau $motsTest -->
        <?php foreach ($motsTest as $mot) : ?>
            <tr>
                <td><?= $mot ?></td>
                <td><?= harveyScrabble($mot) ?></td>
            </tr>
        <?php endforeach; ?>
        <!-- Fin -->
    </table>
    <h1>Test de la fonction pileOuFace</h1>
    <!-- C -- Test de la fonction pileOuFace -->

<h1>Deuxième partie - La Grande Compétition</h1>
<?php 
/*
    DEUXIÈME PARTIE 

    N.B. Pour la deuxième partie, il n'y a rien à ajouter dans ce fichier. Vous pouvez toutefois modifier le contenu des tableaux $motsJoueurs1 et $motsJoueurs2 pour des fins de tests.

    Les compétitions de HarveyScrabble sont très complexes et trop longues à expliquer, mais le calcul des points est très facile. À la fin du jeu, les deux joueurs en compétition ont chacun choisi 4 mots, un mot par ronde. Les deux tableaux suivants donnent un bon exemple du format des tableaux contenant les mots soumis par deux joueurs lors de ces 4 rondes.

/**
 * Compare deux mots et détermine le gagnant en fonction de leurs scores.
 *
 * @param string $motJoueur1 Le mot du joueur 1.
 * @param string $motJoueur2 Le mot du joueur 2.
 * @return string Le gagnant de la ronde ("Joueur 1", "Joueur 2" ou "Égalité").
 */
// Inclure le fichier contenant la fonction competition
require_once("Fonctions.php");

// Définir les tableaux de mots pour les deux joueurs
$motsJoueurs1 = ["Ronde1" => "hydre", "Ronde2" => "psychonévrose", "Ronde3" => "solvant", "Ronde4" => "royal"];
$motsJoueurs2 = ["Ronde1" => "cheval", "Ronde2" => "voyelle", "Ronde3" => "hyperémotif", "Ronde4" => "regardé"];

// Appeler la fonction competition avec les tableaux de mots des deux joueurs comme paramètres
$resultatCompetition = competition($motsJoueurs1, $motsJoueurs2);

// Afficher le résultat de la compétition
echo "<h2>Résultat de la compétition</h2>";
echo "<pre>$resultatCompetition</pre>";
?>

<?php
require_once("Fonctions.php");
 //Détermine le gagnant de la compétition entre deux joueurs.
 //@param array $motsJoueurs1 Les mots soumis par le joueur 1.
 //@param array $motsJoueurs2 Les mots soumis par le joueur 2.
 //@return string La description du déroulement de la compétition et le nom du gagnant.

 // Initialisation des compteurs
    $scoreJoueur1 = 0;
    $scoreJoueur2 = 0;
    $nbRondesGagneesJoueur1 = 0;
    $nbRondesGagneesJoueur2 = 0;
    $nbEgalites = 0;

    // Comparaison des mots pour chaque ronde
    foreach ($motsJoueurs1 as $ronde => $motJoueur1) {
        $motJoueur2 = $motsJoueurs2[$ronde];
    
        $gagnantRonde = comparerMots($motJoueur1, $motJoueur2);
        if ($gagnantRonde == "Joueur 1") {
            $scoreJoueur1++;
            $nbRondesGagneesJoueur1++;
        } elseif ($gagnantRonde == "Joueur 2") {
            $scoreJoueur2++;
            $nbRondesGagneesJoueur2++;
        } else {
            $nbEgalites++;
        }
    }

    // Comparaison des lettres H, R, V et Y
    $nbLettresJoueur1 = substr_count(implode($motsJoueurs1), 'h') + substr_count(implode($motsJoueurs1), 'r') + substr_count(implode($motsJoueurs1), 'v') + substr_count(implode($motsJoueurs1), 'y');
    $nbLettresJoueur2 = substr_count(implode($motsJoueurs2), 'h') + substr_count(implode($motsJoueurs2), 'r') + substr_count(implode($motsJoueurs2), 'v') + substr_count(implode($motsJoueurs2), 'y');

    // Détermination du gagnant
    if ($scoreJoueur1 > $scoreJoueur2) {
        $gagnant = "Joueur 1";
    } elseif ($scoreJoueur1 < $scoreJoueur2) {
        $gagnant = "Joueur 2";
    } else {
        // En cas d'égalité, on regarde le nombre total de lettres H, R, V et Y
        if ($nbLettresJoueur1 > $nbLettresJoueur2) {
            $gagnant = "Joueur 1";
        } elseif ($nbLettresJoueur1 < $nbLettresJoueur2) {
            $gagnant = "Joueur 2";
        } else {
            // Si toujours égalité, on tire au hasard
            $gagnant = pileOuFace() == "pile" ? "Joueur 1" : "Joueur 2";
        }
    }

    // Construction de la chaîne de résultat
    $resultat = "Le gagnant est $gagnant.\n";
    $resultat .= "Joueur 1 a gagné $nbRondesGagneesJoueur1 rondes.\n";
    $resultat .= "Joueur 2 a gagné $nbRondesGagneesJoueur2 rondes.\n";
    $resultat .= "Il y a eu $nbEgalites égalité(s) de ronde.\n";

    return $resultat;

?>
<h2>Le résultat de la compétition</h2>
<?php 
    //test de la fonction Competition - ne pas modifier
    echo competition($motsJoueurs1, $motsJoueurs2);
?>
<!-- ajouter vos tests supplémentaires ici -->
</body>
</html>