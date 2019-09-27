<?php include "formatpage/navbar.php";?>
<?php

/* Delete a content */

require "config.php";
require "common.php";

if (isset($_GET["id"])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);

        $id = $_GET["id"];

        $sql = "DELETE FROM users WHERE id = :id";

        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $success = "User successfully deleted";
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
try {
    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * FROM users";

    $statement = $connection->prepare($sql);
    $statement->execute();

    $result = $statement->fetchAll();
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>

<?php require "formatpage/header.php";?>
<div class="update">
  <h2>Supprimer du contenu</h2>
  <?php if ($success) {
            echo $success;
        }else{
          echo "en attente de suppression";
        }
  ?>

  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>texte</th>
        <th>titre</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($result as $row): ?>
        <tr>
          <td><?php echo escape($row["id"]); ?></td>
          <td><?php echo escape($row["texte"]); ?></td>
          <td><?php echo escape($row["titre"]); ?></td>
          <td><a href="delete.php?id=<?php echo escape($row["id"]); ?>">Delete</a></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
<a href="index.php">Back to home</a>

<?php require "formatpage/footer.php";?>