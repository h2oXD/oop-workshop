<?php

namespace Fixbu\Assignment\Controllers\Admin;

use Fixbu\Assignment\Commons\Controller;
use Fixbu\Assignment\Models\User;

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
        echo __CLASS__ . '@' . __FUNCTION__;
    }

    public function show($id)
    {
        echo __CLASS__ . '@' . __FUNCTION__ . ' - ID = ' . $id;
    }

    public function edit($id)
    {
        echo __CLASS__ . '@' . __FUNCTION__ . ' - ID = ' . $id;
    }

    public function update($id)
    {
        echo __CLASS__ . '@' . __FUNCTION__ . ' - ID = ' . $id;
    }

    public function delete($id)
    {
        $this->user->delete($id);

        header('Location: ' . url('admin/users'));
        exit();
    }
}
