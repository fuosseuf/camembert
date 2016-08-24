<h1>Home Page</h1>
<?php
$reponse = App\core\AppCore::getInstance()->getDb()->query("SELECT * FROM country", "App\src\site\models\Country");
foreach ($reponse as $value) {
    ?>
    <p>
        <strong>Pays</strong> : <?php echo $value->name; ?> - <em><?php echo $value->iso_code; ?></em>
    </p>
    <?php
}
?>