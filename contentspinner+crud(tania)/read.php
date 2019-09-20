<?php include "formatpage/navbar.php";?>
<?php

if (isset($_POST['submit'])) {
    try {
        require "config.php";
        require "common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT *
        FROM users
        WHERE titre = :titre";

        $titre = $_POST['titre'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':titre', $titre, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>
<?php include "formatpage/header.php";?>


<?php
if (isset($_POST['submit'])) {
    if ($result && $statement->rowCount() > 0) {?>
      <h2>Results</h2>
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>texte</th>
            <th>titre</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $row) {?>
            <tr>
             <td><?php echo escape($row["id"]); ?></td>
             <td><?php echo escape($row["texte"]); ?></td>
             <td><?php echo escape($row["titre"]); ?></td>
            </tr>
          <?php }?>
        </tbody>
      </table>
      <?php } else {?>
        >>> No results found for <?php echo escape($_POST['titre']); ?>.
          <?php }
}?>
<h2>Find user based on titre</h2>
<form method="post">
      <label for="titre">titre</label>
      <input type="text" id="titre" name="titre">
      <input type="submit" name="submit" value="View Results">
</form>
<a href="index.php">Back to home</a>
<?php include "formatpage/footer.php";?>