<?php
session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }
    if ($_SESSION['tipo'] !='C') {
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

    <script type="text/javascript">
    

        function acaoExcluir(matricula){
            var t = matricula.trim();
            matricula = t;
            if(window.confirm('Deseja excluir esta disciplina?')){
                dado = 'txtMat=' + matricula;
                $.get('removeAluno.php', dado, tratarExclusao)
                .fail( function(){
                    alert('falhou');
                }
                )
                ;
                return false;
            }
        }



        function tratarExclusao(dado){
            var t = dado.trim();
            if(!t){
                alert('Não conseguiu excluir');
            }else{

                $('#'+t).remove();

                var teste = '<div class="alert alert-info fade in">' + 
        '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
        '<strong>Info!</strong> Registro removido com sucesso.' + 
      '</div>'
                $('#container').empty().append(teste);      
            }
        }
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
                   
                 <ul class="nav" id="side-menu">
                      
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                          
                         <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Aluno<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="listarAluno.php">Listar </a>
                                </li>
						
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                         <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Usuário<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
                                    <a href="editUser.php">Listar </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-book fa-fw"></i>Curso<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="editarCurso.php">Listar </a>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       <li>
                            <a href="#"><i class="fa fa-book fa-fw"></i>Disciplina<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="editarDis.php">Listar </a>
                                </li>
				
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="fa fa-table fa-fw"></i>Relatórios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="falta">Alunos e notas</a>
                                </li>
								<li>
                                    <a href="falta.php">Projetos </a>
                                </li>
								<li>
                                    <a href="falta.php">Grupos do projeto</a>
                                </li>
								<li>
                                    <a href="falta.php">Histórico dos projetos do aluno</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Informações<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="removeDis.php">Sobre o projeto</a>
                                </li>
                                <li>
                                    <a href="dis.php">Autores</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        
                    </ul>


                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <br>
            <!-- /.row -->
            <div class="row">
               
                <div id="container" ></div>
               <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Alunos(a)
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Matricula</th>
                                            <th>Nome</th>
                                            <th>Sexo</th>
                                             <th>Data Nasc.</th>
                                             <th>Cidade</th>
                                             <th>UF</th>
                                             <th>Editar</th>
                                             <th>Remover</th>
                                        </tr>
                                    </thead>
                                 
<?php 
 
 include 'conect.php';   

    if ($con) {

        $sql = "SELECT * from aluno ORDER BY matricula ";

        $consulta = pg_query($con, $sql);
        
        $linhas = pg_num_rows($consulta); 
                                
            for($i=0; $i<$linhas; $i++){  
                $dados = pg_fetch_row($consulta);

                  echo "<tr id='".trim($dados[0])."'> 
                        <td>".trim($dados[0])."</td>
                        <td>".$dados[1]."</td>
                        <td>".$dados[2]."</td>
                        <td>".$dados[3]."</td>
                        <td>".$dados[4]."</td>
                        <td>".$dados[5]."</td>
                        <td><a href='editAluno.php?mat=".$dados[0]."&nome=".$dados[1]."&sx=".$dados[2]."&nas=".$dados[3]."&cid=".$dados[4]."&uf=".$dados[5]."'><i class='fa fa-edit fa-fw'></i></a></td>
                        <td><a href='#?' onclick='acaoExcluir(\"".trim($dados[0])."\")'><i class='fa fa-trash fa-fw'></i></a></td>
                    </tr>";
            } 
    }else{
        echo "Verifique sua conexão com o banco";
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
                     <a href="cadAluno.php"><button type="button" class="btn btn-link">Novo Aluno</button></a>
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
