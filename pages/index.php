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
        
        var l = '<?php echo $_SESSION['tipo']; ?>';

        $(function() {
            
            if (l == 'C' || l == 'G') {
            
                document.getElementById('p1').style.display = "block";
                document.getElementById('p2').style.display = "block";
                document.getElementById('p3').style.display = "block"; 
                document.getElementById('disp').style.display = "block"; 
                document.getElementById('re').style.display = "block"; 
                document.getElementById('no').style.display = "block";
                document.getElementById('us').style.display = "block"; 
                document.getElementById('li').style.display = "block";
                document.getElementById('di').style.display = "block";
                document.getElementById('gr').style.display = "block";
                document.getElementById('pa').style.display = "block";
                document.getElementById('grp').style.display = "block";     
                document.getElementById('nota').style.display = "block";
                document.getElementById('pr').style.display = "block";
                document.getElementById('hi').style.display = "block"; 
                document.getElementById('alu').style.display = "block"; 
                
            
            }
            if (l == 'P') {

                        var alerta =  '<div class="alert alert-info">' + 
    '<strong></strong> Clique em Notas para cadastrar.<a href="#" class="alert-link"></a>' + 
  '</div>';

                          
                          $('#p1').before(alerta);
                document.getElementById('no').style.display = "block";

                
            }    
        });


        
    </script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                
                <a class="navbar-brand" href="#">T.I Resolve</a>
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
                            <a href="#"><i class="fa fa-graduation-cap fa-fw"></i> <?php 
    echo" Bem vindo " . $_SESSION['login'];
    ?></a>
                        </li>
                          
                          <li style="display: none;" id="alu">
                            <a href="#"><i class="fa fa-user fa-fw "></i> Aluno<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                        
                                    <a href="listarAluno.php">Listar </a>
                              
                                </li>
						
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                         <li style="display: none;" id="us">
                            <a href="#"><i class="fa fa-user fa-fw"></i> Usuário<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
								<li>
                                    <a href="editUser.php">Listar </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li style="display: none;" id="li">
                            <a href="#"><i class="fa fa-book fa-fw"></i>Curso<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="editarCurso.php">Listar </a>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       <li style="display: none;" id="di">
                            <a href="#"><i class="fa fa-edit fa-fw"></i>Disciplina<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="editarDis.php">Listar </a>
                                </li>
				
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
			             <li style="display: none;" id="gr">
                            <a href="#"><i class="fa fa-users fa-fw"></i>Grupo<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="cadGrupo.php">Cadastrar grupo </a>
                                </li>
				            <li>
                                    <a href="Cadparticipa.php">Vincular aluno ao grupo </a>
                                </li>
				
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
			             <li style="display: none;" id="no">
                            <a href="#"><i class="fa fa-book fa-fw"></i>Notas<span class="fa arrow"></span></a>
                    
                            <ul class="nav nav-second-level">
                                <li >
                                    <a href="cadNota.php">Cadastrar nota aluno </a>
                                </li>    
                            </ul>

                        </li>
			             <li style="display: none;" id="re">
                            <a href="#"><i class="fa fa-table fa-fw"></i>Relatórios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="relAluno.php">Alunos e notas</a>
                                </li>
								<li>
                                    <a href="falta.php">Projetos </a>
                                </li>
								<li>
                                    <a href="falta.php">Grupos do projeto</a>
                                </li>
								<li >
                                    <a href="falta.php">Histórico dos projetos do aluno</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
                        <li >
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


                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <br>
            <div class="row">
                
                <div class="col-lg-3 col-md-6" style="display: none;" id="p1">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-4x"></i>
                                </div>
                                
                                  <div class="col-xs-9 text-center">
                                    <div class="h3">Aluno</div>
                                </div>
                        
                            </div>
                        </div>
                        <a href="listarAluno.php">
                            <div class="panel-footer">
                                <span class="pull-left">Listar Alunos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" style="display: none;" id="p2">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-center">
                                    <div class="h3">Usuário</div>
                                </div>
                            </div>
                        </div>
                        <a href="editUser.php">
                            <div class="panel-footer">
                                <span class="pull-left">Listar Usuários</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" style="display: none;" id="p3">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-book fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-center">
                                    <div class="h3">Curso</div>
                                </div>
                            </div>
                        </div>
                        <a href="editarCurso.php">
                            <div class="panel-footer">
                                <span class="pull-left">Listar Cursos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" id="disp" style="display: none;">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-edit fa-4x"></i>
                                </div>
                                <div class="col-xs-9 text-center">
                                    <div class="h3">Disciplina</div>
                                </div>
                            </div>
                        </div>
                        <a href="editarDis.php">
                            <div class="panel-footer" >
                                <span class="pull-left">Listar Disciplinas</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
           


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
