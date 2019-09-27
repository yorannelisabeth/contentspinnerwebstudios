
<?php include "formatpage/navbar.php";?>
<?php include "formatpage/header.php";?>

<h2 class="createtitle">Crée un texte et ajouter le </h2>
<div class="smallblock container-fluid ">
    <h3 class="createtitle offset-2">Votre texte</h3>
    <div class="offset-2">
        <form method="post" action="sauvegarde3.php">
       
            <br />
            <label for="texte" class="createtitle">collez votre texte ici:</label>
            <textarea id="textarea"  name="texte" rows="8" class="area  offset-2 col-8">
                Entrez votre texte ici:
            </textarea>
            <br />
            <input type="submit" name="submit" value="Envoyer" />
        </form>
    </div>
</div>
<a href="index.php">Back to home</a>

<?php include "formatpage/footer.php";



?>

