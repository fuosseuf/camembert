<h1>Home Page - 1</h1>
<?php 
foreach ($user as $value) {
    ?>
    <p>
        <strong>Pays</strong> : <?php echo $value->name; ?> - <em><?php echo $value->email; ?></em>
    </p>
    <?php
}
?>