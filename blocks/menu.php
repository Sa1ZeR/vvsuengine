<?php


class block_menu
{
    private $core;

    public function __construct($core)
    {
        $this->core = $core;
    }

    public function content() {
        return $this->core->dataConnect(VVSU_STYLE_PATH."blocks/menu.html");
    }

}