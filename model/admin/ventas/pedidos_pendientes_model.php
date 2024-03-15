<?php
class pedidos_pendientes_model
{
    private $con;
    public function __construct()
    {
        //$this->con = new mysqli("localhost","edutech","edutechadso2024","edutech");
        $this->con = new mysqli("localhost", "root", "", "edutech");
        $this->con->set_charset("utf8");
    }

    public function obtener_pedidos()
    {
        $sql = 'SELECT * FROM `order`';
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            $pedidos = array();
            while ($row = $result->fetch_assoc()) {
                $pedidos[] = $row;
            }
            return $pedidos;
        } else {
            return false;
        }
    }

    public function obtener_detalle_pedidos($id){
        $sql="SELECT * FROM `detail_order` WHERE order_id = '$id'";
        $result=$this->con->query($sql);
        if ($result->num_rows > 0) {
            $detalle = array();
            while ($row = $result->fetch_assoc()) {
                $detalle[] = $row;
            }
            return $detalle;
        } else {
            return false;
        }
    }


    public function eliminar_pedidos_detalle($id)
    {
        $sql = "DELETE FROM `detail_order` WHERE order_id= '$id'";
        $result = $this->con->query($sql);
        if ($result) {
            $orden=$this->eliminar_pedidos_orden($id);
            if($orden){
                return true;
            }else{
                return false;
            }
            return true;
        } else {
            return false;
        }
    }

    public function eliminar_pedidos_orden($id)
    {
        $sql = 'DELETE FROM `order` WHERE id = ' . $id;
        $result = $this->con->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}