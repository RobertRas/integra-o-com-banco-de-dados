
<?php
//quando o arquivo só tem php não precisa fechar a tag
require_once __DIR__ ."/../config.php";

class Conexao {
    public static function conectar(){
        /*$conn é uma variavel padrao de conexão */
        /*PDO é uma classe nativa do php para conexão com BD */
        /*essa linha é para conectar com o BD */
        $conn = new PDO(DRIVE . ':host=' . LOCAL_DO_BANCO . '; dbname=' . NOME_DO_BANCO . ';chartset='. CHARSET ,USUARIO, SENHA);

        /*agora iremos tratar possíveis erros que podem acontecer ao conectar*/
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        //o ERRMODE_EXCEPTION emite o erro mas se não for usar o try catch o site quebra
    }
}
