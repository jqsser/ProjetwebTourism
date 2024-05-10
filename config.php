<?php

class config
{
    private static $pdo= NULL;
    public static function getConnexion()
    {
        if(!isset(self::$pdo)){
            try
            {
                self::$pdo = new pdo('mysql:host=localhost;dbname=assurance','root', '',
                [
                    pdo::ATTR_ERRMODE =>pdo::ERRMODE_EXCEPTION,
                    pdo::ATTR_DEFAULT_FETCH_MODE =>pdo::FETCH_ASSOC
                ]);
            }
        catch(Exception $e)
        {
            die('erreur: '.$e->getMessage());
        }}
        return self::$pdo;
    }

};
?>