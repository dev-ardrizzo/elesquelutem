
<?php

// Handle or file that contain the core
require $_SERVER['DOCUMENT_ROOT']."/elesquelutem/php/core.php";

?>


<h1>Lado Cliente</h1>


<form id="login" method="POST">

    <h1>Faça seu login</h1>
	<input type="text" name="requestsContent" placeholder="O que voce deseja?" />

    <select name="requestsTime" id="">
        <option value="0">1 Dias</option>
        <option value="1">3 Dias</option>
        <option value="2">7 Dias</option>
    </select>

	<input type="submit" value="Entrar">

</form>


<?php

    $request = new request();
    $request->insert();

?>