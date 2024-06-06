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
            ->orderBy('id', 'desc')
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
    // public function postPick()
    // {
    //     return $this->queryBuilder
    //         ->select(
    //             'p.id',
    //             'p.title',
    //             'p.thumbnail',
    //             'p.content',
    //             'p.excerpt',
    //             'p.view',
    //             'p.status',
    //             'p.is_editors_pick',
    //             'p.is_trending',
    //             'p.is_show_home',
    //             'p.created_at',
    //             'p.updated_at',
    //             'c.name   as c_name',
    //             'a.name   as a_name',
    //             'a.avatar as a_avatar',
    //         )
    //         ->from($this->tableName, 'p')
    //         ->innerJoin('p', 'categories', 'c',  'c.id = p.category_id')
    //         ->innerJoin('p', 'authors',    'a',  'a.id = p.author_id')
    //         ->where("p.status = 'published' AND p.is_show_home = 1 AND p.is_editors_pick = 1")
    //         ->orderBy('id', 'desc')
    //         ->setMaxResults(1)
    //         ->fetchAllAssociative();
    // }
}
