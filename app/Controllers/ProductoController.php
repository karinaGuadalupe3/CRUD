<?php

namespace App\Controllers;


use CodeIgniter\RESTful\ResourceController;
use app\Models\ProductoModel;

class ProductoController extends ResourceController
{
    protected $productoModel;
    public function __construct()
    {
        $this->productoModel = new ProductoModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $productos = $this->productoModel->orderBy('id', 'asc')->findAll();

        $data = [
            'productos' => $productos
        ];
        
        return $this->response->setJSON($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $data['producto'] = $this->productoModel->getProduct($id);
        $this->load->view('producto/show', $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
         // Obtén los datos de entrada (por ejemplo, desde una solicitud POST).
    $data = $this->input->post();
    $result = $this->productoModel->createProducto($data);
    // Devuelve una respuesta JSON.
    $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $data['producto'] = $this->productoModel->getProducto($id);
    $this->load->view('producto/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
         // Obtén los datos de entrada (por ejemplo, desde una solicitud PUT).
    $data = $this->Input->input_stream();
    $result = $this->productoModel->updateProducto($id, $data);
    // Devuelve una respuesta JSON.
    $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $result = $this->productoModel->deleteProduct($id);
        // Devuelve una respuesta JSON.
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }
}
