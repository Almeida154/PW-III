<?php

    class Message{
        
        // Attributes

        private $idMessage;
        private $nameFromMessage;
        private $emailFromMessage;
        private $subjectMessage;
        private $message;

        // Constructor

        function __construct($nameFromMessage, $emailFromMessage, $subjectMessage, $message){
            $this->nameFromMessage = $nameFromMessage;
            $this->emailFromMessage = $emailFromMessage;
            $this->subjectMessage = $subjectMessage;
            $this->message = $message;
        }

        // Methods

        public function insertDB($messageObj){
            require_once 'Connection.php';

            $data = array($messageObj->getNameFromMessage(), $messageObj->getEmailFromMessage(),
                $messageObj->getSubjectMessage(), $messageObj->getMessage());

            $connection = Connection::getConnection();

            $stmt = $connection->prepare("INSERT INTO tbMessage(nameFromMessage, emailFromMessage, 
                subjectMessage, message) VALUES(?, ?, ?, ?)");

            $stmt->bindParam(1, $data[0]);
            $stmt->bindParam(2, $data[1]);
            $stmt->bindParam(3, $data[2]);
            $stmt->bindParam(4, $data[3]);
            $stmt->execute();
        }

        public function deleteDB($id){
            require_once 'Connection.php';
            $connection = Connection::getConnection();
            $stmt = $connection->prepare("DELETE FROM tbMessage WHERE idMessage = ?");
            $stmt->bindParam(1, intval($id));
            $stmt->execute();
        }

        public function getAll(){
            require_once 'Connection.php';
            $connection = Connection::getConnection();
            $result = $connection->query("SELECT * FROM tbMessage");
            return $result->fetchAll();
        }

        public function getSingle($id){
            require_once 'Connection.php';
            $connection = Connection::getConnection();
            $stmt = $connection->prepare("SELECT * FROM tbMessage WHERE idMessage = ?");
            $stmt->bindParam(1, $id);
            $stmt->execute();
            return $stmt->fetch();
        }

        // Getters and Setters

        public function getIdMessage(){
            return $this->idMessage;
        }

        public function setIdMessage($id){
            $this->idMessage = $id;
        }

        public function getNameFromMessage(){
            return $this->nameFromMessage;
        }

        public function setNameFromMessage($message){
            $this->nameFromMessage = $message;
        }

        public function getEmailFromMessage(){
            return $this->emailFromMessage;
        }

        public function setIEmailFromMessage($message){
            $this->emailFromMessage = $message;
        }

        public function getSubjectMessage(){
            return $this->subjectMessage;
        }

        public function setSubjectMessage($subject){
            $this->subjectMessage = $subject;
        }

        public function getMessage(){
            return $this->message;
        }

        public function setMessage($message){
            $this->message = $message;
        }

    }

?>