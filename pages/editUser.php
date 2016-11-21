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

    <title>TI Resolve 2016</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    <script type="text/javascript">
    

        function acaoExcluir(login){
            if(window.confirm('Deseja mesmo excluir este usuário?')){
                dado = 'l=' + login;
                $.get('removeUser.php', dado, tratarExclusao)
                .fail( function(){
                    alert('falhou');
                }
                )
                ;
                return false;
            }
        }



        function tratarExclusao(dado){
            var t = dado.trim();
            if(!t){
                alert('conexão não pode ser estabelecida');
            }else{
                
                $('#'+t).remove();

                var teste = '<div class="alert alert-success fade in">' + 
        '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
        '<strong>Success!</strong> Registro removido com sucesso.' + 
      '</div>'
                $('#container').empty().append(teste);      
            }
        }

        function acaoEditar(l){

            dado = 'txtLogin=' + l;
            
            $.ajax({
                
                type        : 'POST', 
                url         : 'u.valida.php',  
                data        :  dado, 
                dataType    : 'json', 
                encode      : true
                    
            })
            
            .done(function(dado){
                
                var inputLogin = dado.login
                var inputNome = dado.nome
                var inputPass = dado.senha
                var inputCat = dado.categoria
                var inputSit = dado.situacao

                document.getElementById('nome').value = inputNome
                document.getElementById('login').value = inputLogin
                document.getElementById('senha').value = inputPass
                document.getElementById('categoria').value = inputCat
                document.getElementById('situacao').value = inputSit

                
                $('#exampleModal').modal('show')

               
      
            })

            .fail(function(){
                console.log(); 
            });

        }

           $(function() { 
           
            $('#frm-Edit').on('submit', function(e) {
                e.preventDefault(); 
                
                $.ajax({
                    type        : 'POST', 
                    url         : 'e.user.php',  
                    data        :  $("#frm-Edit :input").serialize(), 
                    dataType    : 'json', 
                    encode      : true
                    
                }) 

            .done(function(data){
                
                if(data.success == "1"){
                     var alerta = '<div class="alert alert-success fade in">' + 
                            '<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong>Success!</strong> Atualizado com sucesso!' + 
                            '</div>'

                          $('#foot').before(alerta); 
                    
                }else if (data.erros == "-2") {
                    var alerta = '<div class="alert alert-danger fade in">' + 
                            '<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong>Warning!</strong> Falha ao tentar atualizar!' + 
                            '</div>'

                          $('#foot').before(alerta); 
                } else if(data.n == "10"){
                    
                    $('#fNome').addClass("has-error")

                }

            }) 
            });
        });

    </script>

</head>

<body>
 

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">T.I Resolve</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="cadUser.php"><i class="fa fa-plus fa-fw"></i> Novo usuário</a>
                    </li>
                    <li>
                        <a href="out.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                
                </ul>
           
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
            <!-- /.row -->
            <div class="row">
               <div id="container" ></div>
                
               <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dados dos usuarios
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Login</th>
                                            <th>Nome</th>
                                            <th>Categoria</th>
                                            <th>Sit.</th>
                                             <th>Editar</th>
                                             <th>Excluir</th>
                                        </tr>
                                    </thead>
                                 
<?php 
                                  
    
    
    try {
        
        include 'conect.php';

        if($_SESSION['tipo'] != 'C'){

            pg_close($con);
         }

         if (!$con) {
             throw new Exception("Error ao resgatar Informações", 1);
             
         }

        $sql = "SELECT  login, nome, categoria, situacao  from usuario";

        $consulta = pg_query($con, $sql);
        
        $linhas = pg_num_rows($consulta); 

                                
            for($i=0; $i<$linhas; $i++){  
                $dados = pg_fetch_array($consulta);       
                echo "
                    <tr id='$dados[0]'>
                        <td >".$dados[0] . "</td>
                        <td>".$dados[1] . "</td>
                        <td >".$dados[2] . "</td>
                        <td >".$dados[3] . "</td>
                        <td><a href='#?' onclick='return acaoEditar(\"".$dados[0] . "\")'><i class='fa fa-edit fa-fw'></i></a></td>
                        <td><a href='#' onclick='return acaoExcluir(\"".$dados[0] . "\")'> <i class='fa fa-trash fa-fw'></i></a></td>
                    </tr>";
                                                            

                pg_close($con);
                

            } 





    } catch (Exception $e) {

        echo $e->getMessage(), "\n";
    }

                                        


?>
                            
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                    <!-- /.panel -->
                </div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Atualize seus dados</h4>
      </div>
      <div class="modal-body">
       
        <form id="frm-Edit" method="POST">
           <div class="form-group col-lg-5" id="fNome">
                <label>Nome completo</label>
                <input class="form-control" name="nome" id="nome">
                                            
            </div>
            <div class="form-group col-lg-2" >
                <label>Categoria</label>
                <select class="form-control selectpicker" name="categoria" id="categoria" value="">
                    <option>G</option>
                    <option>P</option>
                    <option>C</option>
                </select>
            </div>
            <div class="form-group col-lg-2" >
                <label>Situação</label>
                <select class="form-control selectpicker" name="situacao" id="situacao">
                    <option>A</option>
                    <option>I</option>
                </select>
            </div>

            <div class="clearfix"></div>

            <div class="form-group col-lg-3">
                <input type="hidden" name="senha" id="senha" class="form-control" placeholder="Senha">
            </div>
            
            <div class="form-group col-lg-3">
                <input type="hidden" class="form-control" name="login" id="login" value="">
            </div>
            
            <div class="clearfix"></div>
                <div id="foot" class="modal-footer">
                    <a href=""  ><button type="button" class="btn btn-default" data-dismiss="">Voltar</button></a>    
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
                                        
        </form>  
      </div>      
  </div>
</div>


   
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

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>



