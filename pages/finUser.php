<?php  

    session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }


    if(!isset($_GET['l']) || empty($_GET['l'])){
        die("error");
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

    <script type="text/javascript"> 

        function validar (input){ 
            if (input.value != document.getElementById('senha').value) {
                input.setCustomValidity('Repita a senha corretamente');
            } else {
                input.setCustomValidity('');
             }
        }

    </script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
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
           </br>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dados Pessoais de :
                            <?php echo $_GET['l'];?>

                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="">
                                    <form method="post" action="teste.php" id="frm1" name="frm1" >
                                        <div class="form-group col-lg-4">
                                            <label>Nome completo</label>
                                            <input class="form-control" name="nome" id="nome" value="<?php echo $_GET['n']; ?>" required="">
                                            
                                        </div>
                                        <div class="form-group col-lg-2" >
                                            <label>Categoria</label>
                                            <select class="form-control selectpicker" name="categoria" id="categoria" value="">
                                                <option>--</option>
                                                <option <?php if ($_GET['cat'] == 'G' ) echo 'selected' ; ?> value="G" >G</option>
                                                <option <?php if ($_GET['cat'] == 'P' ) echo 'selected' ; ?>value="P" >P</option>
                                                <option <?php if ($_GET['cat'] == 'C' ) echo 'selected' ; ?> value="C" >C</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-1" >
                                            <label>Situação</label>
                                            <select class="form-control selectpicker" name="situacao" id="situacao" value="<?php echo $_GET['s']; ?>">
                                                <option value="">--</option>
                                                <option <?php if ($_GET['s'] == 'A' ) echo 'selected' ; ?> value="A" >A</option>
                                                <option <?php if ($_GET['s'] == 'I' ) echo 'selected' ; ?> value="I" >I</option>
                                                
                                            </select>
                                        </div>
                                       
                                            
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="form-group col-lg-2">
                                            <label>Senha</label>
                                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>Repita a senha</label>
                                            <input type="password" name="novaSenha" id="novaSenha" class="form-control" placeholder="Senha" oninput="validar(this)">
                                        </div>
                                         <div class="form-group col-lg-2">
                                            
                                            <input type="hidden" name="login" id="login" value="<?php echo $_GET['l']; ?>">
                                        </div>

                                        </div>
                                         <div class="clearfix"></div>

                                       <button type="submit" class="btn btn-default">Gravar</button>
					<button type="reset" class="btn btn-default" onClick="history.go(-1)">Cancelar</button>  
                                                                            
                                    </form>
                                    

                                </div>




                              </div>  
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




