
<?php 

class Conexion{

    private $conexion;

    function __construct(){
        try {
            $bdd = "mysql:host=fdb31.batcave.net;dbname=3909472_bd";
            $this->$conexion = new PDO($bdd, "3909472_bd", "zxcvbnm123+-");
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    function consulta($sql){
        try {
            $sentencia = $this->$conexion->prepare($sql);
            $sentencia->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        return $sentencia->fetch(PDO::FETCH_ASSOC);
    }
    
    function modificacion($sql){
        try {
            $sentencia = $this->$conexion->prepare($sql);
            $sentencia->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        return $sentencia->rowCount();;
    }
    
    function mostrarTodos($sql){
        try {
            $sentencia = $this->$conexion->prepare($sql);
            $sentencia->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

}