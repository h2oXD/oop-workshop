<?php

namespace Fixbu\Assignment\Controllers\Admin;

use Fixbu\Assignment\Commons\Controller;
use Fixbu\Assignment\Models\Author;
use Rakit\Validation\Validator;

class AuthorController extends Controller
{
    private Author $author;
    public const PATH_VIEW = 'authors.';

    public function __construct()
    {
        $this->author = new Author();
    }

    public function index()
    {
        $data['authors'] = $this->author->all();
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
            'name'   => 'required|min:3|max:50',
        ]);
        $validation->validate();
        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            back(url('admin/authors/create'));
        } else {

            $data = [
                'name'   => $_POST['name'],
            ];

            if (!empty($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {
                $from = $_FILES['avatar']['tmp_name'];
                $to = '/assets/uploads/' . time() . $_FILES['avatar']['name'];
            }

            if (move_uploaded_file($from, PATH_ROOT . $to)) {
                $data['avatar'] = $to;
                $this->author->insert($data);
                $_SESSION['status'] = 'Thao tác thành công';
                back(url('admin/authors'));
            } else {
                $_SESSION['errors'][] = 'Upload ảnh không thành công';
                back(url('admin/authors/create'));
            }
        }
    }

    public function show($id)
    {
        $data['author'] = $this->author->findByID($id);
        $this->renderAdmin(self::PATH_VIEW . __FUNCTION__, $data);
    }

    public function edit($id)
    {
        $data['author'] = $this->author->findByID($id);
        $this->renderAdmin(self::PATH_VIEW . __FUNCTION__, $data);
    }

    public function update($id)
    {
        $validator = new Validator();
        $validation = $validator->make($_POST + $_FILES, [
            'name'   => 'required|min:3|max:50',
        ]);
        $validation->validate();
        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            back(url('admin/authors/create'));
        } else {
            $author = $this->author->findByID($id);
            $data = [
                'name'   => $_POST['name'] ?? $author['name'],
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
                $data['avatar'] = $author['avatar'];
                $_SESSION['errors'][] = 'Upload ảnh không thành công';
                back(url('admin/authors/create'));
            }

            $this->author->update($id, $data);
            $_SESSION['status'] = 'Thao tác thành công';

            if ($check && $author['avatar'] && file_exists(PATH_ROOT . $author['avatar'])) {
                unlink(PATH_ROOT . $author['avatar']);
            }

            back(url('admin/authors'));
        }
    }

    public function delete($id)
    {
        try {
            $this->author->delete($id);
            $_SESSION['status'] = 'Thao tác thành công';
        } catch (\Throwable $th) {
            $_SESSION['errors'][] = 'Không thể xoá tác giả đang có liên kết với bài viết';
        }
        

        header('Location: ' . url('admin/authors'));
        exit();
    }
}
