<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TI Resolve</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

      

        
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                
                <a class="navbar-brand" href="#">TI resolve</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown">
               
                <li><a href="../../Projeto-integrador-final/projFinal/out.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>

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
                            Dados do Grupo:
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="">
                                    <form action="nota.php" method="get">

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
					<div class="form-group col-lg-2">
                                            <label>Nota</label>
                                            <input class="form-control" name="txtNota" id="txtNota" required="">
                                            
                                        </div>
					
                          <div class="clearfix"></div>
                                         
                                         <div class="container">
                                            <button type="submit" class="btn btn-default">Gravar</button>
                                            <button type="reset" class="btn btn-default">Limpar</button>
					    <a href="listarAluno.php"><button class="btn btn-default">Cancelar</button>
                                    
                                         </div>
                                                                            
                                    </form>

                                </div>
                               
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>




