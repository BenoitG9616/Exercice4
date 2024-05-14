<?php 

    /* 
    A. En suivant les règles suivantes, développez la fonction harveyScrabble, qui reçoit en paramètres un mot (une chaine de caractères).

    Voici les règlements : 

    1. Toutes les lettres dans un mot (ou une phrase) valent un point, 
    sauf le H qui vaut 3 points, le Y qui vaut 10 points, le V qui vaut 5 points et le R qui vaut 2 points.
   
    2. Les points doivent être attribués que les lettres soient en minuscule ou en majuscule. Vous devez remplacer les caractères accentués suivants (é, è, ê, à, â) par leurs équivalents sans accents, puisqu'ils peuvent être utilisés dans les mots soumis. 
    
    3. Si AUCUNE des lettres H, V, Y et R n'est présente dans le mot, le mot vaut 5 points de moins.

    4. Si TOUTES les lettres H, V, Y, ou R sont présentes dans le mot, le mot vaudra 20 points de plus.

    N'OUBLIEZ PAS DE DOCUMENTER LA FONCTION TEL QUE MONTRÉ EN EXEMPLE 

    */

    //function harveyScrabble($mot)
    function harveyScrabble($mot)
    {
        // Make sure $mot is a string
        if (!is_string($mot)) {
            return 0;
        }
        
        // Remplacer les caractères accentués par leurs équivalents sans accents
        $mot = str_replace(['é', 'è', 'ê', 'à', 'â'], ['e', 'e', 'e', 'a', 'a'], $mot);
        
        // Convertir le mot en minuscules pour la cohérence
        $mot = strtolower($mot);
        
        // Initialiser le score
        $score = 0;
        
        // Parcourir chaque lettre du mot
        for ($i = 0; $i < strlen($mot); $i++) {
            $lettre = $mot[$i];
            switch ($lettre) {
                case 'h':
                    $score += 3;
                    break;
                case 'y':
                    $score += 10;
                    break;
                case 'v':
                    $score += 5;
                    break;
                case 'r':
                    $score += 2;
                    break;
                default:
                    $score += 1; // Toutes les autres lettres valent 1 point
            }
        }
        
        // Si le mot ne contient aucune des lettres spéciales, retrancher 5 points
        if (!preg_match('/[hvyr]/', $mot)) {
            $score -= 5;
        }
        
        // Si le mot contient toutes les lettres spéciales, ajouter 20 points
        if (preg_match('/h/', $mot) && preg_match('/y/', $mot) && preg_match('/v/', $mot) && preg_match('/r/', $mot)) {
            $score += 20;
        }
        
        return $score;
    }
    
    /*
        B. Développez la fonction pileOuFace, qui ne reçoit aucun paramètre, mais qui retourne la chaîne "pile" ou la chaine "face", au hasard.
    */
    
    function pileOuFace()
    {
        // Générer un nombre aléatoire entre 0 et 1
        $resultat = rand(0, 1);
        
        // Retourner "pile" si le résultat est 0, sinon retourner "face"
        return $resultat === 0 ? "pile" : "face";
    }
    
    /*
        C. C'est ici que vous devez développer et documenter la fonction competition.
    */
    function competition($joueur1, $joueur2):string
    {
            
        // À compléter : comparez les scores des joueurs et déterminez le gagnant
        // et les conditions qui ont conduit à cette victoire.
        
        $score_joueur1 = harveyScrabble($joueur1);
        $score_joueur2 = harveyScrabble($joueur2);
    
        
        // Comparer les scores

        if ($score_joueur1 > $score_joueur2) {
            $gagnant = "Joueur 1";
            $condition = "Le joueur 1 a un score de $score_joueur1 contre $score_joueur2 pour le joueur 2.";
        } elseif ($score_joueur1 < $score_joueur2) {
            $gagnant = "Joueur 2";
            $condition = "Le joueur 2 a un score de $score_joueur2 contre $score_joueur1 pour le joueur 1.";
        } else {
            $gagnant = "Aucun";
            $condition = "Les scores des deux joueurs sont égaux.";
        }
        
        $chaine = "Le gagnant est $gagnant. $condition";
        return $chaine;
   }

           // Définition de la fonction comparerMots
function comparerMots($motJoueur1, $motJoueur2)
{
  // La fonction comparerMots servira a comparer les mots entre chaque joueur pour definir un gagnant
   }
   
?>