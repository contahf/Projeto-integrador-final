<?php
session_start();

    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) 
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        session_destroy();
        header('location:../index.html');
    }
    if ($_SESSION['tipo'] !='C') {
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
    

        function acaoExcluir(matricula){
            var t = matricula.trim();
            matricula = t;
            if(window.confirm('Deseja mesmo excluir este aluno(a)?')){
                dado = 'txtMat=' + matricula;
                $.get('removeAluno.php', dado, tratarExclusao)
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

                $('#'+t).remove();

                var teste = '<div class="alert alert-info fade in">' + 
        '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
        '<strong>Info!</strong> Registro removido com sucesso.' + 
      '</div>'
                $('#container').empty().append(teste);      
            }
        }


        function acaoEditar(matricula){

            dado = 'txtMat=' + matricula;
            
            $.ajax({
                
                type        : 'GET', 
                url         : 'confEditAluno.php',  
                data        :  dado, 
                dataType    : 'json', 
                encode      : true
                    
            })
            
            .done(function(dado){
                
                var inputNome = dado.nome
                var inputNasc = dado.dtnasc
                var inputSexo = dado.sexo
                var inputCidade = dado.cidade
                var inputUf = dado.uf
                var inputMat = dado.matricula

                document.getElementById('txtNome').value = inputNome
                document.getElementById('txtNasc').value = inputNasc
                document.getElementById('txtMat').value = inputMat
                document.getElementById('txtEstado').value = inputUf
                document.getElementById('txtCidade').value = inputCidade
                $('input[name="txtSexo"][value="' + inputSexo + '"]').prop('checked', true)
                
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
                    url         : 'e.aluno.php',  
                    data        :  $("#frm-Edit :input").serialize(), 
                    dataType    : 'json', 
                    encode      : true
                    
                }) 

            .done(function(data){
                
                if(data == true){
                     

                     var alerta = '<div class="alert alert-success fade in">' + 
                            '<a href="listarAluno.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong>Success!</strong> Cadastrado com sucesso!' + 
                            '</div>'

                          $('#fNome').addClass("has-success")
                          $('#foot').before(alerta); 
                    
                }else{

                    var alerta = '<div class="alert alert-danger fade in">' + 
                            '<a href="listarAluno.php" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + 
                            '<strong>Falhou!</strong> Falha ao atualizar o  cadastro!' + 
                            '</div>'
                          
                          $('#foot').before(alerta);

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
                    <a href="cadAluno.php"><i class="fa fa-sign-out fa-fw"></i> Novo Aluno</a>
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
                                            <a href="editUser.php">Usuario</a>
                                        </li>
                                        <li>
                                            <a href="removeAluno.php">Aluno</a>
                                        </li>
                                        <li>
                                            <a href="#">Disciplina</a>
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
            <br>
            <!-- /.row -->
            <div class="row">
               
                <div id="container" ></div>
                <div id="a"></div>
               <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Alunos(a)
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">

                                <table class="table table-hover" id="tabela">
                                    <thead>
                                        <tr>
                                            <th>Matricula</th>
                                            <th>Nome</th>
                                            <th>Sexo</th>
                                             <th>Data Nasc.</th>
                                             <th>Cidade</th>
                                             <th>UF</th>
                                             <th>Editar</th>
                                             <th>Remover</th>
                                        </tr>
                                    </thead>
                                 
<?php 
 
 require_once 'conect.php';   

    if ($con) {

        $sql = "SELECT * from aluno ORDER BY matricula ";

        $consulta = pg_query($con, $sql);
        
        $linhas = pg_num_rows($consulta); 
                                
            for($i=0; $i<$linhas; $i++){  
                $dados = pg_fetch_row($consulta);

                  echo "<tr id='".trim($dados[0])."'> 
                        <td>".trim($dados[0])."</td>
                        <td>".$dados[1]."</td>
                        <td>".$dados[2]."</td>
                        <td>".$dados[3]."</td>
                        <td>".$dados[4]."</td>
                        <td>".$dados[5]."</td>
                        <td><a href='#?' onclick='acaoEditar(\"".trim($dados[0])."\")'><i class='fa fa-edit fa-fw'></i></a></td>
                        <td><a href='#?' onclick='acaoExcluir(\"".trim($dados[0])."\")'><i class='fa fa-trash fa-fw'></i></a></td>
                    </tr>";
            } 
    }else{
        echo "Verifique sua conexão com o banco";
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
               <label>Nome </label>
                
                <input type="text" class="form-control has-success" name="txtNome" id="txtNome">
                
                                            
            </div>
            <div class="form-group col-lg-4" >
                <label>Data de nasc.</label>
                <input type="date" name="txtNasc" class="form-control" id="txtNasc" required="">
                                            
            </div>
                                      
            <div class="form-group col-lg-3" >
                <label>Sexo:</label><br>
                    <label class="radio-inline">
                        <input type="radio" name="txtSexo" id="txtM" value="M">M
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="txtSexo" value="F" id="txtSexo" >F
                    </label>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-3" >
                <label>Cidade</label>
                <input type="numeric" class="form-control" name="txtCidade" id="txtCidade" required="">
                                            
            </div>
                                       
            <div class="form-group col-lg-2" >
            <label for="estado">UF:</label>
                <select class="form-control selectpicker" name="txtEstado" id="txtEstado">
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
                <div class="form-group col-lg-5">
                
                <input type="hidden" name="txtMat" id="txtMat" class="form-control">
                                            
            </div>
            <div class="clearfix"></div>
                <div id="foot" class="modal-footer">
                    <a href="listarAluno.php"  ><button type="button" class="btn btn-default" data-dismiss="">Voltar</button></a>    
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
