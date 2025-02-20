<?php


class core
{

    public $db;
    public $user;

    public function __construct()
    {
        require_once (VVSU_CORE_PATH."db.class.php");
        require_once (VVSU_CORE_PATH."user.class.php");
        $this->db = new db($this);
        session_start();
        $this->user = new user($this);
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

    public function load_blocks() {
        $content = '';

        $blocks = scandir(VVSU_BLOCK_PATH);
        foreach ($blocks as $key => $file) {
            if(substr($file, -4) != '.php') continue;
            include VVSU_BLOCK_PATH.$file;
            $class = "block_".substr($file, 0, -4);
            if(!class_exists($class)) {
                continue;
            }
            $b = new $class($this);
            if(!method_exists($b,"content")) {
                unset($b);
                continue;
            }
            $content = $content.$b->content();
        }

        return $content;
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
                echo "<script> setTimeout(function(){
					location.search=\"\";
				}, 5000); </script>";
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

    //1 - error 2 - success 3- warning
    public function notify($header, $msg, $type, $url ='/') {
        $_SESSION['notify']['header'] = $header;
        $_SESSION['notify']['msg'] = $msg;
        $_SESSION['notify']['type'] = $type;

        header("Location: ".$url);
    }
}

/*
 * '$header',
          '$msg',
          '$msg_type'
 */