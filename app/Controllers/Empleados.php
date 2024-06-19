<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmpleadosModel;
use App\Models\UsuariosModel;

class Empleados extends BaseController
{

    protected $helpers = ['form'];
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $empleadosModel = new EmpleadosModel();
        $data['empleados'] = $empleadosModel->empleadosUsuarios();


        return view('empleados/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $usuariosModel = new UsuariosModel();
        $data['usuarios'] = $usuariosModel->findAll();

        return view('empleados/nuevo', $data); //vista para el nuevo registro del empleado

    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        // validaciones formulario nuevo-empleado
        $reglas = [
            'id_tipo_usuario' => 'required|is_not_unique[usuarios.id]', //validacion que exista el id de TipoUsuario
            'clave' => 'required|min_length[8]|max_length[10]|is_unique[empleados.clave]',
            'nombre' => 'required', //obligatorio
            'apellidos' => 'required',
            'email' => 'required',
            'sexo' => 'required',
            'cp' => 'required',
            'colonia' => 'required',
            'delegacion_municipio' => 'required'

        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost([
            'id_tipo_usuario',
            'clave',
            'nombre',
            'apellidos',
            'email',
            'sexo',
            'cp',
            'colonia',
            'delegacion_municipio'
        ]);

        $empleadosModel = new EmpleadosModel();
        $empleadosModel->insert([
            'id_tipo_usuario' => ($post['id_tipo_usuario']),
            'clave' => trim($post['clave']),
            'nombre' => trim($post['nombre']),
            'apellidos' => ($post['apellidos']),
            'email' => trim($post['email']),
            'sexo' => trim($post['sexo']),
            'cp' => ($post['cp']),
            'colonia' => ($post['colonia']),
            'delegacion_municipio' => ($post['delegacion_municipio']),
        ]);

        return redirect()->to('empleados');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        if ($id == null) {
            return redirect()->to('empleados');
        }

        $empleadosModel = new EmpleadosModel();
        $usuariosModel = new UsuariosModel();

        $data['usuarios'] = $usuariosModel->findAll();
        $data['empleado'] = $empleadosModel->find($id);

        return view('empleados/editar', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
         if (!$this->request->is('put') || $id == null) {
         return redirect()->to('empleados');
         }

        $reglas = [
            'id_tipo_usuario' => 'required|is_not_unique[usuarios.id]',
            'clave' => "required|min_length[8]|max_length[10]|is_unique[empleados.clave,id,{$id}]", //campo unico deshabilitado para poder registrar
            'nombre' => 'required', //obligatorio
            'apellidos' => 'required',
            'email' => 'required',
            'sexo' => 'required',
            'cp' => 'required',
            'colonia' => 'required',
            'delegacion_municipio' => 'required'

        ];

        if (!$this->validate($reglas)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }

        $post = $this->request->getPost([
            'id_tipo_usuario',
            'clave',
            'nombre',
            'apellidos',
            'email',
            'sexo',
            'cp',
            'colonia',
            'delegacion_municipio'
        ]);

        $empleadosModel = new EmpleadosModel();
        $empleadosModel->update($id, [
            'id_tipo_usuario' => ($post['id_tipo_usuario']),
            'clave' => trim($post['clave']),
            'nombre' => trim($post['nombre']),
            'apellidos' => ($post['apellidos']),
            'email' => trim($post['email']),
            'sexo' => trim($post['sexo']),
            'cp' => ($post['cp']),
            'colonia' => ($post['colonia']),
            'delegacion_municipio' => ($post['delegacion_municipio']),
        ]);

        return redirect()->to('empleados');
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        if (!$this->request->is('delete') || $id == null) {
            return redirect()->to('empleados');
            }

        $empleadosModel = new EmpleadosModel();
        $empleadosModel->delete ($id);

        return redirect()->to('empleados');
    }
}
