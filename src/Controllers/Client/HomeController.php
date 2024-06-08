<?php

namespace Fixbu\Assignment\Controllers\Client;

use Fixbu\Assignment\Commons\Controller;
use Fixbu\Assignment\Models\Author;
use Fixbu\Assignment\Models\Category;
use Fixbu\Assignment\Models\Post;
use Fixbu\Assignment\Models\PostTag;
use Fixbu\Assignment\Models\Tag;
use Fixbu\Assignment\Models\ThongKe;

class HomeController extends Controller
{
    private Post $posts;
    private Category $categories;
    private Tag $tags;
    private Author $authors;
    private ThongKe $thongke;
    private PostTag $postTag;
    public function __construct()
    {
        $this->posts = new Post();
        $this->categories = new Category();
        $this->tags = new Tag();
        $this->authors = new Author();
        $this->thongke = new ThongKe();
        $this->postTag = new PostTag();
    }
    public function index()
    {
        $data['categories'] = $this->categories->all();
        $data['tags'] = $this->tags->all();
        $data['authors'] = $this->authors->all();
        $data['count_post'] = $this->thongke->countPostCate();

        $data['posts'] = $this->posts->homePostAndJoin();
        $data['max_view_post'] = $this->posts->maxViewFromPost();
        $data['post_pick'] = $this->posts->postPick();
        $data['post_trending'] = $this->posts->postTrending();

        // dd($data);  

        $this->renderClient(__FUNCTION__, $data);
    }
    public function detail($id)
    {   
        $data['post'] = $this->posts->postByID($id);
        $data['tags'] = $this->postTag->getTagByPostID($id);
        if(!empty($data['post'])){
            $view = [
                'view' => $data['post']['view'] + 1
            ];
            $this->posts->update($id , $view);
        }

        $this->renderClient(__FUNCTION__, $data);
    }
    public function list()
    {
        $data['posts'] = $this->posts->allPostAndJoin();
        $this->renderClient(__FUNCTION__, $data);
    }
}
