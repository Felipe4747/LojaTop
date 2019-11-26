<?php

class langController extends controller {
    private $user;
    public function __construct(){
        parent::__construct();
    }
    
    public function set($lang) {
        $_SESSION['lang'] = $lang;
        header('location: '.BASE_URL);
    }
}

?>
