<?php


class db
{
    private $core;

    public $obj, $result;

    public function __construct($core)
    {
        $this->core = $core;
        require_once (VVSU_CORE_PATH."config.php");

        $this->connect($db['host'], $db['user'], $db['pass'], $db['base'], $db['post']);
    }

    public function connect($host='127.0.0.1', $user='root', $pass='', $base='vvsuengine', $port=3306) {
        $this->obj = @new mysqli($host, $user, $pass, $base, $port);

        if(mb_strlen($this->obj->connect_error, 'UTF-8')>0){ return false; }

        if($this->obj->connect_errno){ return false; }

        if(!$this->obj->set_charset("utf8")){ return false; }
    }

    public function num_rows($query=false){
        return $this->result->num_rows;
    }

    public function safesql($str) {
        return $this->obj->real_escape_string($str);
    }

    public function query($string){
        $this->result = @$this->obj->query($string);

        return $this->result;
    }

    public function fetch_array($query=false){
        return $this->result->fetch_array();
    }

    public function fetch_assoc($query=false){
        return $this->result->fetch_assoc();
    }

    public function HSC($string=''){
        return htmlspecialchars($string);
    }
}