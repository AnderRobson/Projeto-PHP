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
    <title>Cadastro de Computador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="vendor/components/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
<body>
    <div class="box">
        <h1 class="jumbotron bg-info">Cadastro de computador</h1>

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
                        <a href="clientes.php" class="nav-link btn btn-outline-primary btn-menu">Clientes</a>
                    </li>

                    <li class="nav-item">
                        <a href="computadores.php" class="nav-link btn btn-outline-primary btn-menu">Computadores</a>
                    </li>

                    <li class="nav-item">
                        <a href="cadastroCliente.php" class="nav-link btn btn-outline-primary btn-menu">Cadastro de Cliente</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link btn btn-outline-primary btn-menu">Cadastro de Computador</a>
                    </li>
                </ul>
            </div>
        </nav>

        <?php
            if(isset($_SESSION['erros'])) {
                $erros = unserialize($_SESSION['erros']);
                foreach($erros as $erro) {
                    echo "<br>$erro";
                }
                unset($_SESSION['erros']);
            }
        ?>
        <form name="cad" method="post" action="cadastroComputador.php" id="app">
            <div class="form-group">
                <input type="text" name="nome" placeholder="Digite o nome do kit" autofocus class="form-control" pattern="^[a-zA-Z0-9àÀèÈìÌòÒùÙáÁéÉíÍóÓúÚýÝâÂêÊîÎôÔûÛãÃñÑõÕäÄëËïÏçöÖüÜÿŸ,.-_ ]{2,70}$" title="Digite o nome, até 70 dígitos!" required>
            </div>

            <div class="form-group">
                <input type="text" name="placaMae" placeholder="Placa Mãe" class="form-control" pattern="^[a-zA-Z0-9àÀèÈìÌòÒùÙáÁéÉíÍóÓúÚýÝâÂêÊîÎôÔûÛãÃñÑõÕäÄëËïÏçöÖüÜÿŸ,.-_ ]{2,70}$" title="Digite a placa mãe, até 70 dígitos!" required>
            </div>

            <div class="form-group">
                <input type="text" name="processador" placeholder="processador" class="form-control" pattern="^[a-zA-Z0-9àÀèÈìÌòÒùÙáÁéÉíÍóÓúÚýÝâÂêÊîÎôÔûÛãÃñÑõÕäÄëËïÏçöÖüÜÿŸ,.-_ ]{2,70}$" title="Digite o processador, até 70 dígitos!" required>
            </div>

            <div class="form-group">
                <input type="text" name="memoria" placeholder="Memória" class="form-control" pattern="^[a-zA-Z0-9àÀèÈìÌòÒùÙáÁéÉíÍóÓúÚýÝâÂêÊîÎôÔûÛãÃñÑõÕäÄëËïÏçöÖüÜÿŸ,.-_ ]{2,70}$" title="Digite a memoria, até 70 dígitos!" required>
            </div>

            <div class="form-group">
                <input type="text" name="hd" placeholder="HD" class="form-control" pattern="^[a-zA-Z0-9àÀèÈìÌòÒùÙáÁéÉíÍóÓúÚýÝâÂêÊîÎôÔûÛãÃñÑõÕäÄëËïÏçöÖüÜÿŸ,.-_ ]{2,70}$" title="Digite o hd, até 70 dígitos!" required>
            </div>

            <div class="form-group">
                <input type="text" name="fonte" placeholder="Fonte" class="form-control" pattern="^[a-zA-Z0-9àÀèÈìÌòÒùÙáÁéÉíÍóÓúÚýÝâÂêÊîÎôÔûÛãÃñÑõÕäÄëËïÏçöÖüÜÿŸ,.-_ ]{2,70}$" title="Digite a fonte, até 70 dígitos!" required>
            </div>

            <div class="form-group">
            <label>Gabinete</label>
                <select name="gabinete" class="form-control">
                    <option value="NOX PAX ATX, Iluminação de LED Vermelho" required>NOX PAX ATX, Iluminação de LED Vermelho</option>
                    <option value="Gamer Warrior com Lateral em Acrílico" required>Gamer Warrior com Lateral em Acrílico</option>
                    <option value="Gaerocool Cylon RGB LED MID Tower ATX" required>Aerocool Cylon RGB LED MID Tower ATX</option>
                </select>
            </div>

            <div class="form-group">
                <input type="text" name="valor" placeholder="Valor do kit" class="form-control" pattern="^\d*[0-9](\.\d*[0-9])?$" title="Digite o valor do kit." required>
            </div>

            <div class="form-group">
                <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-outline-primary btncad">
                <input type="reset" value="Limpar" class="btn btn-outline-danger btncad">

            </div>
        </form>

    </div>
    <?php
        if (isset($_POST['cadastrar'])) {
            include "modelo/computador.class.php";
            include "dao/computadordao.class.php";
            include 'util/padronizacao.class.php';
            include 'util/validacao.class.php';

            $erros = [];

            if(!Validacao::validarTextNumero($_POST['nome'])) {
                $erros[] = 'Nome inválido';
            }

            if(!Validacao::validarTextNumero($_POST['placaMae'])) {
                $erros[] = 'Placa mãe inválida';
            }

            if(!Validacao::validarTextNumero($_POST['processador'])) {
                $erros[] = 'Processador inválido';
            }

            if(!Validacao::validarTextNumero($_POST['memoria'])) {
                $erros[] = 'Memoria inválida';
            }

            if(!Validacao::validarTextNumero($_POST['hd'])) {
                $erros[] = 'HD inválido';
            }

            if(!Validacao::validarTextNumero($_POST['fonte'])) {
                $erros[] = 'Fonte inválida';
            }

            if(!Validacao::validarGabinete($_POST['gabinete'])) {
                $erros[] = 'Gabinete inválido';
            }

            if(!Validacao::validarValor($_POST['valor'])) {
                $erros[] = 'Valor inválido';
            }

            if(count($erros) != 0) {
                $_SESSION['erros'] = serialize($erros);

                header("location:cadastroComputador.php");
                ob_enf_fluch();
            }

            $computador = new Computador();
            $computador->nome = Padronizacao::padronizarTexto($_POST['nome']) ?? '';
            $computador->placaMae = Padronizacao::padronizarTexto($_POST['placaMae']) ?? '';
            $computador->processador = Padronizacao::padronizarTexto($_POST['processador']) ?? '';
            $computador->memoria = Padronizacao::padronizarTexto($_POST['memoria']) ?? '';
            $computador->hd = Padronizacao::padronizarTexto($_POST['hd']) ?? '';
            $computador->fonte = Padronizacao::padronizarTexto($_POST['fonte']) ?? '';
            $computador->gabinete = Padronizacao::padronizarTexto($_POST['gabinete']) ?? '';
            $computador->valor = $_POST['valor'] ?? '';
        
            $computadorDAO = new ComputadorDAO();
            $computadorDAO->cadastrarComputador($computador);

            header("location:computadores.php");

            ob_enf_fluch();
        }
    ?>
</body>
</html>