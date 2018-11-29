<?php
namespace App\DB\CRUD;
use App\DB\MySQLConnection;

abstract class AbstractCrud implements InterfaceCrud
{

    private $pdoInstance;
    private $table;
    private $sql;
    private $campos;
    private $where;
    private $tipoRetorno = \PDO::FETCH_OBJ;
    private $parametros;
    private $valores;
    private $group = '';
    private $limit = '';
    private $order = ' id ASC ';

    public function __construct(\PDO $pdoInstance)
    {
        $this->pdoInstance = $pdoInstance;
    }

    /**
    *Trata criterio
    */
    public function executar($tipo, $debug = false)
    {
        if( empty($this->table)){
            return 'Configuração não definida!';
        }
        switch($tipo){
            case 'select':{
                if( empty($this->sql) && !empty($this->campos) ){
                    $this->sql = (!empty($this->where)) ?
                    'SELECT ' . $this->campos . ' FROM ' . $this->table . ' WHERE ' . $this->where . $this->group . ' ORDER BY ' . $this->order . $this->limit:
                    'SELECT ' . $this->campos . ' FROM ' . $this->table . $this->group . ' ORDER BY ' . $this->order . $this->limit;
                }
            }break;
            case 'insert':{
                if( empty($this->sql) && !empty($this->campos) ){
                    $this->sql = 'INSERT INTO ' . $this->table . '(' . $this->campos . ') VALUES (' . $this->valores . ')';
                }
            }break;
            case 'insert_ignore':{
                if( empty($this->sql) && !empty($this->campos) ){
                    $this->sql = 'INSERT IGNORE INTO ' . $this->table . '(' . $this->campos . ') VALUES (' . $this->valores . ')';
                }
            }break;
           case 'replace':{
                if( empty($this->sql) && !empty($this->campos) ){
                    $this->sql = 'REPLACE INTO ' . $this->table . '(' . $this->campos . ') VALUES (' . $this->valores . ')';
                }
            }break;
            case 'delete':{
                if( empty($this->sql) && !empty($this->where) ){
                    $this->sql = 'DELETE FROM ' . $this->table . ' WHERE ' . $this->where;
                }
            }break;
            case 'update':{
                if( empty($this->sql) && !empty($this->where) ){
                    $this->sql = 'UPDATE ' . $this->table . ' SET ' . $this->valores . ' WHERE ' . $this->where;
                }
            }break;
            default:{
                return "Opção inválida!";
            }break;
        }
        return $this->executarSQL($debug);
    }

    /**
    *Executa consulta SQL
    */
    public function executarSQL($debug)
    {
        if($debug){
            var_dump($this->parametros);
            var_export($this->sql);
        }
        try {
            if( !$this->validaConexao() ) $this->pdoInstance = MySQLConnection::getPDO(true);

            $stmt = $this->pdoInstance->prepare($this->sql);
            $exec = (!empty($this->parametros)) ? $stmt->execute($this->parametros) : $stmt->execute();
            $tipo = explode(' ',$this->sql)[0];
            $arrayTipo = ['INSERT', 'DELETE', 'UPDATE'];
            if ($exec) {
                $resultado = (in_array($tipo, $arrayTipo)) ? $exec : $stmt->fetchAll($this->tipoRetorno);
                $this->clear();
                return $resultado;
            }
            $this->clear();
            return false;
        } catch (\PDOException $e) {
            return $e->getMessage();
        }

        return false;
    }

    public function validaConexao()
    {
        $stmt = $this->pdoInstance->prepare("SHOW TABLES");
        $exec = $stmt->execute();
        return !!$stmt->rowCount();
    }

    /**
    *Restaura estado padrao dos parametros
    */
    public function clear()
    {
        $this->table = null;
        $this->sql = null;
        $this->campos = null;
        $this->where = null;
        $this->parametros = null;
        $this->valores = null;
        $this->group = '';
        $this->limit = '';
    }

    /**
    *Set's
    */

    /**
    *Define tabela
    */
    public function setTable($table)
    {
        if( !empty($table) ){
            $this->table = $table;
            return $this;
        }
        return false;
    }

    /**
    *Define valores insert
    */
    public function setValor(array $valor)
    {
        if( !empty($valor) ){
            $this->valores = implode(' , ', $valor);
            return $this;
        }
        return false;
    }

    /**
    *Define SQL
    */
    public function setSql($sql)
    {
        if( !empty($sql) ){
            $this->sql = $sql;
            return $this;
        }
        return false;
    }

    /**
    *Define Campos
    */
    public function setCampo(Array $campos)
    {
        if( !empty($campos) ){
            $this->sql = '';
            $this->campos = implode(" , ",$campos);
            return $this;
            
        }
        return false;
    }

    /**
    *Define criterio Group BY
    */
    public function setGroup(string $group)
    {
        if( !empty($group) ){
            $this->group = ' GROUP BY ' . $group;
            return $this;
        }
        return false;
    }

    /**
    *Define Parametros
    *Ex: [:id=>VALUE]
    */
    public function setParametros(Array $parametros)
    {
        if( !empty($parametros) ){
            $this->parametros = $parametros;
            return $this;
        }
        return false;
    }

    /**
    *Define tipo de retorno
    *Ex: FETCH_OBJ
    */
    public function setTipoRetorno($tipoRetorno)
    {
        if( !empty($tipoRetorno) ){
            $this->tipoRetorno = $tipoRetorno;
            return $this;
        }
        return false;
    }

    /**
    *Define tipo criterio busca
    */
    public function setWhere($where)
    {
        if( !empty($where) ){
            $this->where = $where;
            return $this;
        }
        return false;
    }

    /**
    *Limite da consulta
    */
    public function setLimit(Array $limit)
    {
        if( !empty($limit) ){
            $this->limit = (array_key_exists(1,$limit)) ? ' LIMIT '.$limit[0].','.$limit[1] : ' LIMIT 0, '.$limit[0] ;
            return $this;
        }
        return false;
    }

    /**
    *Ordenacao dos dados
    */
    public function setOrder($order = 'id ASC')
    {
        $this->order = $order;
        return $this;
    }

    /**
    *Get's
    */

    /**
    *Retorna objeto PDO
    */
    public function getPdoInstance()
    {
        return $this->pdoInstance;
    }

    /**
    *Retorna valores
    */
    public function getValor()
    {
        return $this->valores;
    }

    /**
    *Retorna tabela
    */
    public function getTable()
    {
        return $this->table;
    }

    /**
    *Retorna SQL
    */
    public function getSql()
    {
        return $this->sql;
    }

    /**
    *Retorna Campos
    */
    public function getCampo()
    {
        return $this->campos;
    }

    /**
    *Retorna Parametros
    */
    public function getParametros()
    {
        return $this->parametros;
    }

    /**
    *Obter ultimo id
    */
    public function getUltimoId()
    {
        return $this->pdoInstance->lastInsertId();
    }

    /**
    *Retorna tipo criterio busca
    */
    public function getWhere()
    {
        return $this->where;
    }

    /**
    *Retorna limite da consulta
    */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
    *Retorna ordem dos dados
    */
    public function getOrder()
    {
        return $this->order;
    }

    /**
    *Retorna group by
    */
    public function getGroup()
    {
        return $this->group;
    }
}
