<?php

require_once ('./system.php');

$page = isset($_GET['page']) ? $_GET['page'] : "mainpage";

$content;
switch ($page) {
    case "mainpage":
        $content = $core->loadModule("posts");
        break;
    default:
        $content = $core->loadModule($page);

}

$dataGlobal = array(
    "content" => $content,
    //"l_blocks" => $core->dataConnect(VVSU_STYLE_PATH."blocks/menu.html")
    "l_blocks" => $core->load_blocks()
);

echo $core->dataConnect(VVSU_STYLE_PATH."header.html");
echo $core->dataConnect(VVSU_STYLE_PATH.'index.html', $dataGlobal);
?>