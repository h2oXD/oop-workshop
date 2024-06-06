<?php

namespace Fixbu\Assignment\Controllers\Admin;

use Fixbu\Assignment\Commons\Controller;
use Fixbu\Assignment\Models\Category;
use Rakit\Validation\Validator;

class CategoryController extends Controller
{
    private Category $category;
    public const PATH_VIEW = 'categories.';

    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        $data['categories'] = $this->category->all();
        $this->renderAdmin(self::PATH_VIEW . __FUNCTION__, $data);
    }

    public function create()
    {
        $this->renderAdmin(self::PATH_VIEW . __FUNCTION__);
    }

    public function store()
    {
        $validator = new Validator();
        $validation = $validator->make(
            $_POST,
            [
                'name' => 'required|min:3|max:32'
            ],
        );
        $validation->validate();
        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            back(url('admin/categories/create'));
        } else {
            $data = [
                'name' => $_POST['name'],
            ];
            $this->category->insert($data);
            $_SESSION['status'] = 'Thao tác thành công';
            back(url('admin/categories'));
        }
    }

    public function show($id)
    {
        $data['category'] = $this->category->findByID($id);
        $this->renderAdmin(self::PATH_VIEW . __FUNCTION__, $data);
    }

    public function edit($id)
    {
        $data['category'] = $this->category->findByID($id);
        $this->renderAdmin(self::PATH_VIEW . __FUNCTION__, $data);
    }

    public function update($id)
    {
        $validator = new Validator();
        $validation = $validator->make(
            $_POST,
            [
                'name' => 'required|min:3|max:32'
            ],
        );
        $validation->validate();
        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            back(url("admin/categories/$id/edit"));
        } else {
            $data = [
                'name' => $_POST['name'],
            ];
            $this->category->update($id,$data);
            $_SESSION['status'] = 'Thao tác thành công';
            back(url('admin/categories'));
        }
    }

    public function delete($id)
    {
        $this->category->delete($id);
        back(url('admin/categories'));
    }
}
