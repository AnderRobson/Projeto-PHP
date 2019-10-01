<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minha Loja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="vendor/components/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        .produto {
            margin-top: 220px;
        }
    </style>
</head>
<body>
    <h1 class="jumbotron bg-info">Minha Loja</h1>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="#" class="navbar-brand btn btn-outline-primary btn-menu">Minha Loja</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-tardet="#navbarNav" aria-expanded="false" arial-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="#" class="nav-link btn btn-outline-primary btn-menu">Home</a>
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

    <!--Um novo começo!-->
    <?php
        include "modelo/computador.class.php";
        include "dao/computadordao.class.php";

        $computadorDAO = new ComputadorDAO ();
        $computadores = $computadorDAO->buscarComputador();
        
        
        if (count($computadores) == 0) {
            echo "<h1>Não há computadores no banco!</h1>";
            return;
        }
    ?>
    
    <div id="produto1">
        <div class="product">
            <div class="product-image">
                <img v-bind:src="image" v-bind:alt="description">
            </div>

            <div class="product-info">

                
                <div class="top">
                    <h1><?php echo $computadores[0]->nome; ?></h1>
                    <p><?php echo $computadores[0]->placaMae; ?></p>
                    <p><?php echo $computadores[0]->processador; ?></p>
                    <p><?php echo $computadores[0]->memoria; ?></p>
                    <p><?php echo $computadores[0]->hd; ?></p>
                    <p><?php echo $computadores[0]->fonte; ?></p>
                    <p><?php echo $computadores[0]->gabinete; ?></p>
                </div>

                <div class="produto">
                    <div v-for="(variant, index) in variants" :key="variant.variantId" class="color-box" :style="{ backgroundColor: variant.variantColor }" @mouseover="updateProduct(index)"></div>
                </div>

                <button v-on:click="addToCart" :disabled="!inStock" :class="{ disabledButton: !inStock }">Adicionar ao carrinho</button>
                <button  v-if="cart > 0" click="removeToCart">Remover do carrinho</button>

                
            </div>

            <product-tabs :reviews="reviews"></product-tabs>

        </div>
    </div>

    <div id="produto2">
        <div class="product">
            <div class="product-image">
                <img v-bind:src="image" v-bind:alt="description">
            </div>

            <div class="product-info">

                
                <div class="top">
                    <h1><?php echo $computadores[1]->nome; ?></h1>
                    <p><?php echo $computadores[1]->placaMae; ?></p>
                    <p><?php echo $computadores[1]->processador; ?></p>
                    <p><?php echo $computadores[1]->memoria; ?></p>
                    <p><?php echo $computadores[1]->hd; ?></p>
                    <p><?php echo $computadores[1]->fonte; ?></p>
                    <p><?php echo $computadores[1]->gabinete; ?></p>
                </div>

                <div class="produto">
                    <div v-for="(variant, index) in variants" :key="variant.variantId" class="color-box" :style="{ backgroundColor: variant.variantColor }" @mouseover="updateProduct(index)"></div>
                </div>

                <button v-on:click="addToCart" :disabled="!inStock" :class="{ disabledButton: !inStock }">Adicionar ao carrinho</button>
                <button  v-if="cart > 0" click="removeToCart">Remover do carrinho</button>

                
            </div>

            <product-tabs :reviews="reviews"></product-tabs>

        </div>
    </div>

    <div id="produto3">
        <div class="product">
            <div class="product-image">
                <img v-bind:src="image" v-bind:alt="description">
            </div>

            <div class="product-info">

                
                <div class="top">
                    <h1><?php echo $computadores[2]->nome; ?></h1>
                    <p><?php echo $computadores[2]->placaMae; ?></p>
                    <p><?php echo $computadores[2]->processador; ?></p>
                    <p><?php echo $computadores[2]->memoria; ?></p>
                    <p><?php echo $computadores[2]->hd; ?></p>
                    <p><?php echo $computadores[2]->fonte; ?></p>
                    <p><?php echo $computadores[2]->gabinete; ?></p>
                </div>

                <div class="produto">
                    <div v-for="(variant, index) in variants" :key="variant.variantId" class="color-box" :style="{ backgroundColor: variant.variantColor }" @mouseover="updateProduct(index)"></div>
                </div>

                <button v-on:click="addToCart" :disabled="!inStock" :class="{ disabledButton: !inStock }">Adicionar ao carrinho</button>
                <button  v-if="cart > 0" click="removeToCart">Remover do carrinho</button>

                
            </div>

            <product-tabs :reviews="reviews"></product-tabs>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="js/main.js"></script>

</body>
</html>