<?php
namespace Fixbu\Assignment\Controllers\Admin;
use Fixbu\Assignment\Commons\Controller;
class DashboardController extends Controller
{
    public function index()
    {
        $this->renderAdmin(__FUNCTION__);
    }
}