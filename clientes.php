<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes Cadastrados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="vendor/components/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1 class="jumbotron bg-info">Clientes Cadastrados</h1>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="index.php" class="navbar-brand btn btn-outline-primary btn-menu">Minha Loja</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-tardet="#navbarNav" aria-expanded="false" arial-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="index.php" class="nav-link btn btn-outline-primary btn-menu">Home</a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link btn btn-outline-primary btn-menu">Clientes</a>
                </li>

                <li class="nav-item">
                    <a href="computadores.php" class="nav-link btn btn-outline-primary btn-menu">Computadores</a>
                </li>

                <li class="nav-item">
                    <a href="cadastroCliente.php" class="nav-link btn btn-outline-primary btn-menu">Cadastro de Cliente</a>
                </li>

                <li class="nav-item">
                    <a href="cadastroComputador.php" class="nav-link btn btn-outline-primary btn-menu">Cadastro de Computador</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="app">
        <?php
                include "modelo/cliente.class.php";
                include "dao/clientedao.class.php";
                include 'util/padronizacao.class.php';
                include 'util/validacao.class.php';

                $clienteDAO = new ClienteDAO ();
                $clientes = $clienteDAO->buscarClientes();
                
                if(isset($_SESSION['erros'])) {
                    $erros = unserialize($_SESSION['erros']);
                    foreach($erros as $erro) {
                        echo "<br>$erro";
                    }
                    unset($_SESSION['erros']);
                }

                if (count($clientes) == 0) {
                    echo "<h1>Não há clientes no banco!</h1>";
                    return;
                }
        ?>

        <form name="filtrar" method="post" action="clientes.php">
            <div class="row">
                <div class="form-group col-md-6">
                    <input type="text" name="txtfiltro" placeholder="Digite a sua pesquisa" class="form-control">
                </div>

                <div class="form-group col-md-6">
                    <select name="selfiltro" class="form-control">
                        <option value="todos">Todos</option>
                        <option value="codigo">Código</option>
                        <option value="nome">Nome</option>
                        <option value="sexo">Sexo</option>
                        <option value="cpf">CPF</option>
                        <option value="endereco">Endereço</option>
                        <option value="dataNascimento">Data Nascimento</option>
                        <option value="telefone">Telefone</option>
                        <option value="celular">Celular</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <input type="submit" name="filtrar" value="Filtrar" class="btn btn-primary btn-block filtrar">
            </div>
        </form>

        <?php
            if(isset($_POST['filtrar'])){
                $pesquisa = $_POST['txtfiltro'];
                $filtro = $_POST['selfiltro'];

                if(!empty($pesquisa)){
                    $clienteDAO = new ClienteDAO();
                    $clientes = $clienteDAO->filtrar($pesquisa,$filtro);

                    if(count($clientes) == 0){
                        echo "<h3>Sua pesquisa não retornou nenhum cliente!</h3>";
                        return;
                    }
                }
            }
        ?>

        <?php
            echo "<div class='table-responsive'>";
                echo "<table class='table table-striped table-bordered table-hover table-condensed'>";
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>Código</th>";
                            echo "<th>Nome</th>";
                            echo "<th>Sexo</th>";
                            echo "<th>CPF</th>";
                            echo "<th>Endereço</th>";
                            echo "<th>Data Nascimento</th>";
                            echo "<th>Telefone</th>";
                            echo "<th>Celular</th>";
                            echo "<th>Alterar</th>";
                            echo "<th>Excluir</th>";
                        echo "</tr>";
                    echo "</thead>";

                    echo "<tfoot>";
                        echo "<tr>";
                            echo "<th>Código</th>";
                            echo "<th>Nome</th>";
                            echo "<th>Sexo</th>";
                            echo "<th>CPF</th>";
                            echo "<th>Endereço</th>";
                            echo "<th>Data Nascimento</th>";
                            echo "<th>Telefone</th>";
                            echo "<th>Celular</th>";
                            echo "<th>Alterar</th>";
                            echo "<th>Excluir</th>";
                        echo "</tr>";
                    echo "</tfoot>";
                    echo "<tbody>";
                        foreach($clientes as $cliente) {
                            $data = Padronizacao::padronizarData($cliente->datanascimento);
                            echo "<tr>";
                                echo "<td>$cliente->id</td>";
                                echo "<td>$cliente->nome</td>";
                                echo "<td>$cliente->sexo</td>";
                                echo "<td>$cliente->cpf</td>";
                                echo "<td>$cliente->endereco</td>";
                                echo "<td>$data</td>";
                                echo "<td>$cliente->telefone</td>";
                                echo "<td>$cliente->celular</td>";
                                echo "<td><a class='btn btn-warning' href='alterarCliente.php?id=$cliente->id'>Alterar</a></td>";
                                echo "<td><a class='btn btn-danger' href='clientes.php?id=$cliente->id'>Excluir</a></td>";
                            echo "</tr>";
                        }
                    echo "</tbody>";
                echo "</table>";
            echo "</div>";
        ?>
            
    </div>    
</body>
</html>
<?php
    if(isset($_GET['id'])) {
        $clienteDAO->deletarCliente($_GET['id']);
        header("location:clientes.php");

        ob_enf_fluch();
    }
?>