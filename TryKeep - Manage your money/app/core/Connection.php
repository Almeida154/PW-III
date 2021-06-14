<?php

namespace app\core;
use PDO;

class Connection {
    
    private static $connection;
    private $debug;
    private $server;
    private $user;
    private $password;
    private $database;

    function __construct() {
        $this->debug = true;

        $this->server = DB_HOST;
        $this->user = DB_USER;
        $this->password = DB_PASSWORD;
        $this->database = DB_NAME;
    }

    function getConnection() {
        try {
            if(self::$connection == null) {
                self::$connection = new PDO(
                    "mysql:host={$this->server}; dbname={$this->database}; charset=utf8",
                    $this->user,
                    $this->password
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                self::$connection->setAttribute(PDO::ATTR_PERSISTENT, true);
            }
            return self::$connection;
        } catch (\PDOException $exception) {
            if($this->debug) {
                echo '<b>Error on getConnection(): </b>' . $exception->getMessage() . '<br>';
            }
            return null;
        }
    }

    function disconnect() {
        self::$connection = null;
    }

    function getLastId() {
        return $this->getConnection()->lastInsertId();
    }

    function beginTransaction() {
        return $this->getConnection()->beginTransaction();
    }

    function commit() {
        return $this->getConnection()->commit();
    }

    function rollBack() {
        return $this->getConnection()->rollBack();
    }

    function executeQuery($sql, $params = null, $oneRow = false) {
        try {
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute($params);
            if($oneRow) return $stmt->fetch(PDO::FETCH_ASSOC);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $exception) {
            if($this->debug) {
                echo '<b>Error on executeQuery(): </b> ' . $exception->getMessage() . '<br>';
                echo '<br><b>SQL: <b>' . $sql . '<br>';
                echo '<br><b>Params: </b>';
                print_r($params) . '<br>';
            }
            return null;
        }
    }

    function executeNonQuery($sql, $params = null) {
        try {
            $stmt = $this->getConnection()->prepare($sql);
            return $stmt->execute($params);
        } catch (\PDOException $exception) {
            if($this->debug) {
                echo '<b>Error on executeNonQuery(): </b> ' . $exception->getMessage() . '<br>';
                echo '<br><b>SQL: <b>' . $sql . '<br>';
                echo '<br><b>Params: </b>';
                print_r($params) . '<br>';
            }
            return false;
        }
    }

    function numberRows($sql, $params = null) {
        try {
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute($params);
            return $stmt->rowCount();
        } catch (\PDOException $exception) {
            if($this->debug) {
                echo '<b>Error on numberRows(): </b> ' . $exception->getMessage() . '<br>';
                echo '<br><b>SQL: <b>' . $sql . '<br>';
                echo '<br><b>Params: </b>';
                print_r($params) . '<br>';
            }
            return false;
        }
    }

    function getDebugState() {
        return $this->debug;
    }

}