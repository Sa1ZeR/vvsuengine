<?php


class module
{

    private $core, $db, $user;

    public function __construct($core) {
        $this->core = $core;
        $this->db = $core->db;
        $this->user= $core->user;
    }

    public function content() {
        if(!$this->user->isAuth()) {
            header("Location: /");
        }
        $this->user->logout();
        header("Location: /");
    }

}