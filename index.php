<?php

require_once ('./system.php');
echo $core->dataConnect(VVSU_STYLE_PATH."header.html");

$page = isset($_GET['page']) ? $_GET['page'] : "mainpage";

$content;
switch ($page) {
    case "register":
    case "mainpage":
        break;
    default:
        $content = $core->dataConnect(VVSU_STYLE_PATH."modules/404.html");

}

$dataGlobal = array(
    "content" => $content,
    "l_blocks" => $core->dataConnect(VVSU_STYLE_PATH."blocks/menu.html")
);

echo $core->dataConnect(VVSU_STYLE_PATH.'index.html', $dataGlobal);
?>