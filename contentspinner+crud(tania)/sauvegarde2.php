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

function process($param_txt)
{
    ini_set('memory_limit', '2048M');
    ini_set('max_execution_time', 300);
    set_time_limit(300);
    $franceDatabase = file_get_contents('ville_departement_france.json');
    $database = json_decode($franceDatabase, true);
  

    foreach ($database as $data) {
       
            $zipcode = $data['ville_code_postal'];
            $ville = $data['ville_nom_simple'];
            $citydepartment = $data['ville_departement'];
            $departement=$data['departement'];
            $size = count($ville);
        

                for ($i = 0; $i <= $size - 1; $i++) {

                    try {
                        $variable2 = $_POST['texte'];
                        $spinvariable2 = spin($variable2);

                        $search2 = array(":ville", ":codepostale", ":departement");
                        $replacers2 = array($ville, $zipcode, $departement);

                        $txt2 = str_replace($search2, $replacers2, $spinvariable2);
                        echo $txt2, '<br />';

                        $con = getDatabaseConnexion();
                        $sql = "INSERT INTO users (texte, titre) VALUES ('$txt2','$ville')";
                        $con->exec($sql);
                    } catch (PDOException $e) {
                        echo $sql . "<br>" . $e->getMessage();

                    }

                }

            }
        

    

}

// process();

if (isset($_POST["submit"])) {
    $texte = $_POST["texte"];
    process($texte);
}?>
    <a href="index.php">retour à l'acceuil </a>
