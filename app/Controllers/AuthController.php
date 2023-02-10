<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class AuthController extends BaseController
{
    public function index()
    {
        //
        return view('auth/login');
    }

    public function register(){
        helper(['form']);
        $data = [];
        return view('auth/register', $data);
    }

    function save(){
        helper(['form']);
        $rules = [
            'username'             => 'required|min_length[3]|max_length[20]',
            'email'                => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
            'password'             => 'required|min_length[6]|max_length[200]',
            'confirm_password'     => 'matches[password]'
        ];

        if($this->validate($rules)){
            $model = new AuthModel();
            $data = [
                'username' => $this->request->getVar('username'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->route('login');
        }else{
            $data['validation'] = $this->validator;
            return view('auth/register', $data);
        }
    }

    function login(){
        $session = session();
        $model = new AuthModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'user_id'       => $data['id'],
                    'user_name'     => $data['username'],
                    'user_email'    => $data['email'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->route('dashboard');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->route('login');
            }
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->route('login');
    }
}
