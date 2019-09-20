<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "french-zip-code2");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql = "SELECT * FROM regions";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>code</th>";
        echo "<th>name</th>";
        echo "<th>slug</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['code'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['slug'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>



<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "french-zip-code2";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('failed to connect to mysql database' . mysqli_connect_error());
}
$sql = "SELECT * FROM regions";
$query = mysqli_query($conn, $sql);

if (!$query) {
    die('error found' . mysqli_error($conn));
}
echo "<table>";
echo "<tr>";
echo "<th>id</th>";
echo "<th>code</th>";
echo "<th>name</th>";
echo "<th>slug</th>";
echo "</tr>";
while ($row= mysqli_fetch_array($query))
{
    $regionname = $row['slug'];
    
}
?>

<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "french-zip-code2";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('failed to connect to mysql database' . mysqli_connect_error());
}
$sql = "SELECT * FROM departments";
$query = mysqli_query($conn, $sql);

if (!$query) {
    die('error found' . mysqli_error($conn));
}
echo "<table>";
echo "<tr>";
echo "<th>id</th>";
echo "<th>region_code</th>";
echo "<th>code</th>";
echo "<th>name</th>";
echo "<th>slug</th>";
echo "</tr>";
while ($row= mysqli_fetch_array($query))
{
    $code=$row['code'];
    $departementname = $row['slug'];
    
}
?>