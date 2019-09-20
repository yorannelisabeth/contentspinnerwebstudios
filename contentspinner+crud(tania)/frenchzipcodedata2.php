
<?php
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

if (!$query) {
    die('error found' . mysqli_error($conn));
}
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
while ($row= mysqli_fetch_array($query))
{
    $codedepartement=$row['department_code'];
    $codeinsee = $row['insee_code'];
    $codepostale= $row['zip_code'];
    $ville= $row['name'];
    $villesansaccent= $row['slug'];
    $lattitude = $row['gps_lat'];
    $longitude = $row['gps_lng'];

    //echo $codepostale." est le code postale de la ville de ".$villesansaccent. " du département de ".$departementname."<br>";

}
?>

<?php
//si le code departement de cities est égale au code de de département display le echo 



?>