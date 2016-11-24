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
            
        function verificachars(){
            
            var obj = document.getElementById('txtTema').value          
                if(obj.length > 100){
                     alert("Voce ultrapassou o limite de caracteres!");
                    return false;  
                }    
        }

        function seguir(){
            
            var obj2 = document.getElementById('txtTema').value
            var obj3 = document.getElementById('txtDesc').value
            if(obj2 == "" || obj3 == ""){
                window.alert('Campos em branco!');
                window.location.href = 'cadProjeto.php'; 
            }
            
            

        }    

                                                         
            
        var cursos = { <?php
            
            require_once 'conect.php';

            $sql = "SELECT * from curso ORDER by numero";
            $consulta = pg_query($con, $sql);
        
            $linhas = pg_num_rows($consulta); 
                                
            for($i=0; $i<$linhas; $i++){  
                $dados = pg_fetch_row($consulta);       
                echo $i . ":'" . $dados[0] ."',";

            }                                  
            
            ?> null:'' }


        var fillCurso = function(sel) {
            if(sel.selectedIndex >= 0) {
                document.getElementById('curso').value = cursos[ sel.selectedIndex ]
            }


        }


        $(document).ready(function() {
    
             $('form').submit(function(event) {

                event.preventDefault();

       
                $.ajax({
                    type        : 'POST', 
                    url         : 'p.php',  
                    data        :  $('form').serialize(), 
                    dataType    : 'json', 
                    encode      : true
                    
                })

                
       
                .done(function(data) {
                    
                    if (data.d == "10") {
                         var alerta = '<div class="alert alert-warning fade in">' + 
                            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong>Datas não conferem!</strong>!' + 
                            '</div>'
                          $('#container').empty().append(alerta);
                    }
                    if(data.a == "11"){

                        $('#an').addClass("has-error")

                    }
                    if (data.s == "12") {

                        $('#semestre').addClass("has-error")
                    }

                    if (data.d1 == "13") {

                        $('#dIni').addClass("has-error")
                    }
                    if (data.d2 == "14") {

                        $('#dFim').addClass("has-error")
                    }

                    if(data.success == "ok"){

                        var alerta = '<div class="alert alert-success fade in">' + 
                            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong>Success!</strong> Cadastrado com sucesso!' + 
                            '</div>'
                          $('#container').empty().append(alerta); 
                    }

                    if(data.erros == "15"){

                        var alerta = '<div class="alert alert-danger fade in">' + 
                            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong>Falhou!</strong>!' + 
                            '</div>'
                          $('#container').empty().append(alerta); 
                    }

                    if(data.erros == "16"){

                        var alerta = '<div class="alert alert-danger fade in">' + 
                            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong>Erro fatal!</strong>!' + 
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
                
                <a class="navbar-brand" href="index.php">T.I Resolve</a>
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
                            Cadastro de projetos

                        </div>
                        <!-- /.panel-heading -->
                        <form name="formProj" action="p.php" method="POST">
                            <div class="panel-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#home" data-toggle="tab">Tema/Desc.</a>
                                    </li>
                                    <li><a href="#profile" data-toggle="tab" id="fil" onclick="seguir()">Perfil</a>
                                    </li>
                                   
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">

                                    <div class="tab-pane fade in active" id="home">
                                        <h4>Tema</h4>
                                        <div class="form-group col-lg-6">
                                            <textarea class="form-control" rows="1" placeholder="No maximo 100 caracteres" name="txtTema" id="txtTema" OnKeyUp="return verificachars()" ></textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                        <h4>Descrição</h4>
                                        <div class="form-group col-lg-6">
                                            <textarea class="form-control" rows="3" name="txtDesc" id="txtDesc"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane fade" id="profile">
                                    <br>
                                        <div class="form-group col-lg-2" id="an">
                                            <label>Ano</label>
                                            <input type="number" class="form-control" max="2050" name="txtAno">
                                                
                                        </div>
                                        <div class="form-group col-lg-2" id="semestre">
                                            <label>Semestre</label>
                                            <input type="number" class="form-control" name="txtSem" min="1" max="2">
                                                
                                        </div>
                                        <div class="form-group col-lg-2" >
                                            <label>Modulo</label>
                                            <select class="form-control selectpicker" name="txtMod">
                                                <option>I</option>
                                                <option>II</option>
                                                <option>III</option>
                                                <option>IV</option>
                                                <option>V</option>    
                                            </select>
                                        </div>
                                          <div class="form-group col-lg-3" >
                                            <label>Curso</label>
                                            <select class="form-control selectpicker" id="txtNum" name="txtNum" onchange="fillCurso(this)">
<?php 

    require_once 'conect.php';
    
        $sql = "SELECT * from curso ORDER by numero";
        $consulta = pg_query($con, $sql);
        
        $linhas = pg_num_rows($consulta); 
                                
        for($i=0; $i<$linhas; $i++){  
            $dados = pg_fetch_row($consulta);       
            echo "<option>".$dados[1] . "</option>";

        }                                  


?>
                                            </select>
                                        </div>
                                       
                                        <div class="clearfix"></div>
                                        <div class="form-group col-lg-3" id="dIni">
                                            <label>Data Inicio</label>
                                            <input type="date" class="form-control" name="txtDtIni" OnKeyUp="return verificaData()">
                                                
                                        </div>
                                        <div class="form-group col-lg-3" id="dFim">
                                            <label>Data Fim</label>
                                            <input type="date" class="form-control" name="txtDtFim">
                                                
                                        </div>
                                        <div class="form-group col-lg-3">
                                           <!-- <label>Curso</label>-->
                                            <input type="hidden" class="form-control" name="curso" id="curso">
                                                
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="container">
                                            <button type="submit" class="btn btn-default">Gravar</button>
                                           <a href="index.php"><button type="button" class="btn btn-default">Cancelar</button></a> 
                                        </div>
                                    </div>
                                
                                </div>
                            </div>

                        </form>

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
             
                <!-- /.col-lg-6 -->
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

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
