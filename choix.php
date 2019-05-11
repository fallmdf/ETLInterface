<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>BDD</title> 
  <link rel="stylesheet" type="text/css" href="mycss.css">
</head> 
<body>

  <?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=bdd", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully <br/>"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    //***************************** les colonnes de la table *****************************************
        $query = $conn->query("SHOW COLUMNS from faits");
        while( $row = $query->fetch() ){
            $colonne_name []= $row['Field'];
        }?>
      

<form method = "post" action = "choix1.php">
<fieldset id="colonne1" >  <legend>Donnees quantitatives</legend>

<?php for ($i=0; $i < count($colonne_name) ; $i++) { ?>

   
<?php echo $colonne_name[$i]?><input type="checkbox" name="<?php echo $colonne_name[$i];?>" value="<?php echo $colonne_name[$i]?>" /> <br>



<?php
       }
  ?> 
<input id="envoie" type="submit" value="Executer" />
</fieldset>
</form>
</body>
</html>