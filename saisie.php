<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Toujours utiliser var_dump pour vérifier ce que l'on a
    //var_dump($_POST);

    $arrSaisi = filter_input(
        INPUT_POST,
        'saisie',
        FILTER_DEFAULT,
        FILTER_REQUIRE_ARRAY
    );
    if (isset($arrSaisi) && !empty($arrSaisi)) {
        // trim pour nettoyer les espaces blancs au début ou à la fin de la chaîne
        $nom = trim($arrSaisi['nom']);
        $motDePass = trim($arrSaisi['mot_de_passe']);
        $sexe = $arrSaisi['sexe'];
        $photo = $arrSaisi['photo'];
        $arrCouleurs = $arrSaisi['couleurs']; // array de couleurs
        $langue = $arrSaisi['langue'];
        $arrFruits = $arrSaisi['fruits']; // array de fruits
        $commentaire = $arrSaisi['commentaire'];
        $invisible = $arrSaisi['invisible'];
        $soumettre = filter_input(INPUT_POST, 'soumettre');

        //nom
        if (isset($nom) && !empty($nom)) {
            //Longueur maximum d’une chaine
            if (strlen($nom) > 20) {
                echo 'Nom est trop longue!';
            } else {
                echo 'Nom = ' . $nom . '<br>';
            }
        } else {
            echo 'Nom: inconnu';
        }

        //mot de passe
        if (!empty($motDePass)) {
            //suivi d’au moins trois ({3,}) caractères parmi ceux indiqués : a à z (et donc A à Z), 0 à 9 et les caractères _#*$
            $motif = '/^[a-z0-9_#*$]{3,}/i';
            if (!preg_match($motif, $motDePass)) {
                echo 'Mot de passe est invalide ';
            } else {
               echo 'Mot de passe = ' . $motDePass . '<br>';
            }
        } else {
            echo 'Mot de passe : inconnu';
        }

        //sexe
        if (isset($sexe) && !empty($sexe)) {
            echo 'Sexe = ' . $sexe . '<br>';
        } else {
            echo 'Sexe : inconnu';
        }

        //photo
        if (isset($photo) && !empty($photo)) {
            echo 'Photo = ' . $photo . '<br>';
        } else {
            echo 'Photo : inconnu';
        }

        //Couleur
        if (isset($arrCouleurs) && !empty($arrCouleurs)) {
            echo 'Couleur = <br>';
            if ($arrCouleurs['bleu'] == 'on') {
                echo 'blue = ' . $arrCouleurs['bleu'] . '<br>';
            }
            if ($arrCouleurs['blanc'] == 'on') {
                echo 'blanc = ' . $arrCouleurs['blanc'] . '<br>';
            }
            if ($arrCouleurs['rouge'] == 'on') {
                echo 'rouge = ' . $arrCouleurs['rouge'] . '<br>';
            }
            if ($arrCouleurs['nesaitpas'] == 'on') {
                echo 'nesaitpas = ' . $arrCouleurs['nesaitpas'] . '<br>';
            }
        } else {
            echo 'Couleurs : inconnu';
        }

        //langue
        if (isset($langue) && !empty($langue)) {
            echo 'Langue = ' . $langue . '<br>';
        } else {
            echo 'Langue : inconnu';
        }

        // Fruits
        $arrFruits = $arrSaisi['fruits']; // array de fruits
        if (isset($arrFruits) && !empty($arrFruits)) {
            $lengthArr = count($arrFruits);
            for ($i = 0; $i < $lengthArr; $i++) {
                echo $i . ' = ' . $arrFruits[$i] . '<br>';
            }
        } else {
            echo 'Fruits : inconnu';
        }

        //Commentaire
        if (isset($commentaire) && !empty($commentaire)) {
            echo 'Commentaire = ' . $commentaire . '<br>';
        } else {
            echo 'Commentaire : inconnu';
        }

        //Invisible
        if (isset($invisible) && !empty($invisible)) {
            echo 'Invisible = ' . $invisible . '<br>';
        } else {
            echo 'Invisible : inconnu';
        }

        // Soumettre
        if (isset($soumettre) && !empty($soumettre)) {
            echo 'Soumettre = ' . $soumettre . '<br>';
        } else {
            echo 'Soumettre : inconnu';
        }
    } else {
        echo 'inconnu!';
    }
    ?>
</body>
</html>