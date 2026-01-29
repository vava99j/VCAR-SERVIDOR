<?php

final class Conexao
{
    private static ?PDO $instancia = null;

    private function __construct() {}
    private function __clone() {}

    public static function conexao(): PDO
    {
        if (self::$instancia === null) {
            self::$instancia = new PDO(
                'mysql:host=localhost;dbname=VCAR;charset=utf8mb4',
                'vjorr',
                '',
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );
        }

        return self::$instancia;
    }
}
