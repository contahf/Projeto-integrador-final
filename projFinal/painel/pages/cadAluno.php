
<?php 
 
    $strCon = "host=localhost dbname=projetointegrador port=5432 user=senac password=senac123";

    $con = pg_connect($strCon);
    

    if ($con) {


        $nome= $_POST['txtNome'];
        $matricula = $_POST['txtMat'];
        $nasc = $_POST['txtNasc'];
        $sex = $_POST["txtSexo"];
        $cidade = $_POST['txtCidade'];
        $uf = $_POST['estado'];

   
        
        $sql = "select * from aluno where  nome = '". $nome ."'";

        $consulta = pg_query($con, $sql);
 
        $linhas = pg_num_rows($consulta);

        if($linhas > 0 ){
     
            pg_close($con);
            include 'message.js';

            
         
         }elseif ($linhas==0) {
            $sql = "INSERT INTO aluno (matricula, nome, sexo, dtnasc, cidade, uf) VALUES ('".$matricula."', '".$nome."', '".$sex."','".$nasc."','".$cidade."', '".$uf."');";
            $res = pg_query($con, $sql);

            $qtd_linhas = pg_affected_rows($res);

            if ($qtd_linhas > 0){
               echo "

                    <script type='text/javascript'>                                          

                        window.alert('Cadastro realizado!');
                        window.location.href = 'cadAluno.php'; 

                                                                        
                        
                    </script>


               ";
                pg_close($con);
        
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
                                    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                        <div class="form-group col-lg-5">
                                            <label>Nome </label>
                                            <input class="form-control" name="txtNome" >
                                            
                                        </div>
                                        <div class="form-group col-lg-3" >
                                            <label>Data de nasc.</label>
                                            <input type="date" name="txtNasc" class="form-control" required="">
                                            
                                        </div>
                                        <div class="form-group col-lg-2" >
                                        <label>Sexo:</label><br>
                                            <label class="radio-inline">
                                            <input type="radio" name="txtSexo" value="m" checked>M
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="txtSexo" value="f" >F
                                            </label>
                                        </div>
                                        <div class="clearfix"></div>
                                         <div class="form-group col-lg-2" >
                                            <label>Cidade</label>
                                            <input type="numeric" class="form-control" name="txtCidade" required="">
                                            
                                        </div>
                                       
                                        <div class="form-group col-lg-1" >
                                            <label for="estado">UF:</label>
                                            <select class="form-control selectpicker" name="estado" id="estado">
                                                <option value="">--</option>
                                                <option value="AC">AC</option>
                                                <option value="AL">AL</option>
                                                <option value="AP">AP</option>
                                                <option value="AM">AM</option>
                                                <option value="BA">BA</option>
                                                <option value="CE">CE</option>
                                                <option value="DF">DF</option>
                                                <option value="ES">ES</option>
                                                <option value="GO">GO</option>
                                                <option value="MA">MA</option>
                                                <option value="MT">MT</option>
                                                <option value="MS">MS</option>
                                                <option value="MG">MG</option>
                                                <option value="PA">PA</option>
                                                <option value="PB">PB</option>
                                                <option value="PR">PR</option>
                                                <option value="PE">PE</option>
                                                <option value="PI">PI</option>
                                                <option value="RN">RN</option>
                                                <option value="RS">RS</option>
                                                <option value="JR">RJ</option>
                                                <option value="RO">RO</option>
                                                <option value="RR">RR</option>
                                                <option value="SC">SC</option>
                                                <option value="SP">SP</option>
                                                <option value="SE">SE</option>
                                                <option value="TO">TO</option>
                                            </select>
                                            
                                        </div>
                                        <div class="clearfix"></div>
                                        
                    <!-- 3250-7600 -->                  <div class="form-group col-lg-3">
                                            <label>Matricula</label>
                                            <input type="text" name="txtMat" class="form-control">
                                            
                                        </div>


                                         <div class="clearfix"></div>
                                         
                                         <div class="container">
                                            <button type="submit" class="btn btn-default">Gravar</button>
                                            <button type="reset" class="btn btn-default">Cancelar</button>
                                    
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




