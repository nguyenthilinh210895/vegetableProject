<?php

require_once 'models/Model.php';
class Product extends Model
{
    public $id;
    public $product_category_id;
    public $quantity;
    public $title;
    public $avatar;
    public $price;
    public $summary;
    public $content;
    public $status;
    public $created_at;
    public $updated_at;

    public function  getAll(){
        $obj_select = $this->connection
            ->prepare("SELECT products.*, product_categories.name AS product_category_name 
                                FROM products INNER JOIN product_categories
                                ON product_categories.id = products.product_category_id
                                ORDER BY products.created_at ASC ");
        $obj_select->execute();
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function getProductById($id){
        $obj_select = $this->connection
            ->prepare("SELECT products.*, product_categories.name 
                        AS product_category_name 
                        FROM products 
                        INNER JOIN product_categories 
                        ON products.product_category_id = product_categories.id
                        WHERE products.id = $id");
        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }

    public function insert(){
        $obj_insert = $this->connection
            ->prepare("INSERT INTO products(`product_category_id`, `quantity`, `title`, `avatar`, `price`, `summary`, `content`)
                    VALUES (:product_category_id, :quantity, :title, :avatar, :price, :summary, :content)");
        $arr_insert = [
            ':product_category_id' => $this->product_category_id,
            ':quantity' => $this->quantity,
            ':title' => $this->title,
            ':avatar' => $this->avatar,
            ':price' => $this->price,
            ':summary' => $this->summary,
            ':content' => $this->content
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function update($id){
        $obj_update = $this->connection
            ->prepare("UPDATE products SET product_category_id=:product_category_id,
                        quantity=:quantity, title=:title, avatar=:avatar, price=:price,
                        summary=:summary, content=:content, updated_at=:updated_at
                        WHERE id=$id");
        $arr_update = [
            ':product_category_id' => $this->product_category_id,
            ':quantity' => $this->quantity,
            ':title' => $this->title,
            ':avatar' => $this->avatar,
            ':price' => $this->price,
            ':summary' => $this->summary,
            ':content' => $this->content,
            ':updated_at' => $this->updated_at,
        ];
        return $obj_update->execute($arr_update);
    }

    public function delete($id){
        $obj_delete = $this->connection
            ->prepare("DELETE FROM products WHERE id = $id");
        return $obj_delete->execute();
    }
}