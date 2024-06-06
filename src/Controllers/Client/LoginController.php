<?php

namespace Fixbu\Assignment\Controllers\Client;

use Fixbu\Assignment\Commons\Controller;
use Fixbu\Assignment\Models\User;
use Rakit\Validation\Validator;

class LoginController extends Controller
{
    private User $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function showFormLogin()
    {
        $this->renderClient('login');
    }
    public function login()
    {
        $validator = new Validator();
        $validation = $validator->make(
            $_POST,
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
        );
        $validation->validate();
        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            back(url('login'));
        } else {
            // $data = [
            //     'email' => $_POST['email'],
            //     'password' => $_POST['pasword'],
            // ];                
            try {

                $user =  $this->user->findByEmail($_POST['email']);
                if (empty($user['email'])) {
                    $_SESSION['errors'][] = 'Không tồn tại email ' . $_POST['email'];
                    back(url('login')); 
                } else {
                    $check = password_verify($_POST['password'], $user['password']);
                    if ($check && $user['role'] === 1) {
                        $_SESSION['user'] = $user;
                        back(url('admin/'));
                    } else if ($check && $user['role'] === 0) {
                        $_SESSION['user'] = $user;
                        back(url(''));
                    }
                    $_SESSION['errors'][] = 'Password không đúng';
                    back(url('login'));
                }
            } catch (\Throwable $th) {
                $_SESSION['errors'] = $th->getMessage();
                back(url('login'));
            }
        }
    }
    public function logout()
    {
        unset($_SESSION['user']);
        back(url(''));
    }
}
