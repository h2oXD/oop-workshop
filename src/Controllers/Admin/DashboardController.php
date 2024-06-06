<?php
namespace Fixbu\Assignment\Controllers\Admin;
use Fixbu\Assignment\Commons\Controller;
use Fixbu\Assignment\Models\Category;
use Fixbu\Assignment\Models\ThongKe;

class DashboardController extends Controller
{
    private ThongKe $thongke;
    private Category $category;
    public function __construct()
    {
        $this->thongke = new ThongKe();
        $this->category = new Category();
    }
    public function index()
    {
        $data['count_post'] = $this->thongke->countPostCate();
        $data['categories'] = $this->category->all();
        $this->renderAdmin(__FUNCTION__,$data);
    }
}