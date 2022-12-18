<form action='./pw_generator.php' method='GET' enctype='multipart/form-data'>
    <p><input type='text' name='pw'> Password</p>
    <p><input class='project-submit button-primary' type='submit' value='Generate Password'/></p>
</form>

<?php
    $options = [
    'cost' => 12,
    ];
    echo "<br>Password to encrypt: {$_GET['pw']}";
    echo "<br>Encrypted Password: " . password_hash($_GET['pw'], PASSWORD_BCRYPT, $options);
?>

