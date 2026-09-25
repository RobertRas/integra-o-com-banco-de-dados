<?php
require_once __DIR__ .'/../configs/conexao.php';

class Pessoa
{
    //aqui eu defino os atributos da classe pessoa como privados. por quê?
    //para que usuarios não tenham como acessar de forma direta esses atributos
    //posso realizar verificações antes de atribuir ou modificar valores
    private $id_pessoa;
    private $nome;



    public function __construct($id = false)
    {
        if ($id) {
            $this->id_pessoa = $id;

            $this->carregar();
        }
    }

    //aqui eu consigo consultar os dados com o método GET
    //ou posso alterá-los com o método SET


    //serve para retornar o valor do id
    public function getId()
    {
        return $this->id_pessoa;
    }

    //retorna o valor do nome
    public function getNome()
    {
        return $this->nome;
    }

    //atribuir valor ao nome
    public function setNome($nome)
    {
        $this->nome = $nome;
    }



    //carrega um registro
    public function carregar()
    {
        $conexao = Conexao::conectar();
        $sql = 'SELECT * FROM pessoa WHERE id_pessoa = :id';
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $this->getId());
        $stmt->execute();
        $resultado = $stmt->fetch();
        $this->setNome($resultado['nome']);
    }


    public function atualizar()
    {
        try {
            $conexao = Conexao::conectar();
            $sql = 'UPDATE pessoa SET nome = :nome WHERE id_pessoa = :id';
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':nome', $this->getNome());
            $stmt->bindValue(':id', $this->getId());
            $stmt->execute();

            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    //criar um registro
    public function criar()
    {
        try {
            $conexao = Conexao::conectar();
            $sql = "INSERT INTO pessoa(nome) VALUE (:nome)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':nome', $this->getNome());
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    //carrega todos os registros
    public static function listar()
    {
        //isso aqui serve para capturar o erro do ERRMODE_EXCEPTION
        //e não deixar o site quebrar
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT * FROM pessoa";
            $stmt = $conexao->prepare($sql); /*essa poha cria um novo objeto*/
            $stmt->execute();
            $lista = $stmt->fetchAll();
            return $lista;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function deletar()
    {
        try {
            //code
            $conexao = Conexao::conectar();
            $sql = "DELETE FROM pessoa WHERE id_pessoa = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $this->getId());
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
