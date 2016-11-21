<?php  
	
	$nome= addslashes($_POST['nome']);
	$categoria = addslashes($_POST['categoria']);
	$situacao = addslashes($_POST['situacao']);
	$login = addslashes($_POST['login']);
	$aux = addslashes($_POST['senha']);
	$senha = md5($aux);




	$errors = array();
    $data = array();

    if (empty($nome)){
        $errors['n'] = '10';
    }

    if (empty($categoria)){
        
        $errors['cat'] = '11';
    }

    if (empty($situacao)){

        $errors['si'] = '12';
    }

    if (empty($login)){

        $errors['lo'] = '13';
    }
    if (empty($senha)){

        $errors['pass'] = '14';
    }

    if (!empty($errors)) {
    
        $b = $errors;
        
    } else {

        require_once 'conect.php';    

            if ($con) {

				$sql = "select nome, login from usuario where login = '". $login ."'";

				$consulta = pg_query($con, $sql);
		 
				$linhas = pg_num_rows($consulta);

				if($linhas > 0 ){
		     
		    		$data['aviso'] = "-1";
		    		$b = $data;
					
				} elseif ($linhas==0) {
		         	
		    		$sql = "INSERT INTO usuario (nome,categoria,situacao,login,senha) VALUES ('".$nome."', '".$categoria."','".$situacao."', '".$login."', '".$senha."');";
		         	
		    		$res = pg_query ($con, $sql);

					$qtd_linhas = pg_affected_rows($res);

					if ($qtd_linhas > 0){
				
						$data['success'] = "1";
						$b = $data;
					}else{
					 
						$data['outros'] = "-2";
						$data;
					}
		        

				}

			}else{
		
				$data['others'] = "-3";
				$b = $data;
	
			}
    	
    	}

    $t = json_encode($b);
    echo $t;


?>
