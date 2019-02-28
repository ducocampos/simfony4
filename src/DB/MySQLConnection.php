<?php
namespace App\DB;

/**
* Classe criada caso seja necessario acesso a bancos de dados diferentes.
*/
class MySQLConnection implements IConnection
{
    private static $usuario = 'eduardo';
    private static $senha = 'teste';
    private static $host = 'localhost';
    private static $bancoDados = 'teste';
    private static $tipo = 'mysql';
    private static $pdo;

    private function __construct()
    {
    }

    /**
    *Retorna conexão com base de dados
    *@param $novaInstancia = Se TRUE cria uma nova instância PDO, Se FALSE retorna instância PDO já criada
    *@return \PDO
    */
    public static function getPDO($novaInstancia = false)
    {
        if(!self::$pdo || $novaInstancia){
            self::$pdo = new \PDO(
                self::$tipo.":host=".self::$host.";"."dbname=".self::$bancoDados, self::$usuario, self::$senha
            );
            self::$pdo->exec("set names utf8");
        }
        return self::$pdo;
    }

    /**
    *Set's
    */
    public static function setUsuario(string $usuario)
    {
        if(!trim($usuario)) return false;
        self::$usuario = trim($usuario);
    }
    public static function setSenha(string $senha)
    {
        if(!trim($senha)) return false;
        self::$senha = trim($senha);
    }
    public static function setTipo($tipo = 'mysql')
    {
        self::$tipo = trim($tipo);
    }
    public static function setHost(string $host)
    {
        if(!trim($host)) return false;
        self::$host = trim($host);
    }
    public static function setBancoDados(string $bancoDados)
    {
        if(!trim($bancoDados)) return false;
        self::$bancoDados = trim($bancoDados);
    }

}
