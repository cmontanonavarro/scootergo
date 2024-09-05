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
            'emailUsuario' => [
                'label' => 'Correo Electrónico',
                'rules' => 'required|valid_email|is_unique[usuario.emailUsuario]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'valid_email' => 'El campo {field} no es válido.',
                    'is_unique' => 'El campo {field} ya se encuentra registrado.',
                ],
            ],
            'pwUsuario' => [
                'label' => 'Contraseña',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'min_length' => 'El campo {field} debe tener al menos {param} caracteres.',
                ],
            ],
            'confirmPwUsuario' => [
                'label' => 'Confirmación de Contraseña',
                'rules' => 'required|matches[pwUsuario]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'matches' => 'El campo {field} no coincide con la contraseña.',
                ],
            ],
            'dniUsuario' => [
                'label' => 'DNI',
                'rules' => 'required|numeric|min_length[8]|max_length[10]|is_unique[usuario.dniUsuario]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'numeric' => 'El campo {field} debe contener solo números.',
                    'min_length' => 'El campo {field} debe tener al menos {param} caracteres.',
                    'max_length' => 'El campo {field} no puede tener más de {param} caracteres.',
                    'is_unique' => 'El campo {field} ya se encuentra registrado.',
                ],
            ],
            'nombreUsuario' => [
                'label' => 'Nombre',
                'rules' => 'required|alpha_space|max_length[200]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'alpha_space' => 'El campo {field} solo debe contener letras y espacios.',
                    'max_length' => 'El campo {field} no puede tener más de {param} caracteres.',
                ],
            ],
            'apellidoUsuario' => [
                'label' => 'Apellido',
                'rules' => 'required|alpha_space|max_length[200]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'alpha_space' => 'El campo {field} solo debe contener letras y espacios.',
                    'max_length' => 'El campo {field} no puede tener más de {param} caracteres.',
                ],
            ],
            'fechaNacimiento' => [
                'label' => 'Fecha de Nacimiento',
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'valid_date' => 'El campo {field} debe ser una fecha válida.',
                ],
            ],
            'obtencionPermisoUsuario' => [
                'label' => 'Fecha de Obtención de Carnet',
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'valid_date' => 'El campo {field} debe ser una fecha válida.',
                ],
            ],
            'caducidadPermisoUsuario' => [
                'label' => 'Fecha de Caducidad de Carnet',
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'valid_date' => 'El campo {field} debe ser una fecha válida.',
                ],
            ],
        ]);

        // Si la validación falla
        if (!$validation->withRequest($this->request)->run()) {
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
