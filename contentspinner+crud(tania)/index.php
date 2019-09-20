<?php include "formatpage/navbar.php";?>
<?php include "formatpage/header.php";?>
<link rel="stylesheet" href="C:\xampp\htdocs\crudtaniarascia\css\style2.css" />
<br>
<div class="container-fluid">
  <div class="row">
    <div class="partie offset-2 col-3 ">
      <br>
      <ul>
        <li>
          <a href="create.php" class="text"><strong>Crée un contenue</strong></a>
        </li>
      </ul>
    </div>
    <div class="partie offset-1 col-3">
      <br>
        <ul>
          <li>
            <a href="read.php"class="text"><strong>Lire les contenues</strong></a>
          </li>
       </ul>
    </div>
    <div class="partie2 offset-2 col-3">
    </div>
    <div class="partie2 offset-2 col-3">
    </div>
    <div class="partie offset-2 col-3">
      <br>
      <ul>
        <li>
          <a href="update.php"class="text"><strong>Mettre à jour un contenue</strong></a>
        </li>
      </ul>
    </div>
    <div class="partie offset-1 col-3">
      <br>
      <ul>
        <li>
          <a href="delete.php"class="text"><strong>Supprimer du contenue</strong></a>
        </li>
      </ul>
    </div>
  </div>
</div>

<?php
try {
    require "config.php";
    require "common.php";

    $connection = new PDO($dsn, $username, $password, $options);
    $getinfo =" SELECT * FROM `villes_france_free` ORDER BY `ville_departement` ASC";
    $statement = $connection->prepare($getinfo);
    $statement->execute();
    $result = $statement->fetchAll();
} catch (PDOException $error) {
    echo $getinfo . "<br>" . $error->getMessage();
}
echo $getinfo;
?>





<?php include "formatpage/footer.php";?>