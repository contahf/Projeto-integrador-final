
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
                   
                 <ul class="nav" id="side-menu">
                      
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                          
                          <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Menu de cadastro<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="conCadUser.php">Novo usuario</a>
                                </li>
                                <li>
                                    <a href="cadAluno.php">Novo Aluno</a>
                                </li>
                                <li>
                                    <a href="#">Remover cadastro <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="editUser.php">Usuario</a>
                                        </li>
                                        <li>
                                            <a href="removeAluno.php">Aluno</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                         <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Menu de opções<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="cadCurso.php">Novo curso</a>
                                </li>
                                <li>
                                    <a href="dis.php">Nova Disciplina</a>
                                </li>
                                <li>
                                    <a href="grupo.php">Novo Grupo</a>
                                </li>
                                <li>
                                    <a href="modulo.php">Novo Modulo</a>
                                </li>
                                 <li>
                                    <a href="cadProjeto.php">Novo Projeto</a>
                                </li>
                                <li>
                                    <a href="#">Remover cadastro <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="editUser.php">Usuario</a>
                                        </li>
                                        <li>
                                            <a href="removeAluno.php">Aluno</a>
                                        </li>
                                        <li>
                                            <a href="editarDis.php">Disciplina</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
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


                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
      
        <div id="page-wrapper">
        <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Cadastro de projetos

                        </div>
                        <!-- /.panel-heading -->
                        <form name="formProj" action="p.php" method="POST">
                            <div class="panel-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#home" data-toggle="tab">Tema/Desc.</a>
                                    </li>
                                    <li><a href="#profile" data-toggle="tab">Perfil</a>
                                    </li>
                                   
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">

                                    <div class="tab-pane fade in active" id="home">
                                        <h4>Tema</h4>
                                        <div class="form-group col-lg-6">
                                            <textarea class="form-control" rows="1" placeholder="No maximo 100 caracteres" name="txtTema" OnKeyUp="return verificachars()" required="" ></textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                        <h4>Descrição</h4>
                                        <div class="form-group col-lg-6">
                                            <textarea class="form-control" rows="3" name="txtDesc" required=""></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="profile">
                                    <br>
                                        <div class="form-group col-lg-2">
                                            <label>Ano</label>
                                            <input type="number" class="form-control" required="" max="2050" name="txtAno">
                                                
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>Semestre</label>
                                            <input type="number" class="form-control" required="" name="txtSem" min="1" max="2">
                                                
                                        </div>
                                        <div class="form-group col-lg-2" >
                                            <label>Modulo</label>
                                            <select class="form-control selectpicker" name="txtMod">
                                                <option>I</option>
                                                <option>II</option>
                                                <option>III</option>
                                                <option>IV</option>
                                                <option>V</option>    
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>Numero do curso</label>
                                            <input type="number" class="form-control" name="txtNum" required="">
                                                
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group col-lg-3">
                                            <label>Data Inicio</label>
                                            <input type="date" class="form-control" name="txtDtIni" required="" OnKeyUp="return verificaData()">
                                                
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Data Fim</label>
                                            <input type="date" class="form-control" name="txtDtFim" required="">
                                                
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="container">
                                            <button type="submit" id="" class="btn btn-default">Gravar</button>
                                           <a href="index.php"><button type="button" class="btn btn-default">Cancelar</button></a> 
                                        </div>
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
