<?php

require_once 'models/Model.php';
class User extends Model
{
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $phone;
    public $address;
    public $email;
    public $avatar;
    public $jobs;
    public $last_login;
    public $facebook;
    public $status;
    public $created_at;
    public $updated_at;

    public function getUser($username){
        $sql_select_one = "SELECT * FROM  users WHERE `username` = :username";
        $obj_select = $this->connection
            ->prepare($sql_select_one);
        $arr_select = [
            ':username' => $username
        ];
        $obj_select->execute($arr_select);
        $user = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function getUserLogin($username, $password){
        $sql_select_one = "SELECT * FROM users WHERE `username` = :username AND `password` = :password";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $arr_select = [
            ':username' => $username,
            ':password' => $password
        ];
        $obj_select_one->execute($arr_select);
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function register(){
        $sql_insert = "INSERT INTO users(`username`, `password`)
                        VALUES (:username, :password)";
        $obj_insert = $this->connection
            ->prepare($sql_insert);
        $arr_insert = [
            ':username' => $this->username,
            ':password' => $this->password
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function last_login($id){
        $sql_update = "UPDATE users SET `last_login` = :last_login WHERE `id` = $id";
        $obj_update = $this->connection->prepare($sql_update);
        $arr = [':last_login' => $this->last_login];
        return $obj_update->execute($arr);
    }

    public function update($username){
        $sql_update = "UPDATE users 
                       SET `first_name`=:first_name, `last_name`=:last_name, `phone`=:phone, `address`=:address,
                       `email`=:email, `avatar`=:avatar, `facebook`=:facebook
                       WHERE `username`=:username";
        $obj_update = $this->connection->prepare($sql_update);
        $arr_update = [
            ':first_name' => $this->first_name,
            ':last_name' => $this->last_name,
            ':phone' => $this->phone,
            ':address' => $this->address,
            ':email' => $this->email,
            ':avatar' => $this->avatar,
            ':facebook' => $this->facebook,
            ':username' => $username
        ];
        return $obj_update->execute($arr_update);
    }
}