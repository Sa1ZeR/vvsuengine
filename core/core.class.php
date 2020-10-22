<?php


class core
{

    public function __construct()
    {
    }


    public function dataConnect($path, $data=array()){
        ob_start();

        include($path);

        return ob_get_clean();
    }
}