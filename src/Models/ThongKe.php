<?php

namespace Fixbu\Assignment\Models;

use Fixbu\Assignment\Commons\Model;

class ThongKe extends Model
{
    public function countPostCate()
    {
        $query = $this->queryBuilder
                      ->select('category_id', 'COUNT(*) as post_count')
                      ->from('posts')
                      ->groupBy('category_id');
                $query->executeQuery();
        return  $query->fetchAllAssociative();
    }
}
