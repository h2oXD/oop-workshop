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

    public function insertPostTag($postID ,array $tags)
    {
        if (!empty($tags)) {

            foreach($tags as $tag) {
                $query = $this->queryBuilder->insert($this->tableName);
                $query->setValue('post_id', '?')->setParameter(0, $postID);
                $query->setValue('tag_id', '?')->setParameter(1, $tag);
                $query->executeQuery();

            }
            return true;
        }
        
        return false;
    }
    public function deleteTagByPostID($post_id)
    {        
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('post_id = ?')
            ->setParameter(0, $post_id)
            ->executeQuery();
    }

    public function findByPostID($postId)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('post_id = ?')
            ->setParameter(0, $postId)
            ->fetchAllAssociative();
    }
}