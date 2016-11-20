<?php  

    session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }

    if($_SESSION['tipo'] != 'C'){
        
        die("Entre em contato com o Cordenador");
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


        $(document).ready(function() {
    
             $('form').submit(function(event) {

                event.preventDefault();
            
       
                $.ajax({
                   
                    type        : 'POST', 
                    url         : 'inserirUsuario.php',  
                    data        :  $('form').serialize(), 
                    dataType    : 'json', 
                    encode      : true
                    
                })

                
       
                .done(function(data) {
                                   
                    if (data.success == "1") {

                        $('form').each (function(){
                            this.reset();
                        });
 
                        var alerta = '<div class="alert alert-success fade in">' + 
                            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong>Success!</strong> Cadastrado com sucesso!' + 
                            '</div>'
                          $('#container').empty().append(alerta);


                    }
                    if (data.outros == "-2") {
 
                        var alerta = '<div class="alert alert-danger fade in">' + 
                            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong>Fatal!</strong> Erro fatal!' + 
                            '</div>'
                          $('#container').empty().append(alerta);

                    }

                    if (data.n == "10") {

                        $('#dNome').addClass("has-error")
                    }

                    if (data.lo == "13") {

                        $('#dLogin').addClass("has-error")
                    }

                })



                .fail(function(){
                    alert('Ajax Submit Failed ...'); 
                });
   
    });

});

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
                
                <a class="navbar-brand" href="#">T.I Resolve</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               
                     <li><a href="editUser.php"><i class="fa fa-edit fa-fw"></i> Editar usuario</a>
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
                                            <a href="removeUser.php">Usuario</a>
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
                                <li>
                                    <a href="#">Remover cadastro <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="removeUser.php">Usuario</a>
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
           </br>
            <!-- /.row -->
            <div class="row">
            <div id="container"></div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dados Pessoais
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="">
                                    <form method="post">
                                        <div class="form-group col-lg-5" id="dNome">
                                            <label>Nome completo</label>
                                            <input class="form-control" name="nome" id="nome">
                                            
                                        </div>
                                        <div class="form-group col-lg-1" >
                                            <label>Categoria</label>
                                            <select class="form-control selectpicker" name="categoria" id="categoria">
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


                                        <div class="form-group col-lg-3" id="dLogin">
                                            <label>Login</label>
                                            <input class="form-control" name="login" id="login" placeholder="Login">
                                        </div>
                                        <div class="form-group col-lg-2" id="dPass">
                                            <label>Senha</label>
                                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
                                        </div>
                                        <div class="form-group col-lg-2" id="dPass2">
                                            <label>Confirmar senha</label>
                                            <input type="password" name="novaSenha" id="novaSenha" class="form-control" placeholder="Senha" oninput="validar(this)" >
                                        </div>
                                        </div>
                                         <div class="clearfix"></div>

                                        <button type="submit" class="btn btn-default">Gravar</button>
                                        <button type="reset" class="btn btn-default">Cancelar</button>

                                                                            
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
