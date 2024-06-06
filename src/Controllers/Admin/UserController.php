<?php

namespace Fixbu\Assignment\Controllers\Admin;

use Fixbu\Assignment\Commons\Controller;
use Fixbu\Assignment\Models\User;
use Rakit\Validation\Validator;

class UserController extends Controller
{
    private User $user;
    public const PATH_VIEW = 'users.';

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $data['users'] = $this->user->all();
        $this->renderAdmin(self::PATH_VIEW . __FUNCTION__, $data);
    }

    public function create()
    {
        $this->renderAdmin(self::PATH_VIEW . __FUNCTION__);
    }

    public function store()
    {
        $validator = new Validator();
        $validation = $validator->make($_POST + $_FILES, [
            'fullName'   => 'required|min:3|max:50',
            'role'       => 'required|numeric',
            'email'      => 'required|email',
            'password'   => 'required|min:3|max:255',

        ]);
        $validation->validate();
        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            back(url('admin/users/create'));
        } else {

            $data = [
                'fullName'   => $_POST['fullName'],
                'role'       => $_POST['role'],
                'email'      => $_POST['email'],
                'password'   => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ];

            if (!empty($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {
                $from = $_FILES['avatar']['tmp_name'];
                $to = '/assets/uploads/' . time() . $_FILES['avatar']['name'];
            }

            if (move_uploaded_file($from, PATH_ROOT . $to)) {
                $data['avatar'] = $to;
                $this->user->insert($data);
                $_SESSION['status'] = 'Thao tác thành công';
                back(url('admin/users'));
            } else {
                $_SESSION['errors'] = 'Upload ảnh không thành công';
                back(url('admin/users/create'));
            }
        }
    }

    public function show($id)
    {
        $data['users'] = $this->user->findByID($id);
        unset($data['users']['password']);
        $this->renderAdmin(self::PATH_VIEW . __FUNCTION__, $data);
    }

    public function edit($id)
    {
        $data['user'] = $this->user->findByID($id);
        $this->renderAdmin(self::PATH_VIEW . __FUNCTION__, $data);
    }

    public function update($id)
    {
        $validator = new Validator();
        $validation = $validator->make($_POST + $_FILES, [
            'fullName'   => 'required|min:3|max:50',
            'role'       => 'required|numeric',
            'email'      => 'required|email',

        ]);
        $validation->validate();
        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            back(url("admin/users/$id/edit"));
        } else {

            $user = $this->user->findByID($id);
            $data = [
                'fullName'   => $_POST['fullName']  ?? $user['fullName'],
                'role'       => $_POST['role']      ?? $user['role'],
                'email'      => $_POST['email']     ?? $user['email'],
            ];

            $check = false;
            if (!empty($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {
                $check = true;
                $from = $_FILES['avatar']['tmp_name'];
                $to = '/assets/uploads/' . time() . $_FILES['avatar']['name'];
            }
            if (move_uploaded_file($from, PATH_ROOT . $to)) {
                $data['avatar'] = $to;
            } else {
                $data['avatar'] = $user['avatar'];
            }

            $this->user->update($id, $data);
            $_SESSION['status'] = 'Thao tác thành công';

            if ($check && $user['avatar'] && file_exists(PATH_ROOT . $user['avatar'])) {
                unlink(PATH_ROOT . $user['avatar']);
            }

            back(url("admin/users/$id/edit"));
        }
    }
    public function delete($id)
    {
        $this->user->delete($id);
        $_SESSION['status'] = 'Thao tác thành công';
        back(url('admin/users'));
    }
}
