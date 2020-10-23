<?php


class module {

    private $core;

    public function __construct($core) {
        $this->core = $core;
    }

    private function verify() {
        $login = ($_POST['login']);
    }

    private function main() {
        return $this->core->dataConnect(VVSU_STYLE_PATH."modules/register.html");
    }

    public function content() {
        $type = isset($_GET['op']) ? $_GET['op'] : "false";

        switch ($type) {
            case "verify":
                $content = $this->verify();
                break;
            default:
                $content = $this->main();
        }
        return $content;
    }
}