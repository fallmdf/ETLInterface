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
/*
//***************************** Les Departement  *****************************************
        $k=0;
        
echo $nom_colonne_dim[$k++].' <SELECT name="nom" size="1">';
for ($i=0;$i<count($Departement) ; $i++) { 
               
             echo '<OPTION  value="" >'.$Departement[$i].'</OPTION>';
             }  echo "</SELECT><br/>";

//***************************** Milieu *****************************************
echo $nom_colonne_dim[$k++].' <SELECT name="nom" size="1">';
for ($i=0;$i<count($Milieu) ; $i++) { 
              
              echo '<OPTION  value="" >'.$Milieu[$i].'</OPTION>'; 
   
             }  echo "</SELECT><br/>";

//***************************** type etablissement *****************************************
echo $nom_colonne_dim[$k++].' <SELECT name="nom" size="1">';
for ($i=0;$i<count($Type_etabli) ; $i++) { 
              
              echo '<OPTION  value="" >'.$Type_etabli[$i].'</OPTION>'; 
   
             }  echo "</SELECT><br/>";

//***************************** le Genre *****************************************
echo $nom_colonne_dim[$k++].' <SELECT name="nom" size="1">';
for ($i=0;$i<count($Genre) ; $i++) { 
              
              echo '<OPTION  value="" >'.$Genre[$i].'</OPTION>'; 
   
             }  echo "</SELECT><br/>";

//***************************** Type client *****************************************
echo $nom_colonne_dim[$k++].' <SELECT name="nom" size="1">';  
for ($i=0;$i<count($Type_client) ; $i++) { 
              
              echo '<OPTION  value="" >'.$Type_client[$i].'</OPTION>'; 

             }  echo "</SELECT><br/>";

//***************************** les Mois *****************************************
        echo $nom_colonne_dim[$k++].' <SELECT name="nom" size="1">';  
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

//***************************** input Annee *****************************************              
              echo $nom_colonne_dim[$k++].' <input type="text" name="machin[]" value="1"/><br>'; 

//***************************** Periode *****************************************           
 echo $nom_colonne_dim[$k++].' <SELECT name="nom" size="1">'; 
for ($i=0;$i<count($Periode) ; $i++) { 
              
              echo '<OPTION  value="" >'.$Periode[$i].'</OPTION>'; 
        
             }  echo "</SELECT><br/>";

//***************************** Banque *****************************************
echo $nom_colonne_dim[$k++].' <SELECT name="nom" size="1">';
for ($i=0;$i<count($Banque) ; $i++) { 
              
              echo '<OPTION  value="" >'.$Banque[$i].'</OPTION>'; 

             }  echo "</SELECT><br/>";

//***************************** Pays *****************************************
echo $nom_colonne_dim[$k++].' <SELECT name="nom" size="1">';  
for ($i=0;$i<count($Pays) ; $i++) { 
              
              echo '<OPTION  value="" >'.$Pays[$i].'</OPTION>'; 
 
             }  echo "</SELECT><br/>";



//***************************** input Age *****************************************
          echo $nom_colonne_dim[$k++].' <input type="text" name="machin[]" value="1"/><br>';  
 
//***************************** type compte *****************************************             
echo $nom_colonne_dim[$k++].' <SELECT name="nom" size="1">';  
for ($i=0;$i<count($Type_compte) ; $i++) { 
              
              echo '<OPTION  value="" >'.$Type_compte[$i].'</OPTION>'; 

             }  echo "</SELECT><br/>";

//***************************** Regions *****************************************
echo $nom_colonne_dim[$k++].' <SELECT name="nom" size="1">';  
for ($i=0;$i<count($Regions) ; $i++) { 
              
              echo '<OPTION  value="" >'.$Regions[$i].'</OPTION>'; 

             }  echo "</SELECT><br/>";

//***************************** Categorie *****************************************
echo $nom_colonne_dim[$k++].' <SELECT name="nom" size="1">';  
for ($i=0;$i<count($Categorie_s) ; $i++) { 
              
              echo '<OPTION  value="" >'.$Categorie_s[$i].'</OPTION>'; 

             }  echo "</SELECT><br/>";

//***************************** Type assurance *****************************************
echo $nom_colonne_dim[$k++].' <SELECT name="nom" size="1">';
for ($i=0;$i<count($Type_Assura) ; $i++) { 
              
              echo '<OPTION  value="" >'.$Type_Assura[$i].'</OPTION>'; 
             
             }  echo "</SELECT><br/>";
*/
     for ($i=0; $i <count($generer_dim) ;  $i++) {
      
              if ($generer_dim[$i]=="Departemen") {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';
                                  for ($j=0;$j<count($Departement) ; $j++) { 
                                   
                                 echo '<OPTION  value="" >'.$Departement[$j].'</OPTION>';
                                 }  echo "</SELECT><br/>";

              }
              if ($generer_dim[$i]=="Milieu") {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';
                                  for ($j=0;$j<count($Milieu) ; $j++) { 
                                  
                                  echo '<OPTION  value="" >'.$Milieu[$j].'</OPTION>'; 
                       
                                  }  echo "</SELECT><br/>";

              }
              if ($generer_dim[$i]=="Type_etabl") {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';
                                  for ($j=0;$j<count($Type_etabli) ; $j++) { 
                                  
                                  echo '<OPTION  value="" >'.$Type_etabli[$j].'</OPTION>'; 
                       
                                 }  echo "</SELECT><br/>";

              }
              if ($generer_dim[$i]=="Genre") {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';
                                  for ($j=0;$j<count($Genre) ; $j++) { 
                                  
                                  echo '<OPTION  value="" >'.$Genre[$j].'</OPTION>'; 
                       
                                 }  echo "</SELECT><br/>";

              }
              if ($generer_dim[$i]=="Type_clien") {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';  
                                    for ($j=0;$j<count($Type_client) ; $j++) { 
                                    
                                    echo '<OPTION  value="" >'.$Type_client[$j].'</OPTION>'; 

                                   }  echo "</SELECT><br/>";

              }
              if ($generer_dim[$i]=="Mois") {
                
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

              }

              if ($generer_dim[$i]=="Annee") {
              echo $generer_dim[$i].' <input type="text" name="machin[]" value="1"/><br>'; 
              }

              if ($generer_dim[$i]=="Periode") {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">'; 
                                  for ($j=0;$j<count($Periode) ; $j++) { 
                                  
                                  echo '<OPTION  value="" >'.$Periode[$j].'</OPTION>'; 
                            
                                 }  echo "</SELECT><br/>";

              }
              if ($generer_dim[$i]=="Banque") {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';
                                  for ($j=0;$j<count($Banque) ; $j++) { 
                                  
                                  echo '<OPTION  value="" >'.$Banque[$j].'</OPTION>'; 

                                 }  echo "</SELECT><br/>";

              }
              if ($generer_dim[$i]=="Pays") {
                    for ($j=0;$j<count($Pays) ; $j++) { 
                    
                    echo '<OPTION  value="" >'.$Pays[$j].'</OPTION>'; 
       
                   }  echo "</SELECT><br/>";
              }
              if ($generer_dim[$i]=="Age") {
                
                                  echo $generer_dim[$i].'<input type="text" name="machin[]" value="1"/><br>';

              }
              if ($generer_dim[$i]=="Type_compt") {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';  
                                  for ($j=0;$j<count($Type_compte) ; $j++) { 
                                  
                                  echo '<OPTION  value="" >'.$Type_compte[$j].'</OPTION>'; 

                                 }  echo "</SELECT><br/>";

              }
              if ($generer_dim[$i]=="Regions") {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';  
                                  for ($j=0;$j<count($Regions) ; $j++) { 
                                  
                                  echo '<OPTION  value="" >'.$Regions[$i].'</OPTION>'; 

                                 }  echo "</SELECT><br/>";

              }

              if ($generer_dim[$i]=="Type_Assur") {
                                for ($j=0;$j<count($Categorie_s) ; $j++) { 
                                
                                echo '<OPTION  value="" >'.$Categorie_s[$j].'</OPTION>'; 

                               }  echo "</SELECT><br/>";
              }
              if ($generer_dim[$i]=="Type_Assur") {
                
                                  echo $generer_dim[$i].' <SELECT name="nom" size="1">';
                                  for ($j=0;$j<count($Type_Assura) ; $j++) { 
                                  
                                  echo '<OPTION  value="" >'.$Type_Assura[$j].'</OPTION>'; 
                                 
                                 }  echo "</SELECT><br/>";

              }
           //echo $generer_dim[$i].'<br>';   
     }      

?>
 




<input id="envoie" type="submit" value="Executer" />
</fieldset>
</form>
</body>
</html>