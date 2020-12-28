<?php


class module
{

    private $core, $db, $pageResult, $user;

    public function __construct($core) {
        $this->core = $core;
        $this->user = $core->user;
        $this->db = $core->db;
        $this->pageResult = 5;
    }

    public function content()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = intval($_GET['id']);
            $query = $this->db->query("SELECT vvsu_posts.*, vvsu_users.login FROM vvsu_posts, vvsu_users where vvsu_posts.id = '$id' and vvsu_users.id = vvsu_posts.uid");
            if (!$query || $this->db->num_rows($query) <= 0) {
                return $this->core->js_alert("Ошибка!", "Пост ".$id." не найден!", 1);;
            }
            $arr = $this->db->fetch_assoc($query);
            $mayRemove = $this->user->isAdmin ? 1 : $this->db->HSC($arr['login'] == $this->user->login) ? 1 : 0;
            $isAuthor = $this->db->HSC($arr['login'] == $this->user->login) ? 1 : 0;
            if (!$mayRemove) {
                return $this->core->js_alert("Ошибка!", "У Вас нет прав на удаление!", 1);;
            }
            $query = $this->db->query("DELETE FROM vvsu_posts WHERE id = '$id'");
            if(!$query) {
                return $this->core->js_alert("Ошибка!", "Обновите страницу!", 1);;
            }
            if($isAuthor) {
                $this->db->query("UPDATE vvsu_users SET posts = posts - 1 WHERE login = '{$this->user->login}'");
            }
        } else {
            header('Location: /');
        }
    }

}