<?php
require_once __DIR__ . '/../configs/conexao.php';

class Usuario
{
    //aqui eu defino os atributos da classe usuario como privados. por quê?
    //para que usuarios não tenham como acessar de forma direta esses atributos
    //posso realizar verificações antes de atribuir ou modificar valores
    private $id_usuario;
    private $email;

    private $senha;

    private $nivel_acesso;



    public function __construct($id = false)
    {
        if ($id) {
            $this->id_usuario = $id;

            $this->carregar();
        }
    }

    //aqui eu consigo consultar os dados com o método GET
    //ou posso alterá-los com o método SET


    //serve para retornar o valor do id
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }
    public function setIdUsuario($idUsuario)
    {
        $this->id_usuario = $idUsuario;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getsenha()
    {
        return $this->senha;
    }
    public function setsenha($senha)
    {
        $this->senha = $senha;
    }
    public function getnivelacesso()
    {
        return $this->nivel_acesso;
    }
    public function setnivelacesso($nivelacesso)
    {
        $this->nivel_acesso = $nivelacesso;
    }

    //carrega um registro
    public function carregar()
    {
        $conexao = Conexao::conectar();
        $sql = 'SELECT * FROM usuario WHERE id_usuario = :id';
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id', $this->getIdUsuario());
        $stmt->execute();
        $resultado = $stmt->fetch();
        $this->setEmail($resultado['email']);
        $this->setsenha($resultado['senha']);
        $this->setnivelacesso($resultado['nivel_acesso']);
    }


    public function atualizar()
    {
        try {
            $conexao = Conexao::conectar();
            $sql = 'UPDATE usuario SET email = :email, senha = :senha WHERE id_usuario = :id';
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':email', $this->getEmail());
            $stmt->bindValue(':senha', $this->getsenha());
            $stmt->bindValue(':id', $this->getIdUsuario());
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    //criar um registro
    public function criar(){
        try {
            $conexao = Conexao::conectar();
            $sql = "INSERT INTO usuario(email, senha) VALUES (:email, :senha)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':email', $this->getEmail());
            $stmt->bindValue(':senha', $this->getsenha());
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
            $sql = "SELECT * FROM usuario";
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
            $sql = "DELETE FROM usuario WHERE id_usuario = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id', $this->getIdUsuario());
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
