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
        date_default_timezone_set('America/Sao_Paulo');
    }

    function insert(Object $params) {
        $sql = 'INSERT INTO ' . $this->table . '(title, description, amount, date, user_id, tag_id, category_id) VALUES(:title, :description, :amount, :date, :user_id, :tag_id, :category_id)';
        
        $params = [
            ':title' => $params->title,
            ':description' => $params->description,
            ':amount' => $params->amount,
            ':date' => date('Y-m-d H:i:s'),
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

    function all($user_id, $field) {
        $sql = 'SELECT title, description, amount, tag, category, date FROM tbmoneymovement
                    INNER JOIN tbtag on tbtag.id = tbmoneymovement.tag_id
                    INNER JOIN tbcategory on tbcategory.id = tbmoneymovement.category_id
                        WHERE user_id = :user_id AND tbmoneymovement.category_id = ' . $this->category . '
                            ORDER BY ' . $field . ' DESC';
        $param = [':user_id' => $user_id];
        $list = $this->pdo->executeQuery($sql, $param);
        $allList = null;
        foreach($list as $moneyMovement) $allList[] = $this->collectionList($moneyMovement);
        return $allList;
    }

    function search($user_id, $query) {
        $sql = "SELECT title, description, amount, tag, category, date FROM tbmoneymovement
                    INNER JOIN tbtag on tbtag.id = tbmoneymovement.tag_id
                    INNER JOIN tbcategory on tbcategory.id = tbmoneymovement.category_id
                        WHERE user_id = :user_id AND title LIKE '%" . $query . "%'
                            ORDER BY date DESC";
        $param = [':user_id' => $user_id];
        $list = $this->pdo->executeQuery($sql, $param);
        $allList = null;
        foreach($list as $moneyMovement) $allList[] = $this->collectionList($moneyMovement);
        return $allList;
    }

    function find($id) {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
        $param = [':id' => $id];
        $moneyMovement = $this->pdo->executeQuery($sql, $param, true);
        return $this->collection($moneyMovement);
    }

    function getByTag($user_id, $tag_id, $field) {
        $sql = 'SELECT title, description, amount, tag, category, date FROM tbmoneymovement
                    INNER JOIN tbtag on tbtag.id = tbmoneymovement.tag_id
                    INNER JOIN tbcategory on tbcategory.id = tbmoneymovement.category_id
                        WHERE user_id = :user_id 
                            AND tbmoneymovement.category_id = ' . $this->category . '
                            AND tag_id = :tag_id
                                ORDER BY ' . $field . ' DESC';
        $params = [
            ':user_id' => $user_id,
            ':tag_id' => $tag_id
        ];
        $list = $this->pdo->executeQuery($sql, $params);
        $allList = null;
        foreach($list as $moneyMovement) $allList[] = $this->collectionList($moneyMovement);
        return $allList;
    }

    function getAllByTag($user_id, $tag_id, $field) {
        $sql = 'SELECT title, description, amount, tag, category, date FROM tbmoneymovement
                    INNER JOIN tbtag on tbtag.id = tbmoneymovement.tag_id
                    INNER JOIN tbcategory on tbcategory.id = tbmoneymovement.category_id
                        WHERE user_id = :user_id AND tag_id = :tag_id
                            ORDER BY ' . $field . ' DESC';
        $params = [
            ':user_id' => $user_id,
            ':tag_id' => $tag_id
        ];
        $list = $this->pdo->executeQuery($sql, $params);
        $allList = null;
        foreach($list as $moneyMovement) $allList[] = $this->collectionList($moneyMovement);
        return $allList;
    }

    function getTotalAmount($id) {
        $sql = 'SELECT SUM(amount) FROM ' . $this->table . 'WHERE category_id = ' . $this->category;
        $param = [':id' => $id];
        $totalAmount = $this->pdo->executeQuery($sql, $param, true);
        return $this->collection($totalAmount);
    }

    function getMoreExpensive($user_id) {
        $sql = 'SELECT MAX(amount) as amount FROM ' . $this->table . ' WHERE user_id = :user_id';
        $param = [':user_id' => $user_id];
        return $this->pdo->executeQuery($sql, $param, true)['amount'];
    }

    function getLessExpensive($user_id) {
        $sql = 'SELECT MIN(amount) as amount FROM ' . $this->table . ' WHERE user_id = :user_id';
        $param = [':user_id' => $user_id];
        return $this->pdo->executeQuery($sql, $param, true)['amount'];
    }

    function getByAmount($user_id, $amount) {
        $sql = 'SELECT title, description, amount, tag, date FROM ' . $this->table . ' 
                    INNER JOIN tbtag on tbtag.id = tbmoneymovement.tag_id
                            WHERE user_id = :user_id AND amount LIKE :amount';
        $params = [
            ':user_id' => $user_id,
            ':amount' => $amount
        ];
        return $this->collectionList($this->pdo->executeQuery($sql, $params, true));
    }

    function getTotalAmountByTag($user_id, $tag_id) {
        $sql = 'SELECT SUM(amount) as sum FROM ' . $this->table . '
                    WHERE user_id = :user_id AND tag_id = :tag_id';
        $params = [
            ':user_id' => $user_id,
            ':tag_id' => $tag_id
        ];
        return $this->pdo->executeQuery($sql, $params, true)['sum'];
    }

    function getTotalAmountByCategory($user_id, $category_id) {
        $sql = 'SELECT SUM(amount) as sum FROM ' . $this->table . '
                    WHERE user_id = :user_id AND category_id = :category_id';
        $params = [
            ':user_id' => $user_id,
            ':category_id' => $category_id
        ];
        return $this->pdo->executeQuery($sql, $params, true)['sum'];
    }

    function getList($user_id, $field) {
        $sql = 'SELECT title, description, amount, tag, category, date FROM tbmoneymovement
                    INNER JOIN tbtag on tbtag.id = tbmoneymovement.tag_id
                    INNER JOIN tbcategory on tbcategory.id = tbmoneymovement.category_id
                        WHERE user_id = :user_id
                            ORDER BY ' . $field . ' DESC';
        $param = [':user_id' => $user_id];
        $list = $this->pdo->executeQuery($sql, $param);
        $allList = null;
        foreach($list as $moneyMovement) $allList[] = $this->collectionList($moneyMovement);
        return $allList;
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

    private function collectionList($param) {
        return (Object) [
            'title' => $param['title'] ?? null,
            'description' => $param['description'] ?? null,
            'amount' => number_format($param['amount'], 2, ',', '.') ?? null,
            'tag' => $param['tag'] ?? null,
            'category' => $param['category'] ?? null,
            'date' => date_format(date_create($param['date']), 'd/m') ?? null
        ];
    }
}