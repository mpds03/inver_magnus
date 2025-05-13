<?php

require_once './model/TipDocumModel.php';
require_once './config/database.php';

class TipDocumController {
    private $db;
    private $TipDocumModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->TipDocumModel = new TipDocumModel($this->db);
    }

    public function listTipDocum() {
        return $this->TipDocumModel->getTipDocum();
    }
}

?> 