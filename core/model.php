<?php
class model{
    protected $db;
    public function __construct(){
        global $pdo;
        $this->db = $pdo;
    }
}