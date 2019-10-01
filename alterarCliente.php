<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alterar informações do cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="vendor/components/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <div class="box">
        <h1 class="jumbotron bg-info">Alterar informações do cliente</h1>

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
                        <a href="cadastroComputador.php" class="nav-link btn btn-outline-primary btn-menu">Cadastro de Computador</a>
                    </li>
                </ul>
            </div>
        </nav>

        <?php
            if(isset($_GET['id'])) {
                include 'dao/clientedao.class.php';
                include 'modelo/cliente.class.php';

                $clienteDAO = new ClienteDAO();
                $array = $clienteDAO->filtrar($_GET['id'], "codigo");
                $cliente = $array[0];
            }
        ?>

        <form name="cad" method="post" action="alterarCliente.php" id="app">
            <div class="form-group">
                <input type="text" name="codigo" placeholder="Código do cliente" class="form-control" value="<?php if(isset($cliente)) echo $cliente->id; ?>" required>
            </div>

            <div class="form-group">
                <input type="text" name="nome" placeholder="Digite o seu nome" value="<?php if(isset($cliente)) echo $cliente->nome; ?>" autofocus class="form-control"  pattern="^[a-zA-ZàÀèÈìÌòÒùÙáÁéÉíÍóÓúÚýÝâÂêÊîÎôÔûÛãÃñÑõÕäÄëËïÏçöÖüÜÿŸ ]{2,70}$" title="Digite apenas letras,maximo 70 dígitos!" required>
            </div>

            <div class="form-control">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="sexo" value="Masculino" class="custom-control-input" <?php if(isset($cliente)) if($cliente->sexo=='Masculino') echo 'checked'; ?> required>
                    <label class="custom-control-label" for="customRadioInline1">Masculino</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="sexo" value="Feminino" class="custom-control-input"<?php if(isset($cliente)) if($cliente->sexo=='Feminino') echo 'checked'; ?> required>
                    <label class="custom-control-label" for="customRadioInline2">Feminino</label>
                </div>
            </div>
        
            <div class="form-group">
                <input type="text" name="cpf" placeholder="Digite seu cpf" value="<?php if(isset($cliente)) echo $cliente->cpf; ?>" class="form-control"  pattern="^[0-9]{3}.?[0-9]{3}.?[0-9]{3}-?[0-9]{2}$" title="Digite apenas números, 11 dígitos!"  required>
            </div>

            <div class="form-group">
                <input type="text" name="endereco" placeholder="Digire seu endereço" value="<?php if(isset($cliente)) echo $cliente->endereco; ?>" class="form-control"  pattern="^[a-zA-Z0-9àÀèÈìÌòÒùÙáÁéÉíÍóÓúÚýÝâÂêÊîÎôÔûÛãÃñÑõÕäÄëËïÏçöÖüÜÿŸ,.\- ]{2,70}$" title="Digite o endereço corretamente,maximo 70 dígitos!" required>
            </div>

            <div class="form-group">
                <input type="date" name="dataNascimento" value="<?php if(isset($cliente)) echo $cliente->datanascimento; ?>" class="form-control" title="Digite a sua data de nascimento" required>
            </div>

            <div class="form-group">
                <input type="text" name="celular" placeholder="Digite seu celular" value="<?php if(isset($cliente)) echo $cliente->celular; ?>" class="form-control"  pattern="^[0-9]{0,11}$" title="Digite apenas números,maximo 11 dígitos!" required>
            </div>

            <div class="form-group">
                <input type="text" name="telefone" placeholder="Digite seu telefone" value="<?php if(isset($cliente)) echo $cliente->telefone; ?>" class="form-control"  pattern="^[0-9]{0,11}$" title="Digite apenas números,maximo 11 dígitos!" required>
            </div>

            <div class="form-group">
                <input type="submit" name="alterar" value="Alterar" class="btn btn-outline-primary btncad">
                <input type="reset" value="Limpar" class="btn btn-outline-danger btncad">

            </div>
        </form>

    </div>
    <?php
        if (isset($_POST['alterar'])) {
            include "modelo/cliente.class.php";
            include "dao/clientedao.class.php";
            include 'util/padronizacao.class.php';
            include 'util/validacao.class.php';

            $erros = [];

            if(!Validacao::validarTexto($_POST['nome'])) {
                $erros[] = 'Nome inválido';
            }

            if(!Validacao::validarCPF($_POST['cpf'])) {
                $erros[] = 'CPF inválido';
            }

            if(!Validacao::validarSexo($_POST['sexo'])) {
                $erros[] = 'Sexo inválido';
            }

            if(!Validacao::validarTextNumero($_POST['endereco'])) {
                $erros[] = 'Endereço inválido';
            }

            /*if(!Validacao::validarDataNascimento($_POST['dataNascimento'])) {
                $erros[] = 'Data de nascimento inválida';
            }*/

            if(!Validacao::validarNumero($_POST['celular'])) {
                $erros[] = 'Celular inválido';
            }

            if(!Validacao::validarNumero($_POST['telefone'])) {
                $erros[] = 'Telefone inválido';
            }

            if(count($erros) != 0) {
                $_SESSION['erros'] = serialize($erros);

                header("location:clientes.php");
                ob_enf_fluch();
            }

            $cliente = new Cliente();
            $cliente->id = $_POST['codigo'];
            $cliente->nome = Padronizacao::padronizarTexto($_POST['nome']) ?? '';
            $cliente->sexo = Padronizacao::padronizarTexto($_POST['sexo']) ?? '';
            $cliente->cpf = $_POST['cpf'] ?? '';
            $cliente->endereco = Padronizacao::padronizarTexto($_POST['endereco']) ?? '';
            $cliente->dataNascimento = $_POST['dataNascimento'] ?? '';
            $cliente->celular = $_POST['celular'] ?? '';
            $cliente->telefone = $_POST['telefone'] ?? '';
        
            $clienteDAO = new ClienteDAO();
            $clienteDAO->alterar($cliente);

            
            header("location:clientes.php");
            
            ob_enf_fluch();
        }
    ?>
</body>
</html>