<?php
namespace Fixbu\Assignment\Controllers\Admin;
use Fixbu\Assignment\Commons\Controller;
use Fixbu\Assignment\Models\Category;
use Fixbu\Assignment\Models\Post;
use Fixbu\Assignment\Models\ThongKe;

class DashboardController extends Controller
{
    private ThongKe $thongke;
    private Category $category;
    private Post $post;
    public function __construct()
    {
        $this->thongke = new ThongKe();
        $this->category = new Category();
        $this->post = new Post();
    }
    public function index()
    {
        $data['count_post'] = $this->thongke->countPostCate();
        $data['categories'] = $this->category->all();
        $data['total_post'] = $this->post->countPost();
        // $data['max_view_post'][] = $this->post->maxViewFromPost();
        // dd($data['max_view_post']);
        $this->renderAdmin(__FUNCTION__,$data);
    }
}