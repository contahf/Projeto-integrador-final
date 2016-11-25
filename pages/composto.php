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

                                      
        var ds = { <?php
            
           require_once 'conect.php';

            if ($con) {

                $sql = "SELECT * from disciplina ORDER by codigo";
                $consulta = pg_query($con, $sql);
        
                $linhas = pg_num_rows($consulta); 
                                
                for($i=0; $i<$linhas; $i++){  
                    $dados = pg_fetch_row($consulta);       
                    echo $i . ":'" . $dados[0] ."',";

                }                                  
            }
            ?> null:'' }


        var fillDisciplina = function(sel) {
            if(sel.selectedIndex >= 0) {
                document.getElementById('teste').value = ds[ sel.selectedIndex ]
            }


        }

        var projeto = { <?php
           
            require_once 'conect.php';
           
            if ($con) {

                $sql = "SELECT * from projeto";
                $consulta = pg_query($con, $sql);
        
                $linhas = pg_num_rows($consulta); 
                                
                for($i=0; $i<$linhas; $i++){  
                    $dados = pg_fetch_row($consulta);       
                    echo $i . ":'" . $dados[0] ."',";

                }                                  
            }

            ?> null:'' }

            var fillProjeto = function(sel2) {
                 if(sel2.selectedIndex >= 0) {
                    document.getElementById('id_proj').value = projeto[ sel2.selectedIndex ]
                    
                    
                }


            }


            $(document).ready(function() {
    
             $('form').submit(function(event) {

                event.preventDefault();
       
                $.ajax({
                    type        : 'POST', 
                    url         : 'cadComposto.php',  
                    data        :  $('form').serialize(), 
                    dataType    : 'json', 
                    encode      : true
                    
                })

                
       
                .done(function(data) {
                    
                  
                    if (data.proj == "10") {

                        $('#fProj').addClass("has-error")


                    }
                    if (data.dis == "11") {

                        $('#fDis').addClass("has-error")


                    }
                    if (data.desc == "12") {

                        $('#fDesc').addClass("has-error")


                    }

                    if (data.success == "ok") {

                        $('form').each (function(){
                            this.reset();
                        });
                         
                         var alerta = '<div class="alert alert-success fade in">' + 
                            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong>Success!</strong> Cadastrado com sucesso!' + 
                            '</div>'
                          $('#container').empty().append(alerta); 

                        
                    }else if (data.success == "-1") {

                        var alerta = '<div class="alert alert-danger fade in">' + 
                            '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong></strong> Falha ao cadastrar!' + 
                            '</div>'
                          $('#container').empty().append(alerta); 

                    }

                
                })

                .fail(function(){
                    console.log() 
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
                            Descrição das atividades


                        </div>
                        <!-- /.panel-heading -->
                        <form name="formProj" action="cadComposto.php" method="POST">
                            <div class="panel-body">
                                <!-- Nav tabs -->
                               

                                <!-- Tab panes -->
                                <div class="tab-content">

                                    <div>
                                        
                                                   <div class="form-group col-lg-3" id="fProj">
                                            <label>Tema do projeto</label>
                                            <select class="form-control selectpicker"  onchange="fillProjeto(this)" id="txtSel">
<?php 

    require_once 'conect.php';
     //$sql = "select * from curso c, projeto p where p.num_curso = c.numero";
    $sql = "select * from projeto";
    $consulta = pg_query($con, $sql);
        
    $linhas = pg_num_rows($consulta); 
                             
    for($i=0; $i<$linhas; $i++){  
        
      
        $dados = pg_fetch_row($consulta); 
              
        echo "<option>".$dados[6]."</option>
                        ";
    } 
    echo "<option selected>---</option>";                                 
        
?>
       
                                            </select>
<div>    
    <input type="hidden" class="form-control" id="id_proj" name="p">
</div>

                                        </div>

                                               <div class="form-group col-lg-3" id="fDis">
                                            <label>Disciplina</label>
                                            <select class="form-control selectpicker"  onchange="fillDisciplina(this)" >
<?php 

    require_once 'conect.php';
    
    $sql = "SELECT * from disciplina ORDER by codigo";
    $consulta = pg_query($con, $sql);    
    $linhas = pg_num_rows($consulta); 
                                
    for($i=0; $i<$linhas; $i++){  
        $dados = pg_fetch_row($consulta);

            echo "<option>".$dados[1]."</option>
                        ";
    } 
    echo "<option selected>---</option>";                                 
    
?>
                                            </select>

<div class="clearfix"></div>   
<div >    
    <input type="hidden" class="form-control" id="teste" name="d">
</div>
  

                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="row">
                                              <div class="col-lg-12">
                                                    <h1 class="page-header"></h1>
                                                </div>
                                        </div>
                                        <h4>Descrição</h4>
                                        <div class="form-group col-lg-6" id="fDesc">
                                            <textarea class="form-control" rows="3" name="txtDesc" id="txtDesc"></textarea>

                                        </div><br>
                                        

                                    </div>
                                
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-lg-6">
                                    <button type="submit" class="btn btn-default">Gravar</button>
                                        <a href="index.php"><button type="button" class="btn btn-default">Cancelar</button></a> 
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
