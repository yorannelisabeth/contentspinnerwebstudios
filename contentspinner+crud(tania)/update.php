<?php include "formatpage/navbar.php";?>
<?php
/* List all users with a link to edit */

try {
    require "config.php";
    require "common.php";

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
  <h2>Mettre à jour le contenu</h2>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>texte</th>
        <th>titre</th>
      </tr>
    </thead>
      <tbody>
        <?php foreach ($result as $row): ?>
          <tr>
            <td><?php echo escape($row["id"]); ?></td>
            <td><?php echo escape($row["texte"]); ?></td>
            <td><?php echo escape($row["titre"]); ?></td>
            <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>
          </tr>
        <?php endforeach;?>
      </tbody>
  </table>
  <a href="index.php">Back to home</a>
</div>
<?php require "formatpage/footer.php";?>