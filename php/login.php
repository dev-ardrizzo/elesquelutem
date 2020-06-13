<?php

// Handle or file that contain the core
require $_SERVER['DOCUMENT_ROOT']."/elesquelutem/php/core.php";

?>

<form id="login" method="POST">

    <h1>Faça seu login</h1>
	<input type="text" name="userEmail" placeholder="Digite seu e-mail" />
	<input type="password" name="userPassword" placeholder="Digite sua senha" />

	<input type="submit" value="Entrar">

</form>


<?php

$login = new login();

?>
