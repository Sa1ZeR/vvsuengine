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

    public function dateConvert($month) {
        $monthsList = array(
            "01" => "янd",
            "02" => "фев",
            "03" => "мар",
            "04" => "апр",
            "05" => "мая",
            "06" => "июня",
            "07" => "июля",
            "08" => "авг",
            "09" => "сент",
            "10" => "окт",
            "11" => "нояб",
            "12" => "дек"
        );
        return $monthsList[$month];
    }

    //1 - error 2 - success 3- warning
    public function js_alert($header, $msg, $type) {

        $msg_type = '';
        switch ($type) {
            case 1: $msg_type = "error";
                break;
            case 2: $msg_type = "success";
                break;
            case 3: $msg_type = "warning";
                break;
            default: $msg_type = "question";
        }

        echo "<script> Swal.fire(
          '$header',
          '$msg',
          '$msg_type'
        ) </script>";

        exit();
    }
}

/*
 * '$header',
          '$msg',
          '$msg_type'
 */