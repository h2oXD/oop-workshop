<?php

namespace Fixbu\Assignment\Controllers\Admin;

use Fixbu\Assignment\Commons\Controller;
use Fixbu\Assignment\Models\Author;
use Fixbu\Assignment\Models\Category;
use Fixbu\Assignment\Models\Post;
use Fixbu\Assignment\Models\PostTag;
use Fixbu\Assignment\Models\Tag;
use Rakit\Validation\Validator;

class PostController extends Controller
{
    private Post $post;
    private Category $category;
    private Tag $tag;
    private Author $author;
    private PostTag $postTag;

    public const PATH_VIEW = 'posts.';

    public function __construct()
    {
        $this->post = new Post();
        $this->category = new Category();
        $this->tag = new Tag();
        $this->author = new Author();
        $this->postTag = new PostTag();
    }

    public function index()
    {
        $data['posts'] = $this->post->allPostAndJoin();
        $this->renderAdmin(self::PATH_VIEW . __FUNCTION__, $data);
    }

    public function create()
    {
        $data['categories'] = $this->category->all();
        $data['tags'] = $this->tag->all();
        $data['authors'] = $this->author->all();
        $this->renderAdmin(self::PATH_VIEW . __FUNCTION__, $data);
    }

    public function store()
    {
        $validator = new Validator();
        $validation = $validator->make($_POST + $_FILES, [
            'title'             => 'required|min:3|max:100',
            'category_id'       => 'required|numeric',
            'author_id'         => 'required|numeric',
            'excerpt'           => 'required|min:3|max:255',
            'content'           => 'required|min:3',
            'status'            => 'required',
            'thubmnail'         => 'uploaded_file:0,2M,png,jpeg,jpg,webp',
            'tags'              => 'required',
        ]);
        $validation->validate();
        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            back(url('admin/posts/create'));
        } else {
            $data = [
                'title'             => $_POST['title']              ?? null,
                'category_id'       => $_POST['category_id']        ?? null,
                'author_id'         => $_POST['author_id']          ?? null,
                'excerpt'           => $_POST['excerpt']            ?? null,
                'content'           => $_POST['content']            ?? null,
                'status'            => $_POST['status']             ?? null,
                'is_show_home'      => $_POST['is_show_home']       ?? 0,
                'is_trending'       => $_POST['is_trending']        ?? 0,
                'is_editors_pick'   => $_POST['is_editors_pick']    ?? 0,
            ];
            if (!empty($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0) {
                $from = $_FILES['thumbnail']['tmp_name'];
                $to = '/assets/uploads/' . time() . $_FILES['thumbnail']['name'];
                if (move_uploaded_file($from, PATH_ROOT . $to)) {

                    $data['thumbnail'] = $to;
                    $lastID = $this->post->insertGetLastID($data);
                    $this->postTag->insertPostTag($lastID, $_POST['tags']);

                    $_SESSION['status'] = 'Thao tác thành công';
                    back(url('admin/posts'));
                } else {
                    $_SESSION['errors']['thumbnail'] = 'Upload không thành công';
                    back(url('admin/posts/create'));
                }
            }
        }
    }

    public function show($id)
    {
        $data['posts'] = $this->post->postByID($id);

        $this->renderAdmin(self::PATH_VIEW . __FUNCTION__, $data);
    }

    public function edit($id)
    {
        $data['post']       = $this->post->findByID($id);
        $data['categories'] = $this->category->all();
        $data['tags']       = $this->tag->all();
        $data['authors']    = $this->author->all();
        $data['post_tag']   = $this->postTag->findByPostID($id);

        // dd($data['post_tag']);
        $this->renderAdmin(self::PATH_VIEW . __FUNCTION__, $data);
    }

    public function update($id)
    {
        $validator = new Validator();
        $validation = $validator->make($_POST + $_FILES, [
            'title'             => 'required|min:3|max:100',
            'category_id'       => 'required|numeric',
            'author_id'         => 'required|numeric',
            'excerpt'           => 'required|min:3|max:255',
            'content'           => 'required|min:3',
            'status'            => 'required',
            'thubmnail'         => 'uploaded_file:0,2M,png,jpeg,jpg,webp',
            'tags'              => 'required',
        ]);
        $validation->validate();
        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            back(url('admin/posts/' . $id . '/edit'));
        } else {

            $post = $this->post->findByID($id);
            $data = [
                'title'             => $_POST['title']              ?? $post['title'],
                'category_id'       => $_POST['category_id']        ?? $post['category_id'],
                'author_id'         => $_POST['author_id']          ?? $post['author_id'],
                'excerpt'           => $_POST['excerpt']            ?? $post['excerpt'],
                'content'           => $_POST['content']            ?? $post['content'],
                'status'            => $_POST['status']             ?? $post['status'],
                'is_show_home'      => $_POST['is_show_home']       ?? 0,
                'is_trending'       => $_POST['is_trending']        ?? 0,
                'is_editors_pick'   => $_POST['is_editors_pick']    ?? 0,
                'updated_at'        => date('Y-m-d H:i:s'),
            ];
            $check = false;
            if (!empty($_FILES['thumbnail']) && $_FILES['thumbnail']['size'] > 0) {
                $check = true;
                $from = $_FILES['thumbnail']['tmp_name'];
                $to = '/assets/uploads/' . time() . $_FILES['thumbnail']['name'];
            }

            if (move_uploaded_file($from, PATH_ROOT . $to)) {
                $data['thumbnail'] = $to;
            } else {
                $data['thumbnail'] = $post['thumbnail'];
            }

            $this->post->update($id, $data);
            $this->postTag->deleteTagByPostID($id);
            $this->postTag->insertPostTag($id, $_POST['tags']);

            if ($check && $post['thumbnail'] && file_exists(PATH_ROOT . $post['thumbnail'])) {
                unlink(PATH_ROOT . $post['thumbnail']);
            }

            $_SESSION['status'] = 'Thao tác thành công';
            back(url("admin/posts/$id/edit"));
        }
    }

    public function delete($id)
    {
        $this->postTag->deleteTagByPostID($id);
        $this->post->delete($id);
        $_SESSION['status'] = 'Thao tác thành công';
        back(url('admin/posts'));
    }
}
