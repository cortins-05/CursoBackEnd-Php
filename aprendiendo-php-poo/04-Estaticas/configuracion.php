<?php

class Configuracion{
    public static $color;
    public static $newsletter;
    public static $entorno;


    static function getColor(){
        return self::$color;
    }
    static function getNewsletter(){
        return self::$newsletter;
    }
    static function getEntorno(){
        return self::$entorno;
    }

    static function setColor($color){
        self::$color=$color;
    }
    static function setNewsletter($newsletter){
        self::$newsletter=$newsletter;
    }
    static function setEntorno($entorno){
        self::$entorno=$entorno;
    }

}

?>