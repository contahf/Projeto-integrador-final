
<?php
    
    session_start();

    $ret = "";

    $login = addslashes($_POST['login']);
    $aux = addslashes($_POST['senha']);

    $senha = md5($aux);

        if(isset($login) && !empty($login) && isset($senha) && !empty($senha)) {

            require_once 'conect.php';

            $sql = "select * from usuario where login = '".$login."' and senha = '".$senha."'";
            $result = pg_query($con, $sql);

            if(pg_num_rows($result) > 0 ){
                

                $arrayLista = pg_fetch_array($result);
                
                $login = $arrayLista['login'];
                $senha = $arrayLista['senha'];
                $nome = $arrayLista['nome'];
                $categoria = $arrayLista['categoria'];
                $situacao = $arrayLista['situacao'];

        
                $_SESSION['login'] = $login;
                $_SESSION['senha'] = $senha;
                $_SESSION['tipo']  = $categoria;
                $_SESSION['sit'] = $situacao;
             

                if($_SESSION['sit'] == "I"){
                    
                    $ret = "-1";

                }else{
                    
                    $ret = true;

                }


             
             }else{
                
                $ret = "-2";
             
             }

        }else{
         
            $ret = "-3";
        }

echo (json_encode($ret));                     
        
?>






