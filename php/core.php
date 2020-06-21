<?php

session_start();

$idSessao = $_SESSION["id"];



class login {

	public function __construct() {        

        require $_SERVER['DOCUMENT_ROOT']."/elesquelutem/classes/banco.php";

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


	public function insert() {

        if (isset($_POST["requestsContent"]) && empty($_POST["requestsContent"]) == false ) {

            require $_SERVER['DOCUMENT_ROOT']."/elesquelutem/classes/banco.php";

            global $idSessao;
            $requestsContent = $_POST["requestsContent"];
            $requestsTime = $_POST["requestsTime"];
            $getCheckTime = date(DATE_ATOM);


            $banco->query("INSERT INTO requests SET
                requestsUserId = '$idSessao',
                requestsContent = '$requestsContent',
                requestsTime = '$requestsTime',
                requestCheckTime = '$getCheckTime'
            ");

            header("Location: dashboard");
        }
    }
    

    public function userRequests() {
        
        global $idSessao;

        require $_SERVER['DOCUMENT_ROOT']."/elesquelutem/classes/banco.php";
        
        $banco->query("SELECT * FROM requests WHERE requestsUserId = '$idSessao'");
        
        foreach ($banco->result() as $dados ){

            echo "<a class='user-requests' href='ticket?ticketId=".$dados['requestsId']."'>";
            echo "<div class='tag-area'>";
            echo "<span class='ticket'>Ticket: #".$dados["requestsId"]."</span>";
            $this->transformDays($dados["requestsTime"]);
            echo "</div>";
            echo "<h2>".$dados["requestsContent"]."</h2>";
            echo $dados["requestCheckTime"];
            echo "</a>";

        }

    }


    public function currentRequest() {
        
        global $idSessao;
        $getCurrentRequest = $_GET["ticketId"];

        require $_SERVER['DOCUMENT_ROOT']."/elesquelutem/classes/banco.php";
    
        $banco->query("SELECT * FROM requests WHERE requestsUserId = '$idSessao' and requestsId = '$getCurrentRequest'");
        
        foreach ($banco->result() as $dados ){

            echo "<div class='tag-area'>";
            echo "<span class='ticket'>Ticket: #".$dados["requestsId"]."</span>";
            $this->transformDays($dados["requestsTime"]);
            echo "</div>";
            echo "<h2>".$dados["requestsContent"]."</h2>";
            echo $dados["requestCheckTime"];

        }


    }


    public function transformDays($option){
        if ($option == 0) {
            echo "<span class='ticket'>Prazo: 1 Dia</span>";
        } elseif ($option == 1) {
            echo "<span class='ticket'>Prazo: 3 Dias</span>";
        } elseif ($option == 2) {
            echo "<span class='ticket'>Prazo: 7 Dias</span>";
        }
    }




}





?>