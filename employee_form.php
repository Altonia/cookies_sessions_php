<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8"/>
<title>TP PHP - Inscription d'employés</title>
</head>
<body style="background-color: #ffcc00;">
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
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
<!-- A COMPLETER -->
    <?php
        $list_inscription = ["Nom" => [],"salaire" => [],"Age" => []];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["nom"];
            $salaire = $_POST["salaire"];
            $age = $_POST["age"];
          }
          array_push($list_inscription["Nom"],$name);
          array_push($list_inscription["salaire"],$salaire);
          array_push($list_inscription["Age"],$age);


        echo "<a href = 'acceuil.php'>Retour à l'accueil</a>";
        echo "<table border = '1'>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>NOM</th>";
                echo "<th>SALAIRE</th>";
                echo "<th>AGE</th>";
            echo "</tr>";
            foreach ($list_inscription["Nom"] as $i => $val){
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>{$list_inscription['Nom'][$i]}</td>";
                echo "<td>{$list_inscription['salaire'][$i]}</td>";
                echo "<td>{$list_inscription['Age'][$i]}</td>";
                echo "</tr>";
            }
        echo "</table>";
    ?>
</body>
</html>
