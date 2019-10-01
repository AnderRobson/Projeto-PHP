<?php
  include "conexaoBanco.class.php";

  class ComputadorDAO
  {

    private $conexao = null;

    public function __construct()
    {
      $this->conexao = ConexaoBanco::getInstance();
    }

    public function __destruct()
    {
  
    }

    public function cadastrarComputador($computador)
    {
      try {

        $statement = $this->conexao->prepare("insert into computador(id, nome, placaMae, processador, memoria, hd, fonte, gabinete, valor) values(null, ?, ?, ?, ?, ?, ?, ?, ?)"); //sql injection
        $statement->bindValue(1,$computador->nome);
        $statement->bindValue(2,$computador->placaMae);
        $statement->bindValue(3,$computador->processador);
        $statement->bindValue(4,$computador->memoria);
        $statement->bindValue(5,$computador->hd);
        $statement->bindValue(6,$computador->fonte);
        $statement->bindValue(7,$computador->gabinete);
        $statement->bindValue(8,$computador->valor);
        $statement->execute();

      } catch(PDOException $error) {
        echo "Erro ao cadastrar computador!".$error;
      }
    }

    public function buscarComputador()
    {
      try {
        $statement = $this->conexao->query("select * from computador");
        $array = $statement->fetchAll(PDO::FETCH_CLASS, 'Computador');
        return $array;
      } catch(PDOException $error) {
          echo "Erro ao buscar computador!".$error;
      }
    }

    public function deletarComputador($id)
    {
      try {
        $statement = $this->conexao->prepare(
          "delete from computador where id = ?");
        $statement->bindValue(1,$id);
        $statement->execute();
      } catch(PDOException $error) {
        echo "Erro ao excluir computador! ".$error;
      }
    }

    public function alterar($computador)
    {
      try {
        $statement = $this->conexao->prepare("update computador set nome=?, placaMae=?, processador=?, memoria=?, hd=?, fonte=?, gabinete=?, valor=? where id=?");

        $statement->bindValue(1,$computador->nome);
        $statement->bindValue(2,$computador->placaMae);
        $statement->bindValue(3,$computador->processador);
        $statement->bindValue(4,$computador->memoria);
        $statement->bindValue(5,$computador->hd);
        $statement->bindValue(6,$computador->fonte);
        $statement->bindValue(7,$computador->gabinete);
        $statement->bindValue(8,$computador->valor);
        $statement->bindValue(9,$computador->id);
        $statement->execute();

      } catch(PDOException $error) {
        echo "Erro ao alterar computador! ".$error;
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
          case "placaMae":
            $query = "where placaMae like '%".$pesquisa."%'";
            break;
          case "processador":
            $query = "where processador like '%".$pesquisa."%'";
            break;
          case "memoria":
            $query = "where memoria like '%".$pesquisa."%'";
            break;
          case "hd":
            $query = "where hd like '%".$pesquisa."%'";
            break;
          case "fonte":
            $query = "where fonte like '%".$pesquisa."%'";
            break;
          case "gabinete":
            $query = "where gabinete like '%".$pesquisa."%'";
            break;
          case "valor":
            $query = "where valor like '%".$pesquisa."%'";
            break;
          default:
            $query = "";
            break;
        }
        if(empty($pesquisa)) {
          $query = "";
        }
        $statement = $this->conexao->query("select * from computador {$query}");
        $array = $statement->fetchAll(PDO::FETCH_CLASS, 'Computador');
        return $array;
      } catch(PDOException $error) {
        echo "Erro ao filtrar computador! ".$error;
      }
    }

  }