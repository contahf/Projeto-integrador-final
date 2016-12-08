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
      var l = '<?php echo $_SESSION['tipo']; ?>';

        
        $(function() {
            
            if (l != 'C') {

               $('button').prop('disabled', true);
            }    
        });


        function acaoExcluir(num){
            if(window.confirm('Deseja mesmo excluir esta disciplina?')){
                dado = 'numDis=' + num;
                $.get('removeDis.php', dado, tratarExclusao)
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
                alert('Não conseguiu excluir');
            }else{

                $('#'+ t).remove();

                var teste = '<div class="alert alert-info fade in">' + 
        '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
        '<strong>Info!</strong> Registro removido com sucesso.' + 
      '</div>'
                $('#container').empty().append(teste);      
            }
            if (t == "-1") {
                var teste = '<div class="alert alert-warning fade in">' + 
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                '<strong></strong> Esta disciplina não pode ser removida!.' + 
                '</div>'
                $('#container').empty().append(teste);
            }
            if(t == "-2"){
                 
                 var teste = '<div class="alert alert-danger fade in">' + 
                '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                '<strong></strong> Falhou ao tentar resgatar a informação!.' + 
                '</div>'
                $('#container').empty().append(teste);

            }
        }

        
        function acaoEditar(numero){

            dado = 'txtCodigo=' + numero;
            
            $.ajax({
                
                type        : 'POST', 
                url         : 'updateDis.php',  
                data        :  dado, 
                dataType    : 'json', 
                encode      : true
                    
            })
            
            .done(function(dado){
                
                var inputCodigo = dado.codigo
                var inputNome = dado.nome
                var inputCarga = dado.ch

                document.getElementById('txtCod').value = inputCodigo
                document.getElementById('txtNome').value = inputNome
                document.getElementById('txtCarga').value = inputCarga
                $('#exampleModal').modal('show')
      
            })

            .fail(function(){
                console.log(); 
            });

        }


         $(function() { 
            $('#frm-Modal').on('submit', function(e) {
                e.preventDefault();

                var codigo = 'txtCod=' + document.getElementById('txtCod').value
                var nome = 'txtNome=' + document.getElementById('txtNome').value
                var carga = 'txtCarga=' + document.getElementById('txtCarga').value
                var fo = 'id=' +"18"

                $.ajax({
                    type        : 'POST', 
                    url         : 'updateDis.php',  
                    data        :  $("#frm-Modal :input").serialize(),
                    dataType    : 'json', 
                    encode      : true
                    
                }) 

            .done(function(data){

                
                if(data == "ok"){
                     

                     var alerta = '<div class="alert alert-success fade in">' + 
                            '<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong>Success!</strong> Atualizado com sucesso!' + 
                            '</div>'

                          $('#foot').before(alerta); 
                    
                }

                else if (data == "-1") {

                    var alerta = '<div class="alert alert-danger fade in">' + 
                            '<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong></strong> Falha ao tentar atualizar!' + 
                            '</div>'

                          $('#foot').before(alerta); 
                
                } 

                if(data.n == "-10"){

                    $('#fNome').addClass("has-error")

                }
                if(data.carga == "-11"){

                    $('#fCarga').addClass("has-error")

                }
                

            }) 
            });
        });
    </script>

</head>

<body>

    <div id="wrapper">

      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                
                <a class="navbar-brand" href="index.html">T.I Resolve</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               
                    <li>
                    	<a href="dis.php"><i class="fa fa-plus fa-fw"></i> Nova Disciplina</a>
                    </li>                  
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
            <!-- /.row -->
            <div class="row">
               
                <!-- /.col-lg-6 -->
               <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Hover Rows
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nome</th>
                                            <th>Carga Horaria</th>
                                             <th>Editar</th>
                                             <th>Remover</th>
                                        </tr>
                                    </thead>
                                 
<?php 

require_once 'conect.php';    

    if ($con) {

        $sql = "SELECT * from disciplina ORDER BY codigo ";

        $consulta = pg_query($con, $sql);
        
        $linhas = pg_num_rows($consulta); 
                                
        for($i=0; $i<$linhas; $i++){  
            $dados = pg_fetch_row($consulta);       
                echo "<tr id='".trim($dados[0])."'>
                        <td>".$dados[0] . "</td>
                        <td>".$dados[1] . "</td>
                        <td >".$dados[2] . "</td>
                      <td>
                    <button type='button' class='btn-link fa fa-edit fa-fw' onclick='acaoEditar(\"".trim($dados[0])."\")'></button></td>
                <td>
                    <button type='button' class='btn-link fa fa-trash fa-fw' onclick='acaoExcluir(\"".trim($dados[0])."\")'></button>
                </td>
                    </tr>";
        } 
                                        
                                     
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"   data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Dados do curso</h4>
      </div>
      <div class="modal-body">
       
        <form id="frm-Modal" method="POST" action="updateDis.php" name="frm-Modal">
            
            <div class="form-group col-lg-6" id="fNome">
                <label>Nome</label>
                <input type="text" class="form-control" name="txtNome" id="txtNome">
                                            
            </div>
                                        
            <div class="form-group col-lg-3" id="fCarga">
                <label>C.H</label>
                <input type="text" name="txtCarga" id="txtCarga" class="form-control">

            </div>
            <div class="form-group col-lg-2" id="fCodigo">
                
                <input type="hidden" class="form-control has-success" name="txtCod" id="txtCod">     

            </div>
                
            <div class="clearfix"></div>
                <div id="foot" class="modal-footer">
                    <a href="editarDis.php"  ><button type="button" class="btn btn-default" data-dismiss="">Voltar</button></a>    
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
                                        
        </form>  
      </div>      
  </div>
</div>
