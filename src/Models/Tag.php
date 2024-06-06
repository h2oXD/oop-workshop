<?php
namespace Fixbu\Assignment\Models;
use Fixbu\Assignment\Commons\Model;
class Tag extends Model{
    protected string $tableName = 'tags';
    public function insertPostTag($postID ,array $tags)
    {
        if (!empty($tags)) {

            foreach($tags as $tag) {
                $query = $this->queryBuilder->insert('post_tag');
                $query->setValue('post_id', '?')->setParameter(0, $postID);
                $query->setValue('tag_id', '?')->setParameter(1, $tag);
                $query->executeQuery();

            }


            return true;
        }
        
        return false;
    }
    public function deletePostTag($post_id)
    {        
        return $this->queryBuilder
            ->delete('post_tag')
            ->where('post_id = ?')
            ->setParameter(0, $post_id)
            ->executeQuery();
    }
}