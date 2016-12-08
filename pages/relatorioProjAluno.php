<?php  

    session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ti resolve</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


     <script type="text/javascript">
            
      
                                                         
            
        var cursos = { <?php
            
            require_once 'conect.php';

            $sql = "SELECT * from curso ORDER by numero";
            $consulta = pg_query($con, $sql);
        
            $linhas = pg_num_rows($consulta); 
                                
            for($i=0; $i<$linhas; $i++){  
                $dados = pg_fetch_row($consulta);       
                echo $i . ":'" . $dados[0] ."',";

            }                                  
            
            ?> null:'' }


        var fillCurso = function(sel) {
            if(sel.selectedIndex >= 0) {
                document.getElementById('txtNumCurso').value = cursos[ sel.selectedIndex ]
            }


        }


       

    </script>

</head>

<body>
 <div id="wrapper">

        <!-- Navigation -->
         <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                
                <a class="navbar-brand" href="index.php">T.I Resolve</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               
                    
                    <li>
                        <a href="out.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                   
                 <?php   include "principal.html"; ?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
      
        <div id="page-wrapper">
        <br>
            <div class="row">
            <div id="container"></div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Historico dos projetos realizados por aluno

                        </div>
                        <!-- /.panel-heading -->
                        <form name="" action="relProjAluno.php" method="POST">
                            <div class="panel-body">
                               
                                <div class="tab-content">
                                  
                                    <br>
                                        
                                      
                                               <div class="form-group col-lg-2" >

						<label>Selecione um aluno </label> <br>
						<select name="matricula" class="form-control selectpicker">
						<option value=""></option>



					       <?php
						$strCon = "host=localhost dbname=projetointegrador user=senac password=senac123";
						$con = pg_connect($strCon);

						if($con){
							$sql = "SELECT * from aluno";
							$result = pg_query($con, $sql);
							$linhas = pg_num_rows($result); 
							for($i=0; $i<$linhas; $i++){  
								$dados = pg_fetch_row($result); 
								?>  
								<option name="ativo" value="<?php echo $dados[0]; ?>" /><?php echo $dados[1]; ?>
								<?php
							}


						}else{	
							echo "Conexao falhou!";
						}
						pg_close($con);


						?>
                                    
						</select>


                                            
                                        </div>
                                       

                                        <div class="clearfix"></div>
                                        <div class="container">
                                            <button type="submit" class="btn btn-default">Gerar</button>
                                           <a href="index.php"><button type="button" class="btn btn-default">Cancelar</button></a> 
                                        </div>
                                  
                                
                                </div>
                            </div>

                        </form>

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
             
                <!-- /.col-lg-6 -->
            </div>


            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
