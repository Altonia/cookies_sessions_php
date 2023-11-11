<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>TP PHP - Personnalisation avec sessions</title>
    <style type="text/css">
        /* A COMPLETER */
        <?php
            session_start();
            $fond = isset($_SESSION["fonde"]) ? $_SESSION["fonde"] : 'white';
            $text = isset($_SESSION["texte"]) ? $_SESSION["texte"] : 'black';

            echo " body {background-color : $fond; color : $text ;}";
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
   <p>Contenu de la page B avec les couleurs choisies <br />
   <a href="sessions.php">Retour vers la page principale</a>
</p>
</body>
</html>