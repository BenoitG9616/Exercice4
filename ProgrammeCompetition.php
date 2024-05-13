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
    <tr>
    <!-- à générer dynamiquement à partir du tableau $motsTest -->
    <tr>
        <td>véritable</td><td>?</td>
    </tr>
    <!-- fin -->
</table>
<h1>Test de la fonction pileOuFace</h1>
<!-- C -- Test de la fonction pileOuFace -->

<h1>Deuxième partie - La Grande Compétition</h1>
<?php 
/*
    DEUXIÈME PARTIE 

    N.B. Pour la deuxième partie, il n'y a rien à ajouter dans ce fichier. Vous pouvez toutefois modifier le contenu des tableaux $motsJoueurs1 et $motsJoueurs2 pour des fins de tests.

    Les compétitions de HarveyScrabble sont très complexes et trop longues à expliquer, mais le calcul des points est très facile. À la fin du jeu, les deux joueurs en compétition ont chacun choisi 4 mots, un mot par ronde. Les deux tableaux suivants donnent un bon exemple du format des tableaux contenant les mots soumis par deux joueurs lors de ces 4 rondes.

*/
$motsJoueurs1 = ["Ronde1" => "hydre", "Ronde2" => "psychonévrose", "Ronde3" => "solvant", "Ronde4" => "royal"];
$motsJoueurs2 = ["Ronde1" => "cheval", "Ronde2" => "voyelle", "Ronde3" => "hyperémotif", "Ronde4" => "regardé"];

?>
<h2>Les mots du premier joueur</h2>
<table border='1'>
    <tr>
        <th>Ronde 1</th><th>Ronde 2</th><th>Ronde 3</th><th>Ronde 4</th>
    </tr> 
    <tr>
        <?php
        //affichage des mots du premier joueur - ne pas modifier
        foreach($motsJoueurs1 as $ronde => $mot)
        {
            echo "<td>$mot</td>";
        }
        ?>
    </tr> 
</table>
<h2>Les mots du second joueur</h2>
<table border='1'>
    <tr>
        <th>Ronde 1</th><th>Ronde 2</th><th>Ronde 3</th><th>Ronde 4</th>
    </tr> 
    <tr>
        <?php
        //affichage des mots du second joueur - ne pas modifier
        foreach($motsJoueurs2 as $ronde => $mot)
        {
            echo "<td>$mot</td>";
        }
        ?>
    </tr> 
</table>
<?php 
    /*

    Pour trouver le gagnant, on compare les deux tableaux ainsi :

    • Chaque mot soumis par un joueur dans une ronde est comparé contre le mot soumis par l’autre joueur dans la même ronde. Dans notre exemple, le mot hydre serait donc soumis contre le mot cheval.

    • Dans notre exemple, selon les règles du HarveyScrabble, le mot hydre vaut 17 points (3 + 10 + 1 + 2 + 1) et le mot cheval vaut 12 points (1 + 3 + 1 + 5 + 1 + 1), et le joueur 1 gagnerait donc la première ronde.

    • Si la ronde est nulle, on tire à pile ou face le gagnant de la ronde.

    • Évidemment, le joueur ayant gagné le plus de rondes gagne la partie. Par contre, il est possible qu'il y ait égalité si chacun des joueurs gagne 2 rondes!

    • S'il y a égalité après les quatre rondes, on lance un autre calcul : il faut trouver le nombre de fois que chaque joueur a utilisé les lettres H, R, V et Y (le total combiné de toutes les rondes). Le plus grand total gagne.  Je vous suggère d'utiliser la fonction substr_count, voir la documentation sur php.net!
    
    • S'il y a encore égalité, c’est un peu décevant, mais on annonce une égalité. Nous devrons donc départager avec un dernier lancer de pile ou face et annoncer le gagnant.


    Vous devez donc :

    D - Développer ET documenter la fonction competition, qui prend en paramètres les deux tableaux $motsJoueurs1 et $motsJoueurs2 et retourne une chaîne de caractères qui décrit le déroulement de la compétition et annonce le gagnant. Évidemment cette fonction utilise les deux autres développées précédemment.


     Donnez moi le plus de détails possibles sur le déroulement de la partie dans cette chaîne! Qui a gagné? Combien de rondes a-t-il gagné? Y'avait-t-il une égalité? Si oui, y'a-t-il eu une égalité au nombre de lettres H,R,V,Y utilisées? Si oui, qui a gagné le pile ou face? Testez tous les scénarios possibles en changeant les mots dans les tableaux $motsJoueurs1 et $motsJoueurs2 (ou encore en utilisant le même tableau deux fois...). 

    */

?>
<h2>Le résultat de la compétition</h2>
<?php 
    //test de la fonction Competition - ne pas modifier
    echo competition($motsJoueurs1, $motsJoueurs2);
?>
<!-- ajouter vos tests supplémentaires ici -->
</body>
</html>