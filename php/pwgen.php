

<form action='./sgos.php' method='GET' enctype='multipart/form-data'>
    <p><input type='text' name='pw'>
    <input type='hidden' name='site' value="pwgen">
    <input class='cyberbutton' type='submit' value='Generate Cypher'/></p>
</form>

<?php
    $options = [
    'cost' => 12,
    ];
    echo "<p class='typewriter'>To encrypt: {$_GET['pw']}</p>";
    echo "<p class='loosebreak blinkup-class'>Cypher: <br>" . password_hash($_GET['pw'], PASSWORD_BCRYPT, $options) . "</p>";
?>