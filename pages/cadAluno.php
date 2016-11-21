 <?php

     session_start();

        if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
        {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            session_destroy();
            header('location:../index.html');
    }

    if ($_SESSION['tipo' == 'P'] || $_SESSION['tipo'] == 'p') {
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
               
                var n = $("#txtNome").val();
                var nas = $("#txtNasc").val();
                var sexo = $("#txtSexo").val();
                var cidade = $("#txtCidade").val();
                var uf = $("#txtEstado").val();
                var matri = $("#txtMat").val();
       
                $.ajax({
                    type        : 'POST', 
                    url         : 'aluno.php',  
                    data        :  $('form').serialize(), 
                    dataType    : 'json', 
                    encode      : true
                    
                })

                
       
                .done(function(data) {
            
                    if (data.success != $("#txtMat").val()) {
                            
                        if(data.existe == "-1"){
                            
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
                        
                        if (data.n == "10") {
                            
                            $('#fNome').addClass("has-error")
                        }
                         
                        if (data.nas == "12") {
                            
                            $('#fData').addClass("has-error")
                            
                        }

                        if (data.cid == "14") {
                            
                            $('#fCidade').addClass("has-error")
                            
                        }

                        if (data.mat == "11") {
                            
                            $('#fMat').addClass("has-error")
                            
                        }

                    } else {
                        
                        $('#frm-Aluno').each (function(){
                            this.reset();
                        });
 
                        var alerta = '<div class="alert alert-success fade in">' + 
                            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong>Success!</strong> Cadastrado com sucesso!' + 
                            '</div>'
                          $('#container').empty().append(alerta); 
                        }

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
                
                <a class="navbar-brand" href="#">TI resolve</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown">
               
                <li><a href="out.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>

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
                            Dados do aluno(a)
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="">
                                    <form action="aluno.php" method="post" id="frm-Aluno">
                                        <div class="form-group col-lg-5" id="fNome">
                                            <label>Nome </label>
                                            <input class="form-control" name="txtNome" id="txtNome" >
                                            
                                        </div>
                                        <div class="form-group col-lg-3" id="fData">
                                            <label>Data de nasc.</label>
                                            <input type="date" name="txtNasc" value="" class="form-control" id="txtNasc" >
                                            
                                        </div>
                                        <div class="form-group col-lg-2" >
                                        <label>Sexo:</label><br>
                                            <label class="radio-inline">
                                            <input type="radio" name="txtSexo" value="M" checked>M
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="txtSexo" value="F" id="txtSexo" >F
                                            </label>
                                        </div>
                                        <div class="clearfix"></div>
                                         <div class="form-group col-lg-2" id="fCidade">
                                            <label>Cidade</label>
                                            <input type="numeric" class="form-control" name="txtCidade" id="txtCidade" >
                                            
                                        </div>
                                       
                                        <div class="form-group col-lg-1" id="fEstado">
                                            <label for="estado">UF:</label>
                                            <select class="form-control selectpicker" name="estado" id="txtEstado" id="estado">
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
                                        <div class="form-group col-lg-3" id="fMat">
                                            <label>Matricula</label>
                                            <input type="text" name="txtMat" id="txtMat" class="form-control" minlength="15">
                                            
                                        </div>


                                         <div class="clearfix"></div>
                                         
                                         <div class="container">
                                            <button type="submit" class="btn btn-default">Gravar</button>
                                            <button type="reset" class="btn btn-default">Limpar</button>
					    <a href="listarAluno.php"><button type="button" class="btn btn-default">Cancelar</button></a>
                                    
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




