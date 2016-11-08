
<?php 
 
    $strCon = "host=localhost dbname=projetointegrador port=5432 user=senac password=senac123";

    $con = pg_connect($strCon);
    

    if ($con) {


        $tema= $_POST['txtTema'];
        $desc = $_POST['txtDesc'];
        $ano = $_POST['txtAno'];
        $semestre = $_POST["txtSem"];
        $mod = $_POST['txtMod'];
        $curso = $_POST['txtNum'];
        $data1 = $_POST['txtDtIni'];
        $data2 = $_POST['txtDtFim'];


      
        
        $sql = "select c.nome from curso c where  c.numero = '". $curso ."'";

        $consulta = pg_query($con, $sql);
 
        $linhas = pg_num_rows($consulta);

        if($linhas > 0 ){
            $sql="";
            $sql = "INSERT INTO projeto (ano, semestre, modulo, dt_inicio, dt_termino, tema, descricao, num_curso) VALUES ('".$ano."', '".$semestre."', '".$mod."','".$data1."','".$data2."', '".$tema."' , '".$desc."' , '".$curso."');";
             var_dump($sql);
           
            $res = pg_query($con, $sql);

            $qtd_linhas = pg_affected_rows($res);

            if ($qtd_linhas > 0){
               echo "

                    <script type='text/javascript'>                                          

                        window.alert('Cadastro realizado!');
                        window.location.href = '#'; 

                                                                        
                        
                    </script>


               ";
               pg_close($con);
        
            }else{
                echo "falhou";
                 echo $sql;

            }

            
         
         }else{

            echo "<div class='alert alert-danger'>
  <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
</div>";
         }

                

    }else{
         die("Impossivel conectar!");
    }


?>