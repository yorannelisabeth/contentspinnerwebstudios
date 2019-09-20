<?php include "formatpage/navbar.php";?>
<?php

/*  Use an HTML form to edit an entry in theusers table. */

require "config.php";
require "common.php";
if (isset($_POST['submit'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $user = [
            "id" => $_POST['id'],
            "texte" => $_POST['texte'],
            "titre" => $_POST['titre'],

        ];

        $sql = "UPDATE users
            SET id = :id,
              texte = :texte,
              titre = :titre

            WHERE id = :id";

        $statement = $connection->prepare($sql);
        $statement->execute($user);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
if (isset($_GET['id'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
} else {
    echo "Something went wrong!";
    exit;
}
?>

<?php require "formatpage/header.php";?>

<?php if (isset($_POST['submit']) && $statement): ?>
<?php echo escape($_POST['titre']); ?> successfully updated.
<?php endif;?>

<h2>Edit a user</h2>

<form method="post">
  <?php foreach ($user as $key => $value): ?>
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
      <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
  <?php endforeach;?>
    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>
<?php require "formatpage/footer.php";?>