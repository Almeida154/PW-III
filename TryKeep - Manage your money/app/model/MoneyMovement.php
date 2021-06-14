<?php

namespace app\model;
use app\core\Connection;

class MoneyMovement {

    private $pdo;
    private $table;
    private $category;

    function __construct($table, $category) {
        $this->pdo = new Connection();
        $this->table = $table;
        $this->category = $category;
    }

    function insert(Object $params) {
        $sql = 'INSERT INTO ' . $this->table . '(title, description, amount, user_id, tag_id, category_id) VALUES(:title, :description, :amount, :user_id, :tag_id, :category_id)';
        
        $params = [
            ':title' => $params->title,
            ':description' => $params->description,
            ':amount' => $params->amount,
            ':user_id' => $params->user_id,
            ':tag_id' => $params->tag_id,
            ':category_id' => $this->category
        ];

        if(!$this->pdo->executeNonQuery($sql, $params)) return -1;
        return $this->pdo->getLastId();
    }

    function update(Object $params) {
        $sql = 'UPDATE ' . $this->table . ' SET 
            title = :title, description = :description, amount = :amount, user_id = :user_id, id_tag = :tag_id WHERE id = :id';

        $params = [
            ':id' => $params->id,
            ':title' => $params->title,
            ':description' => $params->description,
            ':amount' => $params->amount,
            ':user_id' => $params->user_id,
            ':tag_id' => $params->id_tag
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    function all() {
        $sql = 'SELECT title, description, amount FROM ' . $this->table . 'WHERE category_id = ' . $this->category;
        $expenses = $this->pdo->executeQuery($sql);
        $allExpenses = null;
        foreach($expenses as $expense) $allExpenses[] = $this->collection($expense);
        return $allExpenses;
    }

    function find($id) {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $param = [':id' => $id];
        $expense = $this->pdo->executeQuery($sql, $param, true);
        return $this->collection($expense);
    }

    function findByTag($tag_id) {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE tag_id = :tag_id';
        $param = [':tag_id' => $tag_id];
        $expense = $this->pdo->executeQuery($sql, $param);
        return $this->collection($expense);
    }

    function getTotalAmount() {
        $sql = 'SELECT SUM(amount) FROM ' . $this->table . 'WHERE category_id = ' . $this->category;
        $totalAmount = $this->pdo->executeQuery($sql, null, true);
        return $this->collection($totalAmount);
    }

    function getTotalAmountByTag($tag_id) {
        $sql = 'SELECT SUM(amount) FROM ' . $this->table . ' WHERE $tag_id = :$tag_id';
        $param = [':tag_id' => $tag_id];
        $totalAmount = $this->pdo->executeQuery($sql, $param, true);
        return $this->collection($totalAmount);
    }

    private function collection($param) {
        return (Object) [
            'id' => $param['id'] ?? null,
            'title' => $param['title'] ?? null,
            'description' => $param['description'] ?? null,
            'amount' => $param['amount'] ?? null,
            'user_id' => $param['user_id'] ?? null,
            'tag_id' => $param['tag_id'] ?? null,
            'category_id' => $param['category_id'] ?? null
        ];
    }
}