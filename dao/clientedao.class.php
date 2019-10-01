<?php
    include "conexaoBanco.class.php";

    class ClienteDAO
    {

        private $conexao = null;

        public function __construct()
        {
            $this->conexao = ConexaoBanco::getInstance();
        }

        public function __destruct()
        {
        }

        public function cadastrarCliente($cliente)
        {
            try {

            $statement = $this->conexao->prepare("insert into cliente(id, nome, sexo, cpf, endereco, datanascimento, celular, telefone) values(null, ?, ?, ?, ?, ?, ?, ?)"); //sql injection
            $statement->bindValue(1,$cliente->nome);
            $statement->bindValue(2,$cliente->sexo);
            $statement->bindValue(3,$cliente->cpf);
            $statement->bindValue(4,$cliente->endereco);
            $statement->bindValue(5,$cliente->dataNascimento);
            $statement->bindValue(6,$cliente->celular);
            $statement->bindValue(7,$cliente->telefone);
            $statement->execute();

            } catch(PDOException $error) {
            echo "Erro ao cadastrar!".$error;
            }
        }

        public function buscarClientes()
        {
            try {
            $statement = $this->conexao->query("select * from cliente");
            $array = $statement->fetchAll(PDO::FETCH_CLASS, 'Cliente');
            return $array;
            } catch(PDOException $error) {
                echo "Erro ao buscar cliente!".$error;
            }
        }

        public function deletarCliente($id)
        {
            try {
            $statement = $this->conexao->prepare(
                "delete from cliente where id = ?");
            $statement->bindValue(1,$id);
            $statement->execute();
            } catch(PDOException $error) {
            echo "Erro ao excluir cliente! ".$error;
            }
        }

        public function alterar($cliente)
        {
            try {
            $statement = $this->conexao->prepare("update cliente set nome=?, sexo=?, cpf=?, endereco=?, datanascimento=?, celular=?, telefone=? where id=?");

            $statement->bindValue(1,$cliente->nome);
            $statement->bindValue(2,$cliente->sexo);
            $statement->bindValue(3,$cliente->cpf);
            $statement->bindValue(4,$cliente->endereco);
            $statement->bindValue(5,$cliente->dataNascimento);
            $statement->bindValue(6,$cliente->celular);
            $statement->bindValue(7,$cliente->telefone);
            $statement->bindValue(8,$cliente->id);
            $statement->execute();

            } catch(PDOException $error) {
            echo "Erro ao alterar cliente! ".$error;
            }
        }

        public function filtrar($pesquisa, $filtro)
        {
            try {
            $query="";
            switch($filtro) {
                case "codigo": 
                    $query = "where id=$pesquisa";
                    break;
                case "nome":
                    $query = "where nome like '%".$pesquisa."%'";
                    break;
                case "sexo":
                    $query = "where sexo like '%".$pesquisa."%'";
                    break;
                case "cpf":
                    $query = "where cpf like '%".$pesquisa."%'";
                    break;
                case "endereco":
                    $query = "where endereco like '%".$pesquisa."%'";
                    break;
                case "dataNascimento":
                    $query = "where datanascimento like '%".$pesquisa."%'";
                    break;
                case "celular":
                    $query = "where celular like '%".$pesquisa."%'";
                    break;
                case "telefone":
                    $query = "where telefone like '%".$pesquisa."%'";
                    break;
                default:
                    $query = "";
                    break;
            }

            if(empty($pesquisa)) {
                $query = "";
            }
            
            $statement = $this->conexao->query("select * from cliente {$query}");
            $array = $statement->fetchAll(PDO::FETCH_CLASS, 'Cliente');
            return $array;
            } catch(PDOException $error) {
            echo "Erro ao filtrar cliente! ".$error;
            }
        }

    }
