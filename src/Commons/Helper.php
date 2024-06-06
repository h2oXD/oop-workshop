<?php

namespace Fixbu\Assignment\Commons;

class Helper
{
    public static function debug($data)
    {
        print '<pre>';
        print_r($data);
        die;
    }
}
