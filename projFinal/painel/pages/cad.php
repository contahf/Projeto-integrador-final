<?php  

 if (isset($_POST['submit'])) {
        var_dump($_POST);
    } else {
        echo "AGUARDANDO";
    }
    
    $strCon = "host=localhost dbname=projetointegrador port=5432 user=senac password=senac123";

    $con = pg_connect($strCon);
    

    if ($con) {


        $nome= $_POST['txtNome'];
        $matricula = $_POST['txtMat'];
        $nasc = $_POST['txtNasc'];
        $sex = $_POST["txtSexo"];
        $cidade = $_POST['txtCidade'];
        $uf = $_POST['estado'];

   
        
        $sql = "select * from aluno where  nome = '". $nome ."'";

        $consulta = pg_query($con, $sql);
 
        $linhas = pg_num_rows($consulta);

        if($linhas > 0 ){
     
            include 'message.js';
            
         
         }elseif ($linhas==0) {
            $sql = "INSERT INTO aluno (matricula, nome, sexo, dtnasc, cidade, uf) VALUES ('".$matricula."', '".$nome."', '".$sex."','".$nasc."','".$cidade."', '".$uf."');";
            echo $sql;

            $res = pg_query($con, $sql);

            $qtd_linhas = pg_affected_rows($res);

            if ($qtd_linhas > 0){
                echo "<h2 class='text-success'>Cadastro realizado com sucesso</h2>";    
                echo "<a class='btn btn-primary' href='index.php' role='button'>Login</a>";
        
            }

        

         }

                

    }


?>