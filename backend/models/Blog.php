<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/1/2020
 * Time: 8:27 AM
 */
require_once "models/Model.php";
class Blog extends Model
{
    public $id;
    public $blog_category_id;
    public $title;
    public $tags;
    public $summary;
    public $avatar;
    public $content;
    public $status;
    public $created_at;
    public $updated_at;

    public function getAll(){
        $sql_select = "SELECT blogs.*, blog_categories.name FROM blogs
                      INNER JOIN blog_categories
                      ON blogs.blog_category_id = blog_categories.id
                      ORDER BY id
                      ";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $blogs = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $blogs;
    }

    public function getById($id){
        $sql = "SELECT blogs.*, blog_categories.name
                      FROM blogs
                      INNER JOIN blog_categories
                      ON blogs.blog_category_id = blog_categories.id
                      WHERE blogs.id = $id";
        $obj_select = $this->connection->prepare($sql);
        $obj_select->execute();
        $blog = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $blog;
    }

    public function insert(){
        $sql_insert = "INSERT INTO blogs(`blog_category_id`, `title`, `tags`, `summary`, `avatar`, `content`)
                        VALUES (:blog_category_id, :title, :tags, :summary, :avatar, :content)
                        ";
        $obj_insert = $this->connection->prepare($sql_insert);
        $arr_insert = [
            ':blog_category_id' => $this->blog_category_id,
            ':title' => $this->title,
            ':tags' => $this->tags,
            ':summary' => $this->summary,
            ':avatar' => $this->avatar,
            ':content' => $this->content
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function update($id){
        $sql = "UPDATE blogs SET blog_category_id=:blog_category_id, title=:title, tags=:tags, 
summary=:summary, avatar=:avatar, content=:content, `updated_at`
                WHERE id = $id";
        $obj_update = $this->connection->prepare($sql);
        $arr_update = [
            ':blog_category_id' => $this->blog_category_id,
            ':title' => $this->title,
            ':tags' => $this->tags,
            ':summary' => $this->summary,
            ':avatar' => $this->avatar,
            ':content' => $this->content,
            ':updated_at' => $this->updated_at
        ];
        return $obj_update->execute($arr_update);
    }

    public function delete($id){
        $sql = "DELETE * FROM blogs WHERE id = $id";
        $obj_delete = $this->connection->prepare($sql);
        return $obj_delete->execute();
    }
}