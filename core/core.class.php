<?php


class core
{

    public $db;

    public function __construct()
    {
        require_once (VVSU_CORE_PATH."db.class.php");
        $this->db = new db($this);
    }

    public function loadModule($page) {
        if(!file_exists(VVSU_MODE_PATH.$page.".class.php")) {
            return $this->dataConnect(VVSU_STYLE_PATH."modules/404.html");
        }

        require_once (VVSU_MODE_PATH.$page.".class.php");

        $module = new module($this);

        if(!method_exists($module, "content")) {
            return $this->dataConnect(VVSU_STYLE_PATH."modules/404.html");
        }

        return $module->content();
    }


    public function dataConnect($path, $data=array()){
        ob_start();

        include($path);

        return ob_get_clean();
    }
}