<?php

namespace app\model;
use app\core\Connection;

class Tag {

    private $pdo;
    private $table;
    private $category;

    function __construct($table, $category) {
        $this->pdo = new Connection();
        $this->table = $table;
        $this->category = $category;
    }

    function insert($tag) {
        if($this->countRowsByName($tag) == 0) {
            $sql = 'INSERT INTO ' . $this->table . '(tag, category_id) VALUES(:tag, :category_id)';
        
            $params = [
                ':tag' => $tag,
                ':category_id' => $this->category
            ];
    
            if(!$this->pdo->executeNonQuery($sql, $params)) return -1;
            return $this->pdo->getLastId();
        }
        return -1;
    }

    function update(Object $param) {
        $sql = 'UPDATE ' . $this->table . ' SET tag = :tag WHERE id = :id';

        $param = [
            ':id' => $param->id,
            ':tag' => $param->tag
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    function all() {
        $sql = 'SELECT * FROM ' . $this->table . 'WHERE category_id = ' . $this->category;
        $tags = $this->pdo->executeQuery($sql);
        $allTags = null;
        foreach($tags as $tag) $allTags[] = $this->collection($tag);
        return $allTags;
    }

    function find($id) {
        $sql = 'SELECT tag FROM ' . $this->table . ' WHERE id = :id';
        $param = [':id' => $id];
        $tag = $this->pdo->executeQuery($sql, $param, true);
        return $this->collection($tag);
    }

    function findByTagName($tag) {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE tag = :tag';
        $param = [':tag' => $tag];
        $tags = $this->pdo->executeQuery($sql, $param);
        $allTags = null;
        foreach($tags as $tag) $allTags[] = $this->collection($tag);
        return $allTags;
    }

    function getTags() {
        $sql = 'SELECT id, tag FROM ' . $this->table;
        $tags = $this->pdo->executeQuery($sql);
        $allTags = null;
        foreach($tags as $tag) $allTags[] = $this->collection($tag);
        return $allTags;
    }

    function countRowsByName($tag) {
        $sql = 'SELECT id FROM ' . $this->table . ' WHERE tag = :tag';
        $param = [':tag' => $tag];
        return($this->pdo->numberRows($sql, $param));
    }

    private function collection($param) {
        return (Object) [
            'id' => $param['id'] ?? null,
            'tag' => $param['tag'] ?? null,
            'category_id' => $param['category_id'] ?? null
        ];
    }
}