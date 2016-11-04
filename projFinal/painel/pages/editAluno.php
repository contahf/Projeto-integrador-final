
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
                
                <a class="navbar-brand" href="index.html">TI resolve</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown">
                
                <li><a href="out.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>

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
                                    <a href="cadUser.php">Novo usuario</a>
                                </li>
                                <li>
                                    <a href="cadAluno.php">Novo Aluno</a>
                                </li>
                                <li>
                                    <a href="#">Remover cadastro <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Usuario</a>
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
                                    <a href="projeto.php">Novo Projeto</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                     
                      
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
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
                                    <form action="confEditAluno.php" method="post">
                                        <div class="form-group col-lg-5">
                                            <label>Nome </label>
                                            <input class="form-control" name="txtNome" value="<?php echo $_SESSION['ID'];?>">
                                            
                                        </div>
                                        <div class="form-group col-lg-3" >
                                            <label>Data de nasc.</label>
                                            <input type="date" name="txtNasc" class="form-control" required="" value="<?php echo $_SESSION['nasc'];?>" >
                                            
                                        </div>
                                        <div class="form-group col-lg-2" >
                                        
                                        <label>Sexo:</label><br>
                                            <label class="radio-inline">
                                            <input type="radio" name="txtSexo" id="txtSexo" value="m" <?php if($_SESSION['sexo'] == "m") echo 'checked' ; ?>>M
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" id="txtSexo" name="txtSexo" value="f" <?php if($_SESSION['sexo'] == "f") echo 'checked' ; ?>>F
                                            </label>
                                        </div>
                                        <div class="clearfix"></div>
                                         <div class="form-group col-lg-2" >
                                            <label>Cidade</label>
                                            <input type="numeric" class="form-control" name="txtCidade" required="" value="<?php echo $_SESSION['ID_CID'];?>" >
                                            
                                        </div>
                                       
                                        <div class="form-group col-lg-1" >
                                            <label for="estado">UF:</label>
                                            <select class="form-control selectpicker" name="estado" id="estado">
                                                <option value=""> </option>
                                                <option <?php if ($_SESSION['UF'] == 'AC' ) echo 'selected' ; ?> value="AC">AC</option>
                                                <option <?php if ($_SESSION['UF'] == 'AL' ) echo 'selected' ; ?> value="AL">AL</option>
                                                <option <?php if ($_SESSION['UF'] == 'AP' ) echo 'selected' ; ?> value="AP">AP</option>
                                                <option <?php if ($_SESSION['UF'] == 'AM' ) echo 'selected' ; ?> value="AM">AM</option>
                                                <option <?php if ($_SESSION['UF'] == 'BA' ) echo 'selected' ; ?> value="BA">BA</option>
                                                <option <?php if ($_SESSION['UF'] == 'CE' ) echo 'selected' ; ?> value="CE">CE</option>
                                                <option <?php if ($_SESSION['UF'] == 'DF' ) echo 'selected' ; ?> value="DF">DF</option>
                                                <option <?php if ($_SESSION['UF'] == 'ES' ) echo 'selected' ; ?> value="ES">ES</option>
                                                <option <?php if ($_SESSION['UF'] == 'GO' ) echo 'selected' ; ?> value="GO">GO</option>
                                                <option <?php if ($_SESSION['UF'] == 'MA' ) echo 'selected' ; ?> value="MA">MA</option>
                                                <option <?php if ($_SESSION['UF'] == 'MT' ) echo 'selected' ; ?> value="MT">MT</option>
                                                <option <?php if ($_SESSION['UF'] == 'MS' ) echo 'selected' ; ?> value="MS">MS</option>
                                                <option <?php if ($_SESSION['UF'] == 'MG' ) echo 'selected' ; ?> value="MG">MG</option>
                                                <option <?php if ($_SESSION['UF'] == 'PA' ) echo 'selected' ; ?> value="PA">PA</option>
                                                <option <?php if ($_SESSION['UF'] == 'PB' ) echo 'selected' ; ?> value="PB">PB</option>
                                                <option <?php if ($_SESSION['UF'] == 'PR' ) echo 'selected' ; ?> value="PR">PR</option>
                                                <option <?php if ($_SESSION['UF'] == 'PE' ) echo 'selected' ; ?> value="PE">PE</option>
                                                <option <?php if ($_SESSION['UF'] == 'PI' ) echo 'selected' ; ?> value="PI">PI</option>
                                                <option <?php if ($_SESSION['UF'] == 'RN' ) echo 'selected' ; ?> value="RN">RN</option>
                                                <option <?php if ($_SESSION['UF'] == 'RS' ) echo 'selected' ; ?> value="RS">RS</option>
                                                <option <?php if ($_SESSION['UF'] == 'RJ' ) echo 'selected' ; ?> value="RJ">RJ</option>
                                                <option <?php if ($_SESSION['UF'] == 'RO' ) echo 'selected' ; ?> value="RO">RO</option>
                                                <option <?php if ($_SESSION['UF'] == 'RR' ) echo 'selected' ; ?> value="RR">RR</option>
                                                <option <?php if ($_SESSION['UF'] == 'SC' ) echo 'selected' ; ?> value="SC">SC</option>
                                                <option <?php if ($_SESSION['UF'] == 'SP' ) echo 'selected' ; ?> value="SP">SP</option>
                                                <option <?php if ($_SESSION['UF'] == 'SE' ) echo 'selected' ; ?> value="SE">SE</option>
                                                <option <?php if ($_SESSION['UF'] == 'TO' ) echo 'selected' ; ?> value="TO">TO</option>
                                            </select>
                                            
                                        </div>
                                        <div class="clearfix"></div>
                                        
                    <!-- 3250-7600 -->                  <div class="form-group col-lg-3">
                                            <label>Matricula</label>
                                            <input type="text"  name="txtMat" class="form-control " 
                                            value="<?php echo $_SESSION['ID_MAT'];?>" disabled >
                                            
                                        </div>


                                         <div class="clearfix"></div>
                                         
                                         <div class="container">
                                            <button type="submit" class="btn btn-default">Atualizar</button>
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




