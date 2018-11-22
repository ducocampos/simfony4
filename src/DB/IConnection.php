<?php
namespace App\DB;

interface IConnection {
    public static function setUsuario(string $usuario);
    public static function setSenha(string $senha);
    public static function setTipo(string $tipo);
    public static function setHost(string $host);
    public static function setBancoDados(string $bancoDados);
    public static function getPDO($novaInstancia = false);
}