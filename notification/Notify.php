<?php

    class Notify
    {
        public $conn;
        public $reciever_id;
        public $sender_id;
        public $message;
        public $current;

        public function connect()
        {
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $database = "projecthub";

            $this->conn = new mysqli($hostname, $username, $password, $database);
        }


        public function sendNotification($sender, $reciever, $msg, $chapter)
        {
            $this->reciever_id = $reciever;
            $this->sender_id = $sender;
            $this->message = $msg;
            $this->current = $chapter;
            return $this->saveNotification();
        }

        private function saveNotification()
        {
            $this->connect();
            $query = $this->conn->query("INSERT INTO notifications(sender_id, reciever_id, current_chapter, message) 
                VALUES('$this->sender_id','$this->reciever_id','$this->current','$this->message')");

            if ($query) {
                return true;
            }else{
                return false;
            }
        }


        
    }
    

?>