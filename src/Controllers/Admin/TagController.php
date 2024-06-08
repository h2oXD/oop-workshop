<?php

namespace Fixbu\Assignment\Controllers\Admin;

use Fixbu\Assignment\Commons\Controller;
use Fixbu\Assignment\Models\Tag;
use Rakit\Validation\Validator;

class TagController extends Controller
{
    private Tag $tag;
    public const PATH_VIEW = 'tags.';

    public function __construct()
    {
        $this->tag = new Tag();
    }

    public function index()
    {
        $data['tags'] = $this->tag->all();
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
            back(url('admin/tags/create'));
        } else {
            $data = [
                'name' => $_POST['name'],
            ];
            $this->tag->insert($data);
            $_SESSION['status'] = 'Thao tác thành công';
            back(url('admin/tags'));
        }
    }

    public function show($id)
    {
        $data['tag'] = $this->tag->findByID($id);
        $this->renderAdmin(self::PATH_VIEW . __FUNCTION__, $data);
    }

    public function edit($id)
    {
        $data['tag'] = $this->tag->findByID($id);
        $this->renderAdmin(self::PATH_VIEW . __FUNCTION__,$data);
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
            back(url("admin/tags/$id/edit"));
        } else {
            $data = [
                'name'              => $_POST['name'],
                'updated_at'        => date('Y-m-d H:i:s'),
            ];
            $this->tag->update($id,$data);
            $_SESSION['status'] = 'Thao tác thành công';
            back(url('admin/tags'));
        }
    }

    public function delete($id)
    {
        try {
            $this->tag->delete($id);
            $_SESSION['status'] = 'Thao tác thành công';
        } catch (\Throwable $th) {
            $_SESSION['errors'][] = 'Không thể xoá thẻ (tag) đang có liên kết';
        }
        
        back(url('admin/tags'));
    }
}
