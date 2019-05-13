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

    // Si tout va bien, on peut continuer
        $query = $conn->query("SELECT Distinct * FROM dimentions");
        $query1 = $conn->query("SHOW COLUMNS from faits");
        $query2 = $conn->query("SHOW COLUMNS from dimentions");
        
        ?>
<fieldset id="colonne1" > 
    <legend>Donnees quantitatives</legend>
     

        <?php 
        //************* Affichage des case cochees de la table des faits
        while( $row1 = $query1->fetch() ){

            if (isset($_POST[$row1['Field']])) {
            echo $_POST[$row1['Field']].'<input type="checkbox" name="" value="" checked  disabled /><br>';
                  $ss=$_POST[$row1['Field']];
            // Les colonnes de la table des faits pour gener la table des dimentions
           

             $query3 = $conn->query("SELECT colonne_dim FROM dim_inverse where $ss=1");
             while( $row3 = $query3->fetch() ){
            
                 $generer_dim []= $row3['colonne_dim'];
            
          
              }

            }   


        }

        
          



        ?>

        
</fieldset> 

        <?php
       
        while( $row = $query->fetch() ){
            
            
            $Departement[] = $row['Departement'];
            $Milieu[] = $row['Milieu'];
            $Type_etabli[] = $row['Type_etabli'];
            $Genre[] = $row['Genre'];
            $Type_client[] = $row['Type_client'];
            $Mois[] = $row['Mois'];
            $Annee[] = $row['Annee'];
            $Periode[] = $row['Periode'];
            $Banque[] = $row['Banque'];
            $Pays[] = $row['Pays'];
            $Age[] = $row['Age'];
            $Type_compte[] = $row['Type_compte'];
            $Regions[] = $row['Regions'];
            $Categorie_s[] = $row['Categorie_s'];
            $Type_Assura[] = $row['Type_Assura'];
              
        }

        
        ?>
      

