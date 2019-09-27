   <?php
   require "common.php";


   function spin($txt)
   {
      $pattern = '#\{([^{}]*)\}#msi';
      $test = preg_match_all($pattern, $txt, $out);
      $toFind = array();
      $toReplace = array();
      foreach ($out[0] as $id => $match) {
         $choices = explode("~", $out[1][$id]);
         $toFind[] = $match;
         $toReplace[] = trim($choices[rand(0, count($choices) - 1)]);
      }
      return str_replace($toFind, $toReplace, $txt);
   }

   function getDatabaseConnexion()
   {
      try {
         $user = "root";
         $pass = "";
         $pdo = new PDO('mysql:host=localhost;dbname=test3', $user, $pass);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         return $pdo;
      } catch (PDOException $e) {
         print "Erreur !: " . $e->getMessage() . "<br/>";
         die();
      }
   }

   function process($param_txt){
      ini_set('memory_limit','2048M');
      ini_set('max_execution_time', 300);
      set_time_limit(300);
      $populationdata = file_get_contents('villes_france_free_final.json');
      $myfile = json_decode($populationdata, true);
   
      foreach ($myfile as $record) {
         $name = $record['ville_nom'];
         $population = $record['ville_population_2012'];
         $area = $record['ville_surface'];
         $zipCode = $record['ville_code_postal'];
         $departmentCode = $record['ville_densite_2010'];
         $size2 = count($name);
   
               for ($i = 0; $i <= $size2 - 1; $i++) {

               try {
                  $variable = $_POST['texte'];
                  $spinvariable = spin($variable);

                  $search = array(":ville",":population",":surface",":codepostale",":codedepartement"); 
                  $replacers = array($name,$population,$area,$zipCode,$departmentCode);
                  
                  $txt = str_replace($search, $replacers, $spinvariable );
                  echo $txt, '<br />';
                  
                  $con = getDatabaseConnexion();
                  $sql = "INSERT INTO users (texte, titre) VALUES ('$txt', '$name')";
                  $con->exec($sql);
               } catch (PDOException $e) {
                  echo $sql . "<br>" . $e->getMessage();

               }
               
         }
      
      }

      
   }

   // process();

   if( isset($_POST["submit"])){
      $texte = $_POST["texte"];
      process($texte);
   }?>
   <a href="index.php">retour à l'acceuil </a>


