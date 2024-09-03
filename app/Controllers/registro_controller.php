<?php

namespace App\Controllers;

use App\Models\usuario_model;

class registro_controller extends BaseController
{
    public function index()
    {
        return view('registroView');
    }

    public function registrar()
    {
        // Validar la entrada
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'emailUsuario' => 'required|valid_email|is_unique[usuario.emailUsuario]',
            'pwUsuario' => 'required|min_length[8]',
            'dniUsuario' => 'required|min_length[8]|max_length[10]',
            'nombreUsuario' => 'required|max_length[200]',
            'apellidoUsuario' => 'required|max_length[200]',
            'fechaNacimiento' => 'required|valid_date',
            'permisoConducirUsuario' => 'required|max_length[200]',
            'obtencionPermisoUsuario' => 'required|valid_date',
            'caducidadPermisoUsuario' => 'required|valid_date',
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Guardar el usuario
        $usuarioModel = new usuario_model();

        $data = [
            'emailUsuario' => $this->request->getPost('emailUsuario'),
            'pwUsuario' => password_hash($this->request->getPost('pwUsuario'), PASSWORD_DEFAULT),
            'dniUsuario' => $this->request->getPost('dniUsuario'),
            'nombreUsuario' => $this->request->getPost('nombreUsuario'),
            'apellidoUsuario' => $this->request->getPost('apellidoUsuario'),
            'fechaNacimiento' => $this->request->getPost('fechaNacimiento'),
            'permisoConducirUsuario' => $this->request->getPost('permisoConducirUsuario'),
            'obtencionPermisoUsuario' => $this->request->getPost('obtencionPermisoUsuario'),
            'caducidadPermisoUsuario' => $this->request->getPost('caducidadPermisoUsuario'),
        ];

        $usuarioModel->insert($data);

        return redirect()->to(base_url('registro'))->with('success', '¡ Registro realizado con éxito !');
    }
}
