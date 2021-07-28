<?php
header('Content-Type: text/html; charset=utf-8');
mb_internal_encoding('UTF-8');
class Database {
    
    public static function getConnection(){
        if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
            echo 'We don\'t have mysqli!!!';
        } else {
            echo 'Phew we have it!';
        }
        $envPath = realpath(dirname(__FILE__)."\\..\\env.ini");
        $env = parse_ini_file($envPath);
        $conn = new mysqli($env['host'], $env['username'], $env['password'],$env['database']);
        
        if($conn->connect_error){
            die('Erro de conexão: '. $conn->connect_error);
        }else{
            mysqli_query($conn, "SET NAMES 'utf8'");
            mysqli_query($conn, 'SET character_set_connection=utf8');
            mysqli_query($conn, 'SET character_set_client=utf8');
            mysqli_query($conn, 'SET character_set_results=utf8');
        }
        return $conn;
    }

    public static function getResultFromQuery($sql){
        $conn = self::getConnection();
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    public static function executeSql($sql){
        $conn = self::getConnection();
        if(!mysqli_query($conn, $sql)){
            throw new Exception(mysqli_error($conn));
        }
        $id = $conn->insert_id;
        $conn->close();
        return $id;
    }
}