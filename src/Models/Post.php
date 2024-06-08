<?php

namespace Fixbu\Assignment\Models;

use Fixbu\Assignment\Commons\Model;

class Post extends Model
{
    protected string $tableName = 'posts';
    public function allPostAndJoin()
    {
        return $this->queryBuilder
            ->select(
                'p.id',
                'p.title',
                'p.thumbnail',
                'p.content',
                'p.excerpt',
                'p.view',
                'p.status',
                'p.is_editors_pick',
                'p.is_trending',
                'p.is_show_home',
                'p.created_at',
                'p.updated_at',
                'c.name as c_name',
                'a.name as a_name',
                'a.avatar as a_avatar',
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->innerJoin('p', 'authors', 'a', 'a.id = p.author_id')
            ->orderBy('p.id', 'desc')
            ->fetchAllAssociative();
    }

    public function insertGetLastID(array $data)
    {
        if (!empty($data)) {
            $query = $this->queryBuilder->insert($this->tableName);

            $index = 0;
            foreach ($data as $key => $value) {
                $query->setValue($key, '?')->setParameter($index, $value);

                ++$index;
            }

            $query->executeQuery();

            return $this->conn->lastInsertId();
        }

        return false;
    }
    public function homePostAndJoin()
    {
        return $this->queryBuilder
            ->select(
                'p.id',
                'p.title',
                'p.thumbnail',
                'p.content',
                'p.excerpt',
                'p.view',
                'p.status',
                'p.is_editors_pick',
                'p.is_trending',
                'p.is_show_home',
                'p.created_at',
                'p.updated_at',
                'c.name as c_name',
                'a.name as a_name',
                'a.avatar as a_avatar',
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->innerJoin('p', 'authors', 'a', 'a.id = p.author_id')
            ->where("p.status = 'published' AND p.is_show_home = 1")
            ->orderBy('id', 'desc')
            ->setMaxResults(6)
            ->fetchAllAssociative();
    }
    public function postByID($id)
    {
        return $this->queryBuilder
            ->select(
                'p.id',
                'p.title',
                'p.thumbnail',
                'p.content',
                'p.excerpt',
                'p.view',
                'p.status',
                'p.is_editors_pick',
                'p.is_trending',
                'p.is_show_home',
                'p.created_at',
                'p.updated_at',
                'c.name   as c_name',
                'a.name   as a_name',
                'a.avatar as a_avatar',
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'c.id = p.category_id')
            ->innerJoin('p', 'authors', 'a', 'a.id = p.author_id')
            ->where("p.status = 'published' AND p.is_show_home = 1 AND p.id = $id")
            ->orderBy('id', 'desc')
            ->setMaxResults(1)
            ->fetchAssociative();
    }
    public function postPick()
    {
        $newQuery = new Model();
        return $newQuery->queryBuilder
            ->select(
                'p.id',
                'p.title',
                'p.thumbnail',
                'p.content',
                'p.excerpt',
                'p.view',
                'p.status',
                'p.is_editors_pick',
                'p.is_trending',
                'p.is_show_home',
                'p.created_at',
                'p.updated_at',
                'c.name   as c_name',
                'a.name   as a_name',
                'a.avatar as a_avatar',
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c',  'c.id = p.category_id')
            ->innerJoin('p', 'authors',    'a',  'a.id = p.author_id')
            ->where("p.status = 'published' AND p.is_show_home = 1 AND p.is_editors_pick = 1")
            ->orderBy('id', 'desc')
            ->setMaxResults(1)
            ->fetchAssociative();
    }
    public function countPost()
    {
        return $this->queryBuilder
            ->select("COUNT('id') as total")
            ->from($this->tableName)
            ->executeQuery()
            ->fetchAssociative();
    }
    public function maxViewFromPost()
    {
        return $this->queryBuilder
        ->select(
            'p1.id',
            'p1.title',
            'p1.thumbnail',
            'p1.content',
            'p1.excerpt',
            'p1.view',
            'p1.status',
            'p1.is_editors_pick',
            'p1.is_trending',
            'p1.is_show_home',
            'p1.created_at',
            'p1.updated_at',
            'c1.name   as c_name',
            'a1.name   as a_name',
            'a1.avatar as a_avatar',
        )
        ->from($this->tableName, 'p1')
        ->innerJoin('p1', 'categories', 'c1',  'c1.id = p1.category_id')
        ->innerJoin('p1', 'authors',    'a1',  'a1.id = p1.author_id')
        ->where(
            "p1.status = 'published' 
            AND p1.is_show_home = 1 
            AND p1.view = (SELECT MAX(temp.view) FROM $this->tableName as temp)")
        ->orderBy('id', 'desc')
        ->setMaxResults(1)
        ->fetchAssociative();
    }
    public function postTrending()
    {
        $newQuery = new Model();
        return $newQuery->queryBuilder
            ->select(
                'p.id',
                'p.title',
                'p.thumbnail',
                'p.content',
                'p.excerpt',
                'p.view',
                'p.status',
                'p.is_editors_pick',
                'p.is_trending',
                'p.is_show_home',
                'p.created_at',
                'p.updated_at',
                'c.name   as c_name',
                'a.name   as a_name',
                'a.avatar as a_avatar',
            )
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c',  'c.id = p.category_id')
            ->innerJoin('p', 'authors',    'a',  'a.id = p.author_id')
            ->where("p.status = 'published' AND p.is_show_home = 1 AND p.is_trending = 1")
            ->orderBy('id', 'desc')
            ->setMaxResults(3)
            ->fetchAllAssociative();
    }
    
}
