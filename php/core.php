<?php


class login {

	public function __construct() {        
    
        include $_SERVER['DOCUMENT_ROOT']."/elesquelutem/classes/banco.php";

        if(isset($_POST['userEmail']) && empty($_POST['userEmail']) == false) {

            $userEmail = addslashes($_POST['userEmail']);
            $userPassword = addslashes($_POST['userPassword']);
        
            $banco->query("SELECT * FROM users WHERE userEmail = '$userEmail' and userPassword = '$userPassword'");    
    
            if ($banco->numRows() > 0){
        
                foreach ($banco->result() as $dados ){
                    $_SESSION["id"] = $dados["userId"];
                    $_SESSION["dashboardSide"] = $dados["userType"];
                }
                echo "<script> window.location.replace('dashboard')</script>";
        
            } else {
                echo "O usuário não está correto :(";
            }
        }   
    }
}

class request {

    public function __construct() {
        // Debugging this run
    }

	public function insert() {
            
        include $_SERVER['DOCUMENT_ROOT']."/elesquelutem/classes/banco.php";

        if (isset($_POST["requestsContent"]) && empty($_POST["requestsContent"]) == false ) {

            $idSessao = $_SESSION["id"];
            $requestsContent = addslashes($_POST['requestsContent']);
            $requestsTime = addslashes($_POST['requestsTime']);
            $getCheckTime = date(DATE_ATOM);

            $banco->query("INSERT INTO templates SET
                templateUserId = $idSessao,
                requestsContent = '$requestsContent',
                requestsTime = '$requestsTime',
                requestCheckTime = $getCheckTime
            ");

            header("Location: dashboard");
        }
	}

}





?>