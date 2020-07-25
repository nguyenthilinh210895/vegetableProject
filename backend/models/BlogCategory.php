<?php

require_once 'models/Model.php';
class BlogCategory extends Model
{
    public $id;
    public $name;
    public $description;
    public $created_at;
    public $updated_at;

    public function getAll(){
        $sql_select_all = "SELECT * FROM blog_categories";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $blog_categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $blog_categories;
    }

    public function insert(){
        $sql_insert = "INSERT INTO blog_categories(`name`, `description`, `created_at`)
                        VALUES (:name, :description, :created_at)";
        $obj_insert = $this->connection->prepare($sql_insert);
        $arr_insert = [
            ':name' => $this->name,
            ':description' => $this->description,
            ':created_at' => $this->created_at
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function getById($id){
        $sql_select_one = "SELECT * FROM blog_categories WHERE `id` = $id";
        $obj_select = $this->connection->prepare($sql_select_one);
        $obj_select->execute();
        $blog_category = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $blog_category;
    }

    public function update($id){
        $sql_update = "UPDATE blog_categories
                        SET `name` = :name, `description` = :description, `updated_at` = :updated_at
                        WHERE id = $id";
        $obj_update = $this->connection->prepare($sql_update);

        $arr_update = [
            ':name' => $this->name,
            ':description' => $this->description,
            ':updated_at' => $this->updated_at
        ];
        return $obj_update->execute($arr_update);
    }

    public function delete($id){
        $obj_delete = $this->connection
            ->prepare("DELETE FROM blog_categories WHERE id = $id");
        $is_delete = $obj_delete->execute();
        $obj_delete_blog = $this->connection
            ->prepare("DELETE FROM blogs WHERE blog_category_id = $id");
        $obj_delete_blog->execute();
        return $is_delete;
    }
}