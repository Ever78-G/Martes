<?php

Class Database{
    public static function connect(){
        $db = new mysqli('localhosy','root','','veterianaria');
        $db ->query("SET NAME 'utf8'");
        return $db;
    }
}