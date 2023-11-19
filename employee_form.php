<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>TP PHP - Inscription d'employés</title>
</head>
<body style="background-color: #ffcc00;">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <fieldset>
            <legend><b>Inscrire un employé</b></legend>
            <label>Nom :&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="nom" value="" size="30" maxlength="60" required="required"/><br/><br/>
            <label>Salaire :&nbsp;</label>
            <input type="number" name="salaire" min="0" max="100000" step="5000" size="6" required="required"/><br/><br/>
            <label>Age :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="number" name="age" min="18" max="100" size="6" required="required"/><br/><br/>
            <input type="submit" value="Inscrire" name="inscrire" />
        </fieldset>
    </form>

    <?php
    session_start();

    if(isset($_POST['inscrire'])){
        $name = isset($_POST["nom"]) ? $_POST["nom"] : '';
        $salaire = isset($_POST["salaire"]) ? $_POST["salaire"] : 0;
        $age = isset($_POST["age"]) ? $_POST["age"] : 0;
        $id = 0;
        $exists = $name . $age;

        if(isset($_SESSION[$exists])){
            echo "<h3>{$name} d'age: {$age} : vous êtes déjà inscrit</h3>";
        } else {
            $_SESSION[$exists] = $exists;
            $file = fopen("employees.csv", "a");

            if(flock($file, LOCK_EX)){
                $id = 1 + $_SESSION["count"];
                $employe = array($id, $name, $salaire, $age);
                
                fputcsv($file, $employe, ";");

                flock($file, LOCK_UN);
                fclose($file);

                // Reopen the file for reading after closing
                $file = fopen("employees.csv", "r");

                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nom</th>";
                echo "<th>Salaire</th>";
                echo "<th>Age</th>";
                echo "</tr>";

                while(($ligne = fgetcsv($file, 0, ";")) !== false){
                    echo "<tr>";
                    foreach($ligne as $val){
                        echo "<td>$val</td>";
                    }
                    echo "</tr>";
                }

                echo "</table>";

                fclose($file);

                // Enregistrez la session pour indiquer que l'utilisateur est inscrit
                $_SESSION[$exists] = true;
            } else {
                echo "Problème de verrouillage";
            }
        }
    }

?>
</body>
</html>
