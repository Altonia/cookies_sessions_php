<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>TP PHP - Personnalisation avec cookies</title>
    <style type="text/css">
        <?php
            setcookie('fond', $_POST['fond'], time() + 10);
            setcookie('texte', $_POST['texte'], time() + 10);

            // Récupérer les valeurs des cookies s'ils existent
            $fond = isset($_COOKIE['fond']) ? $_COOKIE['fond'] : 'white';
            $texte = isset($_COOKIE['texte']) ? $_COOKIE['texte'] : 'black';

            // Appliquer les styles
            echo "body { background-color: $fond; color: $texte; }";
        ?>
        legend {
            font-weight: bold;
            font-family: cursive;
        }

        label {
            font-weight: bold;
            font-style: italic;
        }
    </style>
</head>

<body>
    <form method="post" action="cookies.php">
        <fieldset>
            <legend>Choisissez vos couleurs (mot clé ou code)</legend>
            <label>Couleur de fond
                <input type="text" name="fond" />
            </label><br /><br />
            <label>Couleur de texte
                <input type="text" name="texte" />
            </label><br />
            <input type="submit" value="Envoyer" />&nbsp;&nbsp;
            <input type="reset" value="Effacer" />
        </fieldset>
    </form>
</body>

</html>
