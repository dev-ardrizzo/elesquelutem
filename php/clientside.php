<?php $request = new request(); ?>


<form id="login" method="POST">

	<input type="text" name="requestsContent" placeholder="O que voce deseja?" />

    <select name="requestsTime" id="">
        <option value="0">1 Dias</option>
        <option value="1">3 Dias</option>
        <option value="2">7 Dias</option>
    </select>

	<input type="submit" value="Entrar">

    <?php $request->insert();?>

</form>




<section id="requests">
    <?php $request->userRequests();?>
</section>   