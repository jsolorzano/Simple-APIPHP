<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MEmpleados extends CI_Model {

    public function __construct() {

        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the empleados
    public function obtener() {
        $query = $this->db->get('empleados');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    //Public method to obtain the empleados by id
    public function obtenerById($id) {
        $query = $this->db->where('id', $id);
        $query = $this->db->get('empleados');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Public method to insert the data
    public function insert($datos) {
        $result = $this->db->where('nombre =', $datos['nombre']);
        $result = $this->db->get('empleados');
        if ($result->num_rows() > 0) {
            echo '1';
        } else {
            $result = $this->db->insert("empleados", $datos);
            return $result;
        }
    }

    // Public method to update a record  
    public function update($datos) {
        $result = $this->db->where('id', $datos['id']);
        $result = $this->db->update('empleados', $datos);
        return $result;
    }

    // Public method to delete a record
    public function delete($id) {
        $result = $this->db->delete('empleados', array('id' => $id));
        return $result;
    }

}

?>
