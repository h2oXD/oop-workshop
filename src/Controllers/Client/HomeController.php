<?php

namespace Fixbu\Assignment\Controllers\Client;

use Fixbu\Assignment\Commons\Controller;
use Fixbu\Assignment\Models\Author;
use Fixbu\Assignment\Models\Category;
use Fixbu\Assignment\Models\Post;
use Fixbu\Assignment\Models\Tag;

class HomeController extends Controller
{
    private Post $posts;
    private Category $categories;
    private Tag $tags;
    private Author $authors;
    public function __construct()
    {
        $this->posts = new Post();
        $this->categories = new Category();
        $this->tags = new Tag();
        $this->authors = new Author();
    }
    public function index()
    {
        $data['posts'] = $this->posts->homePostAndJoin();
        $data['categories'] = $this->categories->all();
        $data['tags'] = $this->tags->all();
        $data['authors'] = $this->authors->all();
        $this->renderClient(__FUNCTION__, $data);
    }
    public function detail($id)
    {   
        $data['post'] = $this->posts->postByID($id);
        
        $this->renderClient(__FUNCTION__, $data);
    }
    public function list()
    {
        $data['posts'] = $this->posts->allPostAndJoin();
        $this->renderClient(__FUNCTION__, $data);
    }
}
