<?php

namespace app\model;
use app\core\Connection;

class User {

    private $pdo;
    private $table;

    function __construct($table) {
        $this->pdo = new Connection();
        $this->table = $table;
    }

    function insert(Object $params) {
        $sql = 'INSERT INTO ' . $this->table . '(name, email, password) VALUES(:name, :email, :password)';
        
        $params = [
            ':name' => $params->name,
            ':email' => $params->email,
            ':password' => $params->password
        ];

        if(!$this->pdo->executeNonQuery($sql, $params)) return -1;
        return $this->pdo->getLastId();
    }

    function update(Object $params) {
        $sql = 'UPDATE ' . $this->table . ' SET 
            name = :name, email = :email, password = :password WHERE id = :id';
        $params = [
            ':id' => $params->id,
            ':name' => $params->name,
            ':email' => $params->email,
            ':password' => $params->password
        ];
        return $this->pdo->executeNonQuery($sql, $params);
    }

    function delete($id) {
        $sql = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $param = [':id' => $id];
        return $this->pdo->executeNonQuery($sql, $param);
    }

    function all() {
        $sql = 'SELECT * FROM ' . $this->table;
        $users = $this->pdo->executeQuery($sql);
        $allUsers = null;
        foreach($users as $user) $allUsers[] = $this->collection($user);
        return $allUsers;
    }

    function find($id) {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $param = [':id' => $id];
        return $this->pdo->executeQuery($sql, $param, true);
    }

    function signIn($email, $password) {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE email = :email AND password = :password';
        $params = [
            ':email' => $email,
            ':password' => $password
        ];
        return $this->pdo->executeQuery($sql, $params, true);
    }

    function countRowsByEmail($email) {
        $sql = 'SELECT id FROM ' . $this->table . ' WHERE email = :email';
        $param = [':email' => $email];
        return $this->pdo->numberRows($sql, $param);
    }

    private function collection($param) {
        return (Object) [
            'id' => $param['id'] ?? null,
            'name' => $param['name'] ?? null,
            'email' => $param['email'] ?? null,
            'password' => $param['password'] ?? null
        ];
    }
}