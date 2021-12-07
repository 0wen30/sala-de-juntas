<?php 

require_once 'database.php';

class Consultas{

        private $db;
        
        function __construct($nc){
                $this->db = $nc;
        }
        
        function mostrar(){
                return json_encode($this->db->mostrarTodos("SELECT * FROM reservaciones"));
        }
        
        function nuevaSala($id,$nombre){
                return $this->db->modificacion("insert into salas value(".$id.",'".$nombre."')");
        }
        
        function eliminarSala($id){
                return $this->db->modificacion("DELETE FROM salas WHERE id_sala = '$id'");
        }
        
        function nuevaReservacion($nombre,$tema,$inicio,$fin,$sala){
                if($fin - $inicio > 2 || $fin - $inicio <= 0){
                        return false;
                };
                if(!self::salaDisponible($sala) && !self::horaDisponible($inicio)){
                        return false;
                };
                return $this->db->modificacion("INSERT INTO reservaciones(nombre,tema,inicio,fin,id_sala) VALUES ('$nombre','$tema','$inicio','$fin','$sala')");
        }
        
        function eliminarReservacion($id){
                return $this->db->modificacion("DELETE FROM reservaciones WHERE id_sala = '$id'");
        }
        function salaDisponible($sala){
                $arr = $this->db->consulta("SELECT count(*) as ocupado FROM reservaciones WHERE id_sala = $sala");
                return $arr["ocupado"] == 0;
        }
        function horaDisponible($inicio){
                $arr = $this->db->consulta("SELECT count(*) as ocupado FROM reservaciones WHERE inicio <= '".$inicio."' AND fin > '".$inicio."'");
                return $arr["ocupado"] == 0;
        }
       
}

/*
$nc = new Conexion();

$c = new Consultas($nc);

$c->nuevaReservacion("uno","uno",9,11,1);
echo "<hr>";
echo $c->mostrar();
*/

?>