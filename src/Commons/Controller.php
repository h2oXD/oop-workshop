<?php

namespace Fixbu\Assignment\Commons;

use eftec\bladeone\BladeOne;

class Controller
{
    public function renderClient($view,$data = [])
    {
        $pathView = __DIR__ . "/../Views/Client";
        $blade = new BladeOne($pathView);
        echo $blade->run($view,$data);
    }
    public function renderAdmin($view,$data = [])
    {
        $pathView = __DIR__ . "/../Views/Admin";
        $blade = new BladeOne($pathView);
        echo $blade->run($view,$data);
    }
}
