
<?php/*
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "french-zip-code2";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('failed to connect to mysql database' . mysqli_connect_error());
}

    $sql = "SELECT * FROM cities";
    $query = mysqli_query($conn, $sql);
    $sql1 = "SELECT * FROM departments";
    $query1 = mysqli_query($conn, $sql1);
    $sql3= "SELECT * FROM cities INNER JOIN departments WHERE cities.department_code = departments.code";
    $sql4= "SELECT * FROM departments INNER JOIN cities WHERE departments.code = cities.department_code";

    $query3 = mysqli_query($conn, $sql3);
    $query4 = mysqli_query($conn, $sql4);

  
        if (!$query4) {
            die('error found' . mysqli_error($conn));
        }
        if ($query4){
        echo "table cities";
        echo "<table>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>department_code</th>";
        echo "<th>insee_code</th>";
        echo "<th>zip_code</th>";
        echo "<th>name</th>";
        echo "<th>slug</th>";
        echo "<th>gps_lat</th>";
        echo "<th>gps_lng</th>";
        echo "</tr>";
        
        echo "table departments";
        echo "<table>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>region_code</th>";
        echo "<th>code</th>";
        echo "<th>name</th>";
        echo "<th>slug</th>";
        echo "</tr>";}
        
        while ($row3 = mysqli_fetch_array($query4))  {
            $code = $row3['code'];
            $departementname = $row3['slug'];
     
                $codedepartement = $row3['department_code'];
                $codeinsee = $row3['insee_code'];
                $codepostale = $row3['zip_code'];
                $ville = $row3['name'];
                $villesansaccent = $row3['slug'];
                $lattitude = $row3['gps_lat'];
                $longitude = $row3['gps_lng'];
    
                //echo $ville ." ==> ". $codepostale." ==> ".$departementname." ==> ".$codedepartement."<br>";
            }    

*/?>
<!--
hello everyone actually i have multiple table in my database and 
i wanted to get several element from both table and link them in a special way , 
for exemple display each cities from same department -->
