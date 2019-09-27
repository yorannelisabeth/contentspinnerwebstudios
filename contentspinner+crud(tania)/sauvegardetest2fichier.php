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
    ini_set('max_execution_time', 300);
    set_time_limit(300);
    $populationdata = file_get_contents('population-francaise-par-departement-2018.json');
    $myfile = json_decode($populationdata, true);
    $cities = file_get_contents('cities.json');
    $doc = json_decode($cities, true);
    foreach ($myfile as $record) {
        $name = $record['fields']['departement'];
        $size = count($myfile);
        $size2 = count($name);
        $thepopulation = $record['fields']['population'];
        $codedepartement = $record['fields']['code_departement'];
    
        for ($i = 0; $i <= $size2 - 1; $i++) {

            try {
                $variable = $_POST['texte'];
                $spinvariable = spin($variable);

                $search = array(":name", ":population",":codedepartement"); 
                $replacers = array($name, $thepopulation ,$codedepartement);
                
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

    foreach ($doc as $getdata) {
        
        
        $ville = $getdata['name'];
        $size4 = count($ville);
        $zipcode = $getdata['zip_code'];
    
        for ($i = 0; $i <= $size4 - 1; $i++) {

            try {
                $variable2 = $_POST['texte'];
                $spinvariable2 = spin($variable2);

                $search2 = array(":ville", ":codepostale"); 
                $replacers2 = array($ville, $zipcode );
                
                $txt2 = str_replace($search2, $replacers2, $spinvariable2 );
                echo $txt2, '<br />';
                
                $con = getDatabaseConnexion();
                $sql = "INSERT INTO users (texte, titre) VALUES ('$txt2')";
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


Hello wilders 