<form method = "post" action = "#">
<fieldset id="colonne2" > <legend>Donnees qualitatives</legend>


 <?php 

 //***************************** Nom des Colonnes de la table *****************************************
        while( $row2= $query2->fetch() ){
            // echo $r['Field']."<br/>";  
             // nmbre de colonne
             $nom_colonne_dim[] =  $row2['Field'] ;  
        }
        //variable qui permet d eliminer la repetition d un IF Ex:Milieu 
            $dep=0;
            $mil=0;
            $T_etabli=0;
            $gen=0;
            $T_client=0;
            $moi=0;
            $ann=0;
            $per=0;
            $ban=0;
            $pay=0;
            $age=0;
            $T_compte=0;
            $reg=0;
            $cat=0;
            $T_assura=0;

     for ($i=0; $i <count($generer_dim) ;  $i++) {
      
              if ($generer_dim[$i]=="Departement" and $dep==0) {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';
                                  for ($j=0;$j<count($Departement) ; $j++) { 
                                   
                                   echo '<OPTION  value="" >'.$Departement[$j].'</OPTION>';
                                   }  echo "</SELECT><br/>";
                                   $dep++;

              }
              
              if ($generer_dim[$i]=="Milieu" and $mil==0) {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';
                                  for ($j=0;$j<count($Milieu) ; $j++) { 
                                  
                                  echo '<OPTION  value="" >'.$Milieu[$j].'</OPTION>'; 
                       
                                  }  echo "</SELECT><br/>";
                                  $mil++;

              }
              if ($generer_dim[$i]=="Type_etabli" and $T_etabli==0) {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';
                                  for ($j=0;$j<count($Type_etabli) ; $j++) { 
                                  
                                  echo '<OPTION  value="" >'.$Type_etabli[$j].'</OPTION>'; 
                       
                                 }  echo "</SELECT><br/>";
                                 $T_etabli++;

              }
              if ($generer_dim[$i]=="Genre" and $gen==0) {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';
                                  for ($j=0;$j<count($Genre) ; $j++) { 
                                  
                                  echo '<OPTION  value="" >'.$Genre[$j].'</OPTION>'; 
                       
                                 }  echo "</SELECT><br/>";
                                 $gen++;
              }
              if ($generer_dim[$i]=="Type_client" and $T_client==0) {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';  
                                    for ($j=0;$j<count($Type_client) ; $j++) { 
                                    
                                    echo '<OPTION  value="" >'.$Type_client[$j].'</OPTION>'; 

                                   }  echo "</SELECT><br/>";
                                   $T_client++;

              }
              if ($generer_dim[$i]=="Mois" and $moi==0) {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';  
                                  echo '<OPTION  value="" >Janvier</OPTION>'; 
                                  echo '<OPTION  value="" >Fevrier</OPTION>';
                                  echo '<OPTION  value="" >Mars</OPTION>';
                                  echo '<OPTION  value="" >Avril</OPTION>';
                                  echo '<OPTION  value="" >Mai</OPTION>';
                                  echo '<OPTION  value="" >Juin</OPTION>';
                                  echo '<OPTION  value="" >Juiller</OPTION>';
                                  echo '<OPTION  value="" >Aout</OPTION>';
                                  echo '<OPTION  value="" >Septembre</OPTION>';
                                  echo '<OPTION  value="" >Octobre</OPTION>';
                                  echo '<OPTION  value="" >Novembre</OPTION>';
                                  echo '<OPTION  value="" >Decembre</OPTION>';
                                  echo "</SELECT><br/>";
                                  $moi++;

              }

              if ($generer_dim[$i]=="Annee" and $ann==0) {
              echo $generer_dim[$i].' <input type="text" name="machin[]" value="1"/><br>'; 
              $ann++;
              }

              if ($generer_dim[$i]=="Periode" and $per==0) {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">'; 
                                  for ($j=0;$j<count($Periode) ; $j++) { 
                                  
                                  echo '<OPTION  value="" >'.$Periode[$j].'</OPTION>'; 
                            
                                 }  echo "</SELECT><br/>";
                                 $per++;

              }
              if ($generer_dim[$i]=="Banque" and $ban==0) {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';
                                  for ($j=0;$j<count($Banque) ; $j++) { 
                                  
                                  echo '<OPTION  value="" >'.$Banque[$j].'</OPTION>'; 

                                 }  echo "</SELECT><br/>";
                                 $ban++;

              }
              if ($generer_dim[$i]=="Pays" and $pay==0) {
                    for ($j=0;$j<count($Pays) ; $j++) { 
                    
                    echo '<OPTION  value="" >'.$Pays[$j].'</OPTION>'; 
       
                   }  echo "</SELECT><br/>";
                   $pay++;
              }
              if ($generer_dim[$i]=="Age" and $age==0) {
                
                                  echo $generer_dim[$i].'<input type="text" name="machin[]" value="1"/><br>';
                                  $age++;

              }
              if ($generer_dim[$i]=="Type_compte" and $T_compte==0) {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';  
                                  for ($j=0;$j<count($Type_compte) ; $j++) { 
                                  
                                  echo '<OPTION  value="" >'.$Type_compte[$j].'</OPTION>'; 

                                 }  echo "</SELECT><br/>";
                                 $T_compte++;

              }
              if ($generer_dim[$i]=="Regions" and $reg==0) {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';  
                                  for ($j=0;$j<count($Regions) ; $j++) { 
                                  
                                  echo '<OPTION  value="" >'.$Regions[$i].'</OPTION>'; 

                                 }  echo "</SELECT><br/>";
                                 $reg++;

              }

              if ($generer_dim[$i]=="Categorie_s" and $cat==0) {
                                echo $generer_dim[$i].' <SELECT name="nom" size="1">';
                                for ($j=0;$j<count($Categorie_s) ; $j++) { 
                                
                                echo '<OPTION  value="" >'.$Categorie_s[$j].'</OPTION>'; 

                               }  echo "</SELECT><br/>";
                               $cat++;
              }
              if ($generer_dim[$i]=="Type_Assura" and $T_assura==0) {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';
                                  for ($j=0;$j<count($Type_Assura) ; $j++) { 
                                  
                                  echo '<OPTION  value="" >'.$Type_Assura[$j].'</OPTION>'; 
                                 
                                 }  echo "</SELECT><br/>";
                                 $T_assura++;

              }
           
     }      
// git remote add github https://github.com/serignembow/ETLInterface.git
//  git remote -v
// git push -f github master
?>
 




<input id="envoie" type="submit" value="Executer" />
</fieldset>
</form>
</body>
</html>