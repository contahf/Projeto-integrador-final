<?php
session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }
    if ($_SESSION['tipo'] =='P') {
         header('location:index.php');
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
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  <script type="text/javascript">
      

        $(document).ready(function() {
    
             $('form').submit(function(event) {

                event.preventDefault();

                $.ajax({
                    type        : 'POST', 
                    url         : 'cadDis.php',  
                    data        :  $('form').serialize(), 
                    dataType    : 'json', 
                    encode      : true
                    
                })

                
       
                .done(function(data) {
            
                    if (data.success != "1") {
                            
                        if(data.nome == "-1"){
                            $('#fNome').addClass("has-error")
                        }
                        
                        if(data.carga == "-2"){
                            $('#fCh').addClass("has-error")
                        }

                        if(data.codigo == "-3"){
                            $('#fCod').addClass("has-error")
                        }
                        if (data.contem == "-4") {
                            var alerta = '<div class="alert alert-warning fade in">' + 
                            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong></strong> Já cadastrado!' + 
                            '</div>'
                          $('#container').empty().append(alerta); 
                        }
                   

                    } else if (data.success == "1") {
                        
                        $('form').each (function(){
                            this.reset();
                        });
 
                        var alerta = '<div class="alert alert-success fade in">' + 
                            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong></strong> Cadastrado com sucesso!' + 
                            '</div>'
                          $('#container').empty().append(alerta); 
                        }

                })

                .fail(function(){
                    console.log(); 
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
            <br>
            <div class="row">
            <div id="container"></div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dados da disciplina
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="">
                                    <form action="" method="post">
                                        <div class="form-group col-lg-5" id="fNome">
                                            <label>Nome </label>
                                            <input type="text" name="txtDis" id="txtDis" class="form-control" placeholder="Banco de dados" >
                                            
                                        </div>
                                        <div class="form-group col-lg-3" id="fCh">
                                            <label>Ch</label>
                                            <input type="numeric" placeholder="90" class="form-control" name="txtCh">
                                            
                                        </div>
                                        <div class="form-group col-lg-3" id="fCod">
                                            <label>Codigo</label>
                                            <input type="numeric" class="form-control" placeholder="1212" name="txtCod" >
                                            
                                        </div>


                                         <div class="clearfix"></div>
                                         
                                         <div class="container">
                                         	<button type="submit" class="btn btn-default">Gravar</button>
                                        	<button type="reset" class="btn btn-default">Limpar</button>
						<button type="reset" class="btn btn-default" onClick="history.go(-1)">Cancelar</button>  
                                    
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
