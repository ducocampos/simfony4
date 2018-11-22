<?php
namespace App\DB\CRUD;

interface InterfaceCrud
{
    public function executar($tipo, $debug = false);
    public function executarSQL($debug);
    public function clear();
    public function setTable($table);
    public function setValor(Array $valor);
    public function setSql($sql);
    public function setCampo(Array $campos);
    public function setGroup(string $group);
    public function setParametros(Array $parametros);
    public function setTipoRetorno($tipoRetorno);
    public function setWhere($arrayWhere);
    public function setLimit(Array $limit);
    public function setOrder($order = 'id ASC');
    public function getPdoInstance();
    public function getValor();
    public function getTable();
    public function getSql();
    public function getCampo();
    public function getParametros();
    public function getUltimoId();
    public function getWhere();
    public function getLimit();
    public function getOrder();
    public function getGroup();
}
