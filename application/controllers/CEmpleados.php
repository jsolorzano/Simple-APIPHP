<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CEmpleados extends CI_Controller {

    public function __construct() {
        parent::__construct();



        // Load database
        $this->load->model('MEmpleados');
    }

    // Método para cargar lista de empleados
    public function index() {
        $data = $this->MEmpleados->obtener();
        /// Convertimos los datos resultantes a formato JSON
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    // Método para editar
    public function details() {

        //PROCESA EL FORMATO DE ANGULAR
        $id_empleado = $this->input->get('empleadoID');

        $result = $this->MEmpleados->obtenerById($id_empleado);

        /// Convertimos los datos resultantes a formato JSON
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    // Método para guardar datos de empleado
    public function register() {
        //PROCESA EL FORMATO DE ANGULAR
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        
        //print_r($request);
        //$id = $request->id;
        $nombre = $request->nombre;
        $descripcion = $request->descripcion;

        $datos = array(
            //'id' => $id,
            'nombre' => $nombre,
            'descripcion' => $descripcion
        );

        $result = $this->MEmpleados->insert($datos);

        if ($result) {
            echo '{"response":"ok"}';            
        }
    }

    // Método para guardar datos de empleado
    public function save() {
        //PROCESA EL FORMATO DE ANGULAR
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        
        //print_r($request);
        $id = $request->id;
        $nombre = $request->nombre;
        $descripcion = $request->descripcion;

        $datos = array(
            'id' => $id,
            'nombre' => $nombre,
            'descripcion' => $descripcion
        );

        $result = $this->MEmpleados->update($datos);

        if ($result) {
            echo '{"response":"ok"}';
        }
    }

    // Método para eliminar
    public function delete() {
		
		//PROCESA EL FORMATO DE ANGULAR
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        
        $id = $request->empleadoID;

        $result = $this->MEmpleados->delete($id);
        
        if ($result) {
            echo '{"response":"ok"}';
        }
    }

}
