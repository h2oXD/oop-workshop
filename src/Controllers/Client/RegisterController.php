<?php

namespace Fixbu\Assignment\Controllers\Client;

use Fixbu\Assignment\Commons\Controller;
use Fixbu\Assignment\Models\User;
use Rakit\Validation\Validator;

class RegisterController extends Controller
{
    private User $user;
    public function __construct()
    {
        $this->user = new User();
    }

    public function showFormRegister()
    {
        $this->renderClient('register');
    }

    public function register()
    {
        $validator = new Validator();
        $validation = $validator->make(
            $_POST,
            [
                'fullName'          => 'required|min:3|max:32',
                'email'             => 'required|email',
                'password'          => 'required|min:8|max:32',
                'confirm-password'  => 'required|min:8|max:32',
            ],
        );
        $validation->validate();
        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            back(url('register'));
        } else {
            $data = [
                'fullName'      => $_POST['fullName'],
                'email'         => $_POST['email'],
                'password'      => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ];
            try {
                $user =  $this->user->findByEmail($_POST['email']);
                if (!empty($user['email'])) {
                    $_SESSION['errors']['unique'] = 'Đã tồn tại email: ' . $_POST['email'];
                    back(url('register'));
                } else {
                    $this->user->insert($data);
                    $_SESSION['status'] = 'Đăng ký thành công';
                    back(url('register'));
                }
            } catch (\Throwable $th) {
                $_SESSION['errors'][] = $th->getMessage();
                dd($_SESSION);
                back(url('register'));
            }
        }
    }
}
