<?php


class block_alert
{
    private $core;

    public function __construct($core)
    {
        $this->core = $core;
    }

    public function content() {
        $data = [];
        if(isset($_SESSION['notify'])) {
            $header = $_SESSION['notify']['header'];
            $msg = $_SESSION['notify']['msg'];
            switch ($_SESSION['notify']['type']) {
                case 1: $msg = '<font color="red">'.$msg.'</font>';
                    $header = '<font color="red">'.$header.'</font>';
                    break;
                case 2:
                    $msg = '<font color="green">'.$msg.'</font>';
                    $header = '<font color="green">'.$header.'</font>';
                    break;
            }
            $data = [
                'header' => $header,
                'msg' => $msg
            ];
        }
        $result = $this->core->dataConnect(VVSU_STYLE_PATH."blocks/notify.html",$data);
        //unset($_SESSION['notify']['header']);
        return $result;
    }

}