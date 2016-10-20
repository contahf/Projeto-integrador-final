<?php  
include 'logout.php';
    
    $strCon = "host=localhost dbname=projetointegrador port=5432 user=senac password=senac123";

    $con = pg_connect($strCon);
    

    if ($con) {


        $Nome= $_POST["txtDis"];
        $carga = $_POST['txtCh'];
        $codigo = $_POST['txtCod'];
        
   
        
        $sql = "select * from disciplina where  nome = '". $Nome ."'";

        $consulta = pg_query($con, $sql);
 
        $linhas = pg_num_rows($consulta);

        if($linhas > 0 ){
     
             echo "

                    <script type='text/javascript'>                                          

                        window.alert('Ja cadastrado!');
                        window.location.href = 'dis.php'; 

                                                                        
                        
                    </script>


               ";
            
         
         }elseif ($linhas==0) {
            
            $sql = "INSERT INTO disciplina (codigo, nome, ch) VALUES ('".$codigo."', '".$Nome."', '".$carga."');";
           
            $res = pg_query($con, $sql);

            $qtd_linhas = pg_affected_rows($res);

            if ($qtd_linhas > 0){
                 echo "

                    <script type='text/javascript'>                                          

                        window.alert('Cadastro realizado!');
                        window.location.href = 'dis.php'; 

                                                                        
                        
                    </script>


               ";
        
            }

        

         }

                

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
                
                <a class="navbar-brand" href="index.html">TI resolve</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown">
                <li><a href="removeDis.php"><i class="fa fa-times fa-fw"></i> Remove disciplina</a>
                <li><a href="../../Projeto-integrador-final/projFinal/out.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>

            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        
                        <li>
                            <a href="index.php"><i class="fa fa-navicon"></i> Menu<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="cadCurso.php">Novo curso</a>
                                </li>
                                <li>
                                    <a href="cadAluno.php">Novo Aluno</a>
                                </li>
                                <li>
                                    <a href="dis.php">Nova Disciplina</a>
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
                            Dados da disciplina
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="">
                                    <form action="" method="post">
                                        <div class="form-group col-lg-5">
                                            <label>Nome </label>
                                            <input type="text" name="txtDis" id="txtDis" class="form-control" required="">
                                            
                                        </div>
                                        <div class="form-group col-lg-3" >
                                            <label>Ch</label>
                                            <input type="numeric" class="form-control" name="txtCh" required="">
                                            
                                        </div>
                                        <div class="form-group col-lg-3" >
                                            <label>Codigo</label>
                                            <input type="numeric" class="form-control" name="txtCod" required="">
                                            
                                        </div>


                                         <div class="clearfix"></div>
                                         
                                         <div class="container">
                                            <button type="submit" class="btn btn-default">Gravar</button>
                                            <button type="reset" class="btn btn-default">Cancelar</button>
                                    
                                         </div>

                                        

                                                                            
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
