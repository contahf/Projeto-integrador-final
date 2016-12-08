<?php
session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }
    if ($_SESSION['tipo'] =='P') {
         header('location:index.php');
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

    <title>TI Resolve 2016</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

     <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript">


       
    </script>

</head>

<body>

    <div id="wrapper">

      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                
                <a class="navbar-brand" href="index.html">T.I Resolve</a>
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
            <!-- /.row -->
            <div class="row">
               
                <!-- /.col-lg-6 -->
               <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Historico de projetos do aluno 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Tema Projeto</th>
                                            <th>Nota</th>
					    <th>Ano</th>
					    <th>Semestre</th>
                                           
                                        </tr>
                                    </thead>
                                 
<?php 

require_once 'conect.php';    


        $sql = "SELECT a.nome,p.tema, r.nota, p.ano, p.semestre
	FROM curso c, projeto p, grupo g, participa r, aluno a
	where c.numero = p.num_curso and p.numero = g.num_proj and g.id = r.id_grupo and r.matricula = a.matricula and a.matricula = '".$_POST['matricula']."' order by p.ano desc";
	
                  

        $consulta = pg_query($con, $sql);
        
        $linhas = pg_num_rows($consulta); 
                                
        for($i=0; $i<$linhas; $i++){  
            $dados = pg_fetch_row($consulta);       
                echo "<tr id='".trim($dados[0])."'>
                        <td>".$dados[0] . "</td>
                        <td>".$dados[1] . "</td>
                        <td >".$dados[2] . "</td>
                        <td>".$dados[3] . "</td>
                        <td >".$dados[4] . "</td>
                   
                    </tr>";
        }
                                        
                                        
?>
                                   
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
   
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

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Dados do curso</h4>
      </div>
      <div class="modal-body">
       
        <form id="frm-Modal" method="POST" action="updateDis.php" name="frm-Modal">
            
            <div class="form-group col-lg-6" id="fNome">
                <label>Nome</label>
                <input type="text" class="form-control" name="txtNome" id="txtNome">
                                            
            </div>
                                        
            <div class="form-group col-lg-3" id="fCarga">
                <label>C.H</label>
                <input type="text" name="txtCarga" id="txtCarga" class="form-control">

            </div>
            <div class="form-group col-lg-2" id="fCodigo">
                
                <input type="hidden" class="form-control has-success" name="txtCod" id="txtCod">     

            </div>
                
            <div class="clearfix"></div>
                <div id="foot" class="modal-footer">
                    <a href="editarDis.php"  ><button type="button" class="btn btn-default" data-dismiss="">Voltar</button></a>    
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
                                        
        </form>  
      </div>      
  </div>
</div>
