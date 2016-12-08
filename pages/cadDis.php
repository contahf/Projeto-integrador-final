<?php  
    
    require_once 'conect.php';
    
    $data = array();

    if ($_POST["txtDis"]) {
        $Nome = $_POST["txtDis"];
    }
    $carga = $_POST['txtCh'];
    $codigo = $_POST['txtCod'];
    
    if (empty($Nome)) {
       
        $data['nome'] = "-1";
        
    }
    if (empty($carga)) {
        $data['carga'] = "-2";
    }       
    if (empty($codigo)) {
        $data['codigo'] = "-3";
    }
        
    $sql = "select * from disciplina where codigo = '". $codigo ."'";

    $consulta = pg_query($con, $sql);
 
    $linhas = pg_num_rows($consulta);

    if($linhas > 0 ){
        $data['contem'] = "-4";        
    }elseif ($linhas==0) {
            
            $sql = "INSERT INTO disciplina (codigo, nome, ch) VALUES ('".$codigo."', '".$Nome."', '".$carga."');";
           
            $res = pg_query($con, $sql);

            $qtd_linhas = pg_affected_rows($res);

            if ($qtd_linhas > 0){
                $data['success'] = "1"; 
            }
    }

    $ret = json_encode($data);
    echo $ret;

?>