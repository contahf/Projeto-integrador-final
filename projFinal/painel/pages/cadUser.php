<?php  

  include 'logout.php';
?>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">TI resolve</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    
                     <li><a href="removecad.html"><i class="fa fa-times fa-fw"></i> Remove Usuario</a>
                      <li><a href="../../Projeto-integrador-final/projFinal/out.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    
                </li>
                <!-- /.dropdown -->
            </ul>
   

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        
                        <li>
                            <a href="cadUser.php"><i class="fa fa-user fa-fw"></i> Cadastre-se</a>
                        </li>
                     
                      
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastre-se</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dados Pessoais
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="">
                                    <form method="post" action="super.php" name="frm2" role="form">
                                        <div class="form-group col-lg-5">
                                            <label>Nome completo</label>
                                            <input class="form-control" name="nome" id="nome" required="">
                                            
                                        </div>
                                        <div class="form-group col-lg-1" >
                                            <label>Categoria</label>
                                            <select class="form-control selectpicker" name="categoria" id="categoria">
                                                <option>--</option>
                                                <option>G</option>
                                                <option>P</option>
                                                <option>C</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-1" >
                                            <label>Situação</label>
                                            <select class="form-control selectpicker" name="situacao" id="situacao">
                                                <option>A</option>
                                                <option>I</option>
                                                
                                            </select>
                                        </div>
                                       
                                            
                                        </div>
                                        <div class="clearfix"></div>


                                        <div class="form-group col-lg-3">
                                            <label>Login</label>
                                            <input class="form-control" name="login" id="login" placeholder="Login">
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>Senha</label>
                                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha"></div>

                                        </div>
                                         <div class="clearfix"></div>

                                        <button type="submit" id="frm2" name="" class="btn btn-default">Gravar</button>
                                        <button type="reset" class="btn btn-default">Cancelar</button>

                                                                            
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                           
                                <!-- /.col-lg-6 (nested) -->
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
