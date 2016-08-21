<h1>About Page</h1>
<?php
$req = $bdd->prepare('SELECT name FROM country WHERE id = ?', array($_GET['id']), "App\src\site\models\Country");
var_dump($req)

    ?>