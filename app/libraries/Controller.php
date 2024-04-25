<?php
class Controller {
    protected $db;

    public function __construct() {
        // Initialize the database connection
        $this->db = new Database();
    }

    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        // Pass the database connection object to the model constructor
        return new $model($this->db);
    }

    public function view($view, $data = []) {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            // View does not exist
            die('View does not exist');
        }
    }
}
?>
