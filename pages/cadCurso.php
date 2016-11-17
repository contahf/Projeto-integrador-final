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
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  <script type="text/javascript">
      

        $(document).ready(function() {
    
             $('form').submit(function(event) {

                event.preventDefault();
               
                var curso = $("#txtCurso").val();
                var numero = $("#txtNumero").val();
                var sigla = $("#txtSigla").val();
       
                $.ajax({
                    type        : 'POST', 
                    url         : 'cc.php',  
                    data        :  $('form').serialize(), 
                    dataType    : 'json', 
                    encode      : true
                    
                })

                
       
                .done(function(data) {
            
                    if (data != $("#txtNumero").val()) {
                            
                        if(data == "-1"){
                            
                            $('form').each (function(){
                                this.reset();
                            });
                            
                            var alerta = '<div class="alert alert-warning fade in">' + 
                                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                                '<strong>Warning!</strong> Já cadastrado!' + 
                              '</div>'
                            $('#container').empty().append(alerta);

                          

                            
                        
                        }
                        
                        if(data == "-2"){
                            
                            var alerta = '<div class="alert alert-danger fade in">' + 
                                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                                '<strong>Warning!</strong> Error desconhecido!' + 
                              '</div>'
                            $('#container').empty().append(alerta);  
                        }
                                                
                    } else {
                        
                        $('#frmCurso').each (function(){
                            this.reset();
                        });
 
                        var alerta = '<div class="alert alert-success fade in">' + 
                            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong>Success!</strong> Cadastrado com sucesso!' + 
                            '</div>'
                          $('#container').empty().append(alerta); 
                        }

                        $("#txtCurso").val("");
                        $("#txtNumero").val("");
                        $("#txtSigla").val("");
                })

                .fail(function(){
                    alert('Ajax Submit Failed ...'); 
                });
   
    });

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
                        <a href="editarCurso.php"><i class="fa fa-edit fa-fw"></i> Editar</a>
                    </li>
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
                                    <a href="#">Novo curso</a>
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
            <div class="row">
            </div>
            <br>
            <div id="container"></div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dados curso
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="">
                                    <form method="POST" action="" role="form" id="frmCurso">
                                        <div class="form-group col-lg-5">
                                            <label>Nome curso</label>
                                            <input class="form-control" placeholder="Seguraça da Informação" name="txtCurso" id="txtCurso">
                                            
                                        </div>
                
                                            
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label>Sigla</label>
                                            <input class="form-control" placeholder="S.I" name="txtSigla" id="txtSigla">
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label>Numero</label>
                                            <input type="number" class="form-control" placeholder="10" name="txtNumero" id="txtNumero"></div>

                                        </div>
                                         <div class="clearfix"></div>

                                        <button type="submit" class="btn btn-default">Gravar</button>
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
