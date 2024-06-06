<?php
namespace Fixbu\Assignment\Models;

use Fixbu\Assignment\Commons\Model;

class PostTag extends Model
{
    protected string $tableName = 'post_tag';
    public function getTagByPostID($id)
    {
        return $this->queryBuilder->select('*')->from($this->tableName)->where("post_id = $id")->fetchAllAssociative();
    }
}