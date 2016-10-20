<?php include 'logout.php'; ?>


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
                <li><a href="removeAluno.php"><i class="fa fa-times fa-fw"></i> Remover aluno(a)</a>
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
                            Dados do aluno(a)
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="">
                                    <form name="fmrMat" action="removeAluno.php" method="post"  role="form">
                                 
                                        
                                        <div class="form-group col-lg-3">
                                            <label>Matricula</label>
                                            <input type="text" name="txtMat" id="txtMat" class="form-control" required="">
                                            
                                        </div>


                                         <div class="clearfix"></div>
                                         
                                         <div class="container">
                                            <button type="submit" class="btn btn-default">Remover</button>
                                            <button type="reset" class="btn btn-default">Cancelar</button>
                                            
                                            <?php  
    
  
    $mat = $_POST['txtMat'];
    $strCon = "host=localhost dbname=projetointegrador user=senac password=senac123";
    $con = pg_connect($strCon);

    if($con){
    
        $sql = "select matricula from aluno where matricula = '". $mat ."'";
        $result = pg_query($con, $sql);

        if(pg_affected_rows($result) > 0){
            $sql = "";
            $sql = "DELETE FROM aluno WHERE matricula = " . "'" . $mat ."'";
            $result = "";
            $result = pg_query($con, $sql);

                if(pg_affected_rows($result) > 0){
        
                      echo "<script type='text/javascript'>
                                                                        
                         window.alert('Aluno(a) removido com sucesso!');
                       window.location.href = 'removeAluno.php'; 
                
                         </script>";
                }
        }
    }

//pg_close($con);


?>
                                    
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

