<?php

require_once 'models/Model.php';
class ProductCategory extends Model
{
    public $id;
    public $name;
    public $description;
    public $created_at;
    public $updated_at;

    public function getAll(){
        $sql_select_all = "SELECT * FROM product_categories";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $product_categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $product_categories;
    }

    public function insert(){
        $sql_insert = "INSERT INTO product_categories(`name`, `description`)
                        VALUES (:name, :description)
                        ";
        $obj_inset = $this->connection->prepare($sql_insert);
        $arr_insert = [
            ':name' => $this->name,
            ':description' => $this->description
        ];
        return $obj_inset->execute($arr_insert);
    }

    public function getProductCategoryById($id){
        $obj_select = $this->connection
            ->prepare("SELECT * FROM product_categories WHERE id = $id");
        $obj_select->execute();
        $product_category = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $product_category;
    }

    public function update($id){
        $obj_update = $this->connection
            ->prepare("UPDATE product_categories 
                    SET `name` = :name, `description` = :description, `updated_at` = :updated_at
                    WHERE id = $id");
        $arr_update = [
            ':name' => $this->name,
            ':description' => $this->description,
            ':updated_at' => $this->updated_at
        ];
        return $obj_update->execute($arr_update);
    }

    public function delete($id){
        $obj_delete = $this->connection
            ->prepare("DELETE FROM product_categories WHERE id = $id");
        $is_delete = $obj_delete->execute();
        //
        return $is_delete;
    }
}