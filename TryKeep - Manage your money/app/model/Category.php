<?php

namespace app\model;
use app\core\Connection;

class Category {

    private $pdo;
    private $table;

    function __construct($table) {
        $this->pdo = new Connection();
        $this->table = $table;
    }

    function getIncomeId(string $category = 'Income') {
        $sql = 'SELECT id FROM ' . $this->table . ' WHERE category = :category';
        $param = [':category' => $category];
        $category = $this->pdo->executeQuery($sql, $param, true);
        return $category['id'];
    }
    
    function getExpenseId(string $category = 'Expense') {
        $sql = 'SELECT id FROM ' . $this->table . ' WHERE category = :category';
        $param = [':category' => $category];
        $category = $this->pdo->executeQuery($sql, $param, true);
        return $category['id'];
    }

}