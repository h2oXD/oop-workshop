<?php
namespace Fixbu\Assignment\Controllers\Client;

use Fixbu\Assignment\Commons\Controller;
use Fixbu\Assignment\Models\Category;
use Fixbu\Assignment\Models\Post;
use Fixbu\Assignment\Models\Tag;

class HomeController extends Controller
{
    private Post $posts;
    private Category $categories;
    private Tag $tags;
    public function __construct()
    {
        $this->posts = new Post();
        $this->categories = new Category();
        $this->tags = new Tag();
    }
    public function index()
    {
        $data['posts'] = $this->posts->all();
        $data['categories'] = $this->categories->all();
        $data['tags'] = $this->tags->all();
        $this->renderClient(__FUNCTION__,$data);
    }
    public function detail()
    {
        $this->renderClient(__FUNCTION__);
    }
}
