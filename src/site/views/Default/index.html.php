<h1>Home Page - 1</h1>
<?php 
foreach ($countries as $value) {
    ?>
    <p>
        <strong>Pays</strong> : <?php echo $value->name; ?> - <em><?php echo $value->iso_code; ?></em>
    </p>
    <?php
}
?>